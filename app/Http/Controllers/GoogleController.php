<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('gagal', 'Are?? Gagal, Coba Lagi');
        }

        // dd($user);

        // Check if user with this Google ID already exists
        $finduser = User::where('email', $user->email)->first();

        $username = explode('@', $user->email)[0];

        try {
            // Nama file untuk disimpan
            $filename = $user->id.'.jpg';

            // Ambil data gambar dari URL
            $data = file_get_contents($user->avatar);

            // Simpan data gambar ke dalam file

            Storage::makeDirectory('public/avatar');
            Storage::put('public/avatar/' . $filename, $data, 'public');
        } catch (\Throwable $th) {
            dd($th);
        }

        if ($finduser) {
            Auth::login($finduser);
            return redirect()->route('welcome')->with('sukses', 'Irasshaimase!! '.$user->name);
        } else {
            // Create new user
            $newUser = new User;
            $newUser->role = 'user';
            $newUser->no_hp = '0';
            $newUser->avatar = $filename ?? 'itsukipp.png';
            $newUser->nama_lengkap = $user->name;
            $newUser->username = $username;
            $newUser->email = $user->email;
            $newUser->Google_id = $user->id;
            $newUser->password = bcrypt($user->email);
            $newUser->save();

            Auth::login($newUser);
            return redirect()->route('welcome')->with('sukses', 'Irasshaimase!! '.$user->name);
        }
    }
}
