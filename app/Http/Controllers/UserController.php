<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': List User',
                     'customcss' => $customcss,
                     'pagetitle' => 'List User',
                     'subtitle' => 'List User',
                     'navactive' => '',
                     'baractive' => 'userbar',];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        $users = User::all();

        return view('admin.user.user', [
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            'users' => $users,
            ]);
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
        $settings = ['title' => ': Buat User',
                     'customcss' => $customcss,
                     'pagetitle' => 'Buat User',
                     'subtitle' => 'Buat User Baru disini',
                     'navactive' => '',
                     'baractive' => 'userbar',];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.user.buatuser', [
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
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'role' => 'required|in:admin,user',
            'username' => [
                'required',
                'unique:users',
                'regex:/^[a-z0-9_.-]+$/',
                'max:255'
            ],
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'no_hp' => 'nullable|numeric',
            'instansi' => 'nullable',
            'password' => 'required|min:8',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'username.alpha_dash' => 'Username hanya boleh mengandung huruf, angka, tanda "-" atau "_"',
            'username.regex' => 'Username hanya boleh mengandung huruf kecil dan tanda "-" atau "_"',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter'
        ]);

        // Mengubah username menjadi lowercase
        $validatedData['username'] = strtolower($validatedData['username']);

        $file = $request->file('avatar');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/avatar', $fileName, 'public');

        // Buat objek user baru
        $user = new User();
        $user->role = $validatedData['role'];
        $user->username = $validatedData['username'];
        $user->nama_lengkap = $validatedData['nama_lengkap'];
        $user->email = $validatedData['email'];
        $user->no_hp = $validatedData['no_hp'];
        $user->instansi = $validatedData['instansi'];
        $user->password = bcrypt($validatedData['password']);
        $user->avatar = $fileName;
        $user->save();

        return redirect()->route('user.index')->with('sukses', 'User Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Detail User',
                     'customcss' => $customcss,
                     'pagetitle' => 'Detail User',
                     'subtitle' => 'Update Data User disini',
                     'navactive' => '',
                     'baractive' => 'userbar',];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        $user = User::find($id);

        return view('admin.user.detailuser', [
            'user' => $user,
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    public function usershow()
    {
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Detail User',
                     'customcss' => $customcss,
                     'pagetitle' => 'Detail User',
                     'subtitle' => 'Update Data User disini',
                     'navactive' => '',
                     'baractive' => 'userbar',];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        $user = User::find(auth()->user()->id);

        return view('admin.user.detailuser', [
            'user' => $user,
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
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
        $user = User::find($id);

        $validatedData = $request->validate([
            'role' => 'in:admin,user',
            'username' => [
                'required',
                'unique:users,username,' . $user->id,
                'regex:/^[a-z0-9_.-]+$/',
                'max:255'
            ],
            'nama_lengkap' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'no_hp' => 'required|numeric',
            'instansi' => 'nullable',
            'password' => 'nullable|min:8',
        ], [
            'username.alpha_dash' => 'Username hanya boleh mengandung huruf, angka, tanda "-" atau "_"',
            'username.regex' => 'Username hanya boleh mengandung huruf kecil dan tanda "-" atau "_"',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter'
        ]);

        if ($request->role != null) {
            $user->role = $validatedData['role'];
        }

        $user->username = strtolower($validatedData['username']);
        $user->nama_lengkap = $validatedData['nama_lengkap'];
        $user->email = $validatedData['email'];
        $user->no_hp = $validatedData['no_hp'];
        $user->instansi = $validatedData['instansi'];

        if ($validatedData['password'] != null) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        if (auth()->user()->role == 'admin') {
            return redirect()->route('user.index')->with('sukses', 'Profile berhasil diupdate');
        } else {
            return redirect()->route('u.user')->with('sukses', 'Profile berhasil diupdate');
        }

    }

    public function newupdateimg(Request $request, $id)
    {
        // Validate file size and aspect ratio
        $validatedData = $request->validate([
            'avatar' => 'required|image|max:2048',
        ]);

        // If validation passes, store the file
        $file = $request->file('avatar');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/avatar', $fileName, 'public');

        // Update the user's profile picture
        $user = User::find($id);
        $user->avatar = $fileName;
        $user->save();

        return redirect()->back()->with('success', 'Foto profile berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);

        $User->delete();
        return redirect()->route('user.index')->with('sukses', 'Berhasil Menghapus User');
    }
}
