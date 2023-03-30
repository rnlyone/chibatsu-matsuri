<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Paidtix;
use App\Models\Setting;
use Illuminate\Http\Request;

class PaidtixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uuid)
    {
        $order = Order::where('uuid', $uuid)->first();

        if ($order->status_bayar != 'sukses') {
            return redirect()->route('u.ticket')->with('gagal', 'Pembayaran Belum Selesai');
        }

        $customcss = '';
        $jmlsetting = Setting::count();
        $settings = ['title' => ': My Ticket',
                     'customcss' => $customcss,
                     'pagetitle' => 'My Ticket',
                     'navactive' => 'ticketnav'];
        for ($i = 1; $i <= $jmlsetting; $i++) {
            $setting = Setting::find($i);
            $settings[$setting->setname] = $setting->value;
        }

        return view('ticket.paidtix', [
            'customcss' => $customcss,
            'stgs' => $settings,
            'order' => $order,
            'transaksi' => 'active-nav',
        ])->with('sukses', 'Cek Tiket Kamu');
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
     * @param  \App\Models\Paidtix  $paidtix
     * @return \Illuminate\Http\Response
     */
    public function show(Paidtix $paidtix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paidtix  $paidtix
     * @return \Illuminate\Http\Response
     */
    public function edit(Paidtix $paidtix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paidtix  $paidtix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paidtix $paidtix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paidtix  $paidtix
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paidtix $paidtix)
    {
        //
    }
}
