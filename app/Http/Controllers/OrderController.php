<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Paidtix;
use App\Models\Setting;
use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function ordernow(Request $request)
    {
        $tickets = Ticket::all();
        $adminfee = Setting::where('setname', 'biaya_admin')->first()->value;
        $sum = 0;
        foreach ($tickets as $i => $ticket) {
            $sum = $sum + $ticket->harga * $request->{$ticket->id};
        }
        $sum = $sum + $adminfee;

        $cartcounter = $tickets->count();
        try {
            $neworder = Order::create([
                'uuid' => Str::random(45),
                'id_cust' => auth()->user()->id,
                'jumlah_bayar' => $sum,
                'detail_order' => "",
                'status_bayar' => 'belum'
            ]);
            foreach ($tickets as $i => $ticket) {
                if($request->{$ticket->id} > 0){
                    $newdetail = OrderDetail::create([
                        'id_order' => $neworder->id,
                        'id_cust' => auth()->user()->id,
                        'id_tiket' => $ticket->id,
                        'jumlah' => $request->{$ticket->id},
                    ]);

                    for ($i=0; $i < $request->{$ticket->id}; $i++) {
                        Paidtix::create([
                            'id_detail' => $newdetail->id,
                            'token' => Str::random(45),
                            'status_tiket' => 0
                        ]);
                    }
                }else{
                    $cartcounter = $cartcounter-1;
                }

            }

            if($cartcounter == 0){
                $neworder->delete();
                return back()->with('gagal', 'Tidak ada Pesanan');
            }

            return redirect()->route('cust.checkout', ['uuid' => $neworder->uuid]);
        } catch (Exception $e) {
            dd($e);
            return back()->with('gagal', 'Order gagal dibuat');
        }


    }

    public function fcheckout($uuid)
    {
        $order = Order::where('uuid', $uuid)->first();

        if ($order->status_bayar == "sukses") {
            return redirect()->route('cust.invoice', ['uuid' => $order->uuid])->with('sukses', 'Order Sudah dibayar');
        } elseif ($order->status_bayar == "gagal") {
            return redirect()->route('cust.invoice', ['uuid' => $order->uuid])->with('gagal', 'Pembayaran Gagal');
        }

        $adminfee = Setting::where('setname', 'biaya_admin')->first()->value;
                // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-hOThKHukEZQlnuXhIU3CLT9N';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = false;

        $firstname = explode(" ", auth()->user()->customer->nama_lengkap ?? auth()->user()->username)[0];
        $lastname = explode(" ", auth()->user()->customer->nama_lengkap ?? auth()->user()->username)[1] ?? "";


        $detailorder = $order->details;
        $item_details = [];
        foreach ($detailorder as $order_detail) {
        $item_details[] = [
            "id" => "ITEM" . $order_detail->id,
            "price" => $order_detail->ticket->harga,
            "quantity" => $order_detail->jumlah,
            "name" => $order_detail->ticket->nama_tiket,
        ];
        }

        $item_details[] = [
            "id" => "ADMIN",
            "price" => $adminfee,
            "quantity" => 1,
            "name" => "Biaya Admin"
        ];

        $params = array(
            'transaction_details' => array(
                'order_id' => "ORDER"."-".$order->id."-".rand(),
                'gross_amount' => $order->jumlah_bayar,
            ),
            'item_details' => $item_details,
            'customer_details' => array(
                'first_name' =>  $firstname,
                'last_name' => $lastname,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $customcss = '';
        $jmlsetting = Setting::count();
        $settings = ['title' => ': Checkout',
                     'customcss' => $customcss,
                     'pagetitle' => 'Checkout',
                     'navactive' => 'ticketnav'];
        for ($i = 1; $i <= $jmlsetting; $i++) {
            $setting = Setting::find($i);
            $settings[$setting->setname] = $setting->value;
        }

        return view('ticket.checkout', [
            'customcss' => $customcss,
            'stgs' => $settings,
            'order' => $order,
            'transaksi' => 'active-nav',
            'adminfee' => $adminfee,
            'snapToken' => $snapToken
        ]);
    }

    public function finvoice($uuid)
    {
        $adminfee = Setting::where('setname', 'biaya_admin')->first()->value;
        $order = Order::where('uuid', $uuid)->first();


        $customcss = '';
        $jmlsetting = Setting::count();
        $settings = ['title' => ': Invoice',
                     'customcss' => $customcss,
                     'pagetitle' => 'Invoice',
                     'navactive' => 'ticketnav'];
        for ($i = 1; $i <= $jmlsetting; $i++) {
            $setting = Setting::find($i);
            $settings[$setting->setname] = $setting->value;
        }

        if(session()->get('sukses') != null){
            return view('ticket.invoice', [
                'customcss' => $customcss,
                'stgs' => $settings,
                'order' => $order,
                'adminfee' => $adminfee,
                'transaksi' => 'active-nav',
            ])->with('sukses', 'Cek Tiket Kamu');
        }
        return view('ticket.invoice', [
                'customcss' => $customcss,
                'stgs' => $settings,
                'order' => $order,
                'adminfee' => $adminfee,
                'transaksi' => 'active-nav',
        ])->with('sukses', 'Cek Tiket Kamu');
    }

    public function response(Request $request)
    {
        $respons = json_decode($request->json);

        $statcode = $respons->status_code;

        $tix = Order::find($request->order_id);

        if($statcode == '200'){
            $tix->update([
                'status_bayar' => 'sukses',
            ]);

            return redirect()->route('cust.invoice', ['uuid' => $tix->uuid])->with('sukses', 'Cek Tiket Kamu');
        } else {
            return redirect()->route('cust.checkout', ['uuid' => $tix->uuid])->with('gagal', 'gagal '.$statcode);
        }

    }

    public function midtrans_response(Request $request)
    {
        $string = $request->input('order_id');;
        $array = explode("-", $string);
        $result = $array[1];
        $orderId = $result;
        $status = $request->input('transaction_status');
        $order = Order::findOrFail($orderId);

        if ($order->status_bayar != 'sukses') {
            if ($status == 'capture' || $status == 'settlement') {
                $order->status_bayar = 'sukses';
            } else if ($status == 'pending') {
                $order->status_bayar = 'pending';
            } else {
                $order->status_bayar = 'gagal';
            }
        }

        $order->save();

        return response()->json(['status' => 'success']);
    }

    public function finishedpayment(Request $request)
    {
        // $data = (object) $_GET;
        // $order_id = $data->order_id;

        // $string = $order_id;
        // $array = explode("-", $string);
        // $result = $array[1];

        // if ($data->status_code == '200' && $data->transaction_status == 'capture') {
        //     $order = Order::find($result);

        //     if ($order) {
        //         // Update status pembayaran menjadi sukses
        //         $order->status_bayar = 'sukses';
        //         $order->save();
        //         // // Kirim email konfirmasi ke customer
        //         // Mail::to($order->email)->send(new OrderConfirmationMail($order));
        //     }
        // }

        // return response('OK', 200);
        return redirect()->route('u.ticket')->with('sukses', 'Cek Tiket Kamu');
    }

    public function unfinishedpayment(Request $request)
    {
        // dd($_GET);
        // $payload = $request->getContent();
        // $data = json_decode($payload);
        // $order_id = $data->order_id;

        // $string = $order_id;
        // $array = explode("-", $string);
        // $result = $array[1];

        // $tix = Order::find($result);

        // if ($data->status_code == '200' && $data->transaction_status == 'capture') {
        //     $order = Order::where('id', $data->order_id)->first();

        //     if ($order) {
        //         // Update status pembayaran menjadi sukses
        //         $order->status_bayar = 'sukses';
        //         $order->save();
        //         // // Kirim email konfirmasi ke customer
        //         // Mail::to($order->email)->send(new OrderConfirmationMail($order));
        //     }
        // }

        // return response('OK', 200);
        return redirect()->route('u.ticket')->with('warning', 'Pembayaran belum selesai');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


}
