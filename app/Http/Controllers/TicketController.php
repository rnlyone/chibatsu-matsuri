<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Paidtix;
use App\Models\Setting;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customcss = '';
        $jmlsetting = Setting::count();
        $settings = ['title' => ': List Ticket',
                     'customcss' => $customcss,
                     'pagetitle' => 'List Ticket',
                     'navactive' => 'ticketnav'];
        for ($i = 1; $i <= $jmlsetting; $i++) {
            $setting = Setting::find($i);
            $settings[$setting->setname] = $setting->value;
        }

        $tickets = Ticket::all();

        return view('admin.ticket.ticketindex', [
            'customcss' => $customcss,
            'stgs' => $settings,
            'tickets' => $tickets,
            'transaksi' => 'active-nav',
        ]);
    }

    public function scan()
    {
        $customcss = '';
        $jmlsetting = Setting::count();
        $settings = ['title' => ': Scan Ticket',
                     'customcss' => $customcss,
                     'pagetitle' => 'Scan Ticket',
                     'navactive' => 'ticketnav'];
        for ($i = 1; $i <= $jmlsetting; $i++) {
            $setting = Setting::find($i);
            $settings[$setting->setname] = $setting->value;
        }

        return view('admin.ticket.scanner', [
            'customcss' => $customcss,
            'stgs' => $settings,
        ]);
    }

    public function scantiket(Request $request)
    {
        // Lakukan validasi data yang diterima dari JavaScript
        $validatedData = $request->validate([
            'tokentiket' => 'required'
        ]);

        // Lakukan proses scanning dan simpan data yang diperlukan
        $tokentiket = $validatedData['tokentiket'];

        $tiket = Paidtix::where('token', $tokentiket)->first();
        try {
            $user = $tiket->orderdetail->user;
            $nama_tiket = $tiket->orderdetail->ticket;

            if ($tiket->status_tiket == 0) {
                $tiket->status_tiket = 1;
                $tiket->save();
            return response()->json(['response' => 'sukses', 'message' => 'Tiket Berhasil digunakan!', 'paidtix' => $tiket, 'username' => $user->username, 'nama_user' => $user->nama_lengkap, 'nama_ticket' => $nama_tiket->nama_tiket]);
            } else {
            return response()->json(['response' => 'gagal', 'message' => 'Tiket Sudah Pernah digunakan!', 'paidtix' => $tiket, 'username' => $user->username, 'nama_user' => $user->nama_lengkap, 'nama_ticket' => $nama_tiket->nama_tiket]);
            }
        } catch (\Throwable $th) {
            return response()->json(['response' => 'gagal', 'message' => 'Tiket tidak ditemukan!']);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Buat Tiket',
                     'customcss' => $customcss,
                     'pagetitle' => 'Buat Tiket',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.ticket.buattiket', [
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tiket' => 'required|string',
            'deskripsi_tiket' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'harga_coret' => 'nullable|numeric|min:0',
            'kuota' => 'required|integer|min:1',
            'visibility' => 'nullable|boolean'
        ]);

        $ticket = new Ticket();
        $ticket->nama_tiket = $validatedData['nama_tiket'];
        $ticket->deskripsi_tiket = $validatedData['deskripsi_tiket'];
        $ticket->harga = $validatedData['harga'];
        $ticket->harga_coret = $validatedData['harga_coret'] ?? null;
        $ticket->kuota = $validatedData['kuota'];
        $ticket->visibility = $validatedData['visibility'] ?? true;
        $ticket->save();

        return redirect()->route('ticketing.index')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket)
    {
        $ticket = Ticket::find($ticket);
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Show Tiket',
                     'customcss' => $customcss,
                     'pagetitle' => 'Show Tiket',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        $paidtix = Paidtix::get();
        $paidtix = $paidtix->filter(function ($item) use ($ticket) {
            return $item->orderdetail->ticket->id == $ticket->id && $item->orderdetail->order->status_bayar == 'sukses';
        });


        return view('admin.ticket.detailticket', [
            'customcss' => $customcss,
            'ticket' => $ticket,
            'paidtix' => $paidtix,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($ticket)
    {

        $ticket = Ticket::find($ticket);
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Edit Tiket',
                     'customcss' => $customcss,
                     'pagetitle' => 'Edit Tiket',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.ticket.buattiket', [
            'customcss' => $customcss,
            'ticket' => $ticket,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ticket)
    {
        $validatedData = $request->validate([
            'nama_tiket' => 'required|string',
            'deskripsi_tiket' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'harga_coret' => 'nullable|numeric|min:0',
            'kuota' => 'required|integer|min:1',
            'visibility' => 'nullable|boolean'
        ]);

        $ticket = Ticket::find($ticket);
        $ticket->nama_tiket = $validatedData['nama_tiket'];
        $ticket->deskripsi_tiket = $validatedData['deskripsi_tiket'];
        $ticket->harga = $validatedData['harga'];
        $ticket->harga_coret = $validatedData['harga_coret'] ?? null;
        $ticket->kuota = $validatedData['kuota'];
        $ticket->visibility = $validatedData['visibility'] ?? true;
        $ticket->save();

        return redirect()->route('ticketing.index')
            ->with('success', 'Ticket Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
