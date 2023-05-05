<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Lomba;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function ShowDaftarSaya($uuid)
    {
        $lomba = Lomba::find($uuid);

        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Pendaftaran Lomba',
                     'customcss' => $customcss,
                     'pagetitle' => 'Pendaftaran',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.blog.buatartikel', [
            'customcss' => $customcss,
            'lomba' => $lomba,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    public function daftarlomba(Request $r)
    {
        if (auth()->user()->no_hp != null && auth()->user()->instansi != null) {
            $lomba = Lomba::find($r->idLomba);

            $daftar = new Daftar();

            $daftar->id_lomba = $lomba->id;
            $daftar->id_user = auth()->user()->id;
            $daftar->status_bayar = 0;
            $daftar->status_daftar = 'ditinjau';

            $daftar->catatan = $lomba->catatan;

            $daftar->save();

            return redirect()->route('u.lomba');
        } else {
            return back()->with('gagal', 'Gomen, Profile kamu masih belum lengkap');
        }
    }

    public function updatecatatan(Request $r)
    {
        $daftar = Daftar::where('id_user', auth()->user()->id)->first();

        $daftar->catatan = $r->catatan;

        $daftar->save();
        return back()->with('sukses', 'Yatta, Kamu Berhasil Update Catatan');
    }

    public function updatecatatanadmin(Request $r, $id)
    {
        $daftar = Daftar::find($id);

        if ($r->saveonly == 0) {
            if ($daftar->status_daftar == 'ditinjau') {
                $daftar->status_daftar = 'diterima';
            } elseif ($daftar->status_daftar == 'diterima') {
                $daftar->status_bayar = 1;
            }
            $daftar->catatan = $r->catatan;

        } else {
            $daftar->catatan = $r->catatan;
        }

        $daftar->save();
        return back()->with('sukses', 'Yatta, Kamu Berhasil Update Catatan');
    }

    public function tolak($id)
    {
        $daftar = Daftar::find($id);
        $daftar->status_daftar = 'ditolak';
        $daftar->save();
        return back()->with('sukses', 'Yatta, Kamu Berhasil Update Pendaftaran');
    }

    public function tinjau($id)
    {
        $daftar = Daftar::find($id);
        $daftar->status_daftar = 'ditinjau';
        $daftar->save();
        return back()->with('sukses', 'Yatta, Kamu Berhasil Update Pendaftaran');
    }

    public function batalbayar($id)
    {
        $daftar = Daftar::find($id);
        $daftar->status_bayar = 0;
        $daftar->save();
        return back()->with('sukses', 'Yatta, Kamu Berhasil Update Pendaftaran');
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
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy($daftar)
    {
        $daftar = Daftar::find($daftar);

        $daftar->delete();
        return redirect()->back()->with('sukses', 'Berhasil Menghapus Pendaftar');
    }
}
