<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;

class UserController extends Controller
{
    public function flogin()
    {
        #page_setup
        $customcss = '';
        $settings = ['title' => ': Login',
                     'customcss' => $customcss,
                     'pagetitle' => 'Login',
                     'navactive' => 'usernav',
                     Setting::find(1)->setname => Setting::find(1)->value,
                     Setting::find(2)->setname => Setting::find(2)->value,
                     Setting::find(3)->setname => Setting::find(3)->value,
                     Setting::find(4)->setname => Setting::find(4)->value,
                     Setting::find(5)->setname => Setting::find(5)->value];



        return view('login', [
            $settings['navactive'] => '-active-links',
            'stgs' => $settings]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users,username',
            'no_hp' => 'required|numeric|unique:users,no_hp',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $newuser = new User;
        $newuser->username = $request->username;
        $newuser->no_hp = $request->no_hp;
        $newuser->email = $request->email;
        $newuser->password = bcrypt($request->password);
        $newuser->role = 'user';
        $newuser->avatar = 'default.png';
        $newuser->save();

        Auth::login($newuser);

        return redirect()->route('cust')->with('sukses', 'Berhasil Login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $attr = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($attr)){

            Auth::login($user);

        return redirect()->intended('/')->with('sukses', "Login Sukses");
        } else {
            return back()->with('gagal', 'Username / Password Salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        if(session()->get('gagal')){
            $getflash = session('gagal') ;
        } else {
            $getflash = NULL;
        }
        // dd($getflash);
        if ($getflash != NULL){
            return redirect('/login')->with('gagal', $getflash);
        }else{
            return redirect('/login');
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
