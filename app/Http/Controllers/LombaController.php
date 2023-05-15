<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LombaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lombas = Lomba::all();

        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Lomba',
                     'customcss' => $customcss,
                     'pagetitle' => 'Dashboard Lomba',
                     'navactive' => '',
                     'baractive' => 'lombabar'];
                     foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.lomba', [
            'lombas' => $lombas,
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
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
        $settings = ['title' => ': Buat Lomba',
                     'customcss' => $customcss,
                     'pagetitle' => 'Buat Lomba',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.lomba.buatlomba', [
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
        // Validasi input dari user
        $validatedData = $request->validate([
            'src' => 'required|mimes:png,gif,webp,jpg,jpeg|max:50000',
            'nama_lomba' => 'required|string',
            'kuota' => 'required|string',
            'deskripsi' => 'required|string',
            'sinopsis' => 'required|string',
            'persyaratan' => 'required|string',
            'juknis' => 'required|string',
            'biaya' => 'required|string',
            'level' => 'required|string',
            'visibilitas' => 'required',
            'terbuka_untuk' => 'required',
            'catatan' => 'required|string',
            'gruplink' => 'required|string',
        ]);

        $file = $validatedData['src'];
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $fileExtension;

        // Simpan data ke database
        $lomba = new Lomba();

        $lomba->nama_lomba = $validatedData['nama_lomba'];
        $lomba->kuota = $validatedData['kuota'];
        $lomba->deskripsi = $validatedData['deskripsi'];
        $lomba->sinopsis = $validatedData['sinopsis'];
        $lomba->persyaratan = $validatedData['persyaratan'];
        $lomba->juknis = $validatedData['juknis'];
        $lomba->biaya = $validatedData['biaya'];
        $lomba->terbuka_untuk = $validatedData['terbuka_untuk'];
        $lomba->level = $validatedData['level'];
        $lomba->visibilitas = $validatedData['visibilitas'];
        $lomba->src = $fileName;
        $lomba->catatan = $validatedData['catatan'];
        $lomba->gruplink =  $validatedData['gruplink'];

        // Move uploaded file to storage
        $file->storeAs('public/coverlomba', $fileName, 'public');

        $lomba->save();

        return redirect()->route('lomba.index')->with('sukses', 'Berhasil membuat Lomba');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function show($lomba)
    {
        $lomba = Lomba::find($lomba);
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Dashboard Lomba',
                     'customcss' => $customcss,
                     'pagetitle' => 'Lomba',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        $totalPendaftar = $lomba->daftars->count();

        return view('admin.lomba.dasborlomba', [
            'customcss' => $customcss,
            'lomba' => $lomba,
            'totalPendaftar' => $totalPendaftar,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function edit($lomba)
    {

        $lomba = Lomba::find($lomba);
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Edit Lomba',
                     'customcss' => $customcss,
                     'pagetitle' => 'Edit Lomba',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.lomba.buatlomba', [
            'customcss' => $customcss,
            'lomba' => $lomba,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lomba)
    {
        $lomba = Lomba::find($lomba);
        // Validasi input dari user
        $validatedData = $request->validate([
            'src' => 'mimes:png,gif,webp,jpg,jpeg|max:50000',
            'nama_lomba' => 'required|string',
            'kuota' => 'required|string',
            'deskripsi' => 'required|string',
            'sinopsis' => 'required|string',
            'persyaratan' => 'required|string',
            'juknis' => 'required|string',
            'biaya' => 'required|string',
            'terbuka_untuk' => 'required',
            'level' => 'required|string',
            'visibilitas' => 'required',
            'catatan' => 'required|string',
            'gruplink' => 'required|string',
        ]);

        if ($request->src != null) {
            $file = $validatedData['src'];
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $fileExtension;
            $lomba->src = $fileName;

            // Move uploaded file to storage
            $file->storeAs('public/coverlomba', $fileName, 'public');
        }

        $lomba->nama_lomba = $validatedData['nama_lomba'];
        $lomba->kuota = $validatedData['kuota'];
        $lomba->deskripsi = $validatedData['deskripsi'];
        $lomba->sinopsis = $validatedData['sinopsis'];
        $lomba->persyaratan = $validatedData['persyaratan'];
        $lomba->juknis = $validatedData['juknis'];
        $lomba->biaya = $validatedData['biaya'];
        $lomba->terbuka_untuk = $validatedData['terbuka_untuk'];
        $lomba->level = $validatedData['level'];
        $lomba->visibilitas = $validatedData['visibilitas'];
        $lomba->catatan = $validatedData['catatan'];
        $lomba->gruplink =  $validatedData['gruplink'];

        $lomba->save();

        return redirect()->route('lomba.index')->with('sukses', 'Berhasil Mengedit Lomba');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function destroy($lomba)
    {
        $lomba = Lomba::find($lomba);

        $lomba->delete();
        return redirect()->route('lomba.index')->with('sukses', 'Berhasil Menghapus Lomba');
    }
}
