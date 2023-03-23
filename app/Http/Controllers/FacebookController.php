<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('gagal', 'Authentication failed.');
        }

        // Check if user with this Facebook ID already exists
        $finduser = User::where('facebook_id', $user->id)->first();

        $username = explode('@', $user->email)[0];

        try {
            // Nama file untuk disimpan
            $filename = $user->id.'.jpg';

            // Ambil data gambar dari URL
            $data = file_get_contents($user->avatar);

            // Simpan data gambar ke dalam file

            Storage::makeDirectory('public/avatar');
            Storage::disk('public')->put('public/avatar/' . $filename, $data, 'public');
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
            $newUser->facebook_id = $user->id;
            $newUser->password = bcrypt($user->email);
            $newUser->save();

            Auth::login($newUser);
            return redirect()->route('welcome')->with('sukses', 'Irasshaimase!! '.$user->name);
        }
    }
}
