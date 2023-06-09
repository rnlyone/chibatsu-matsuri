<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Daftar;
use App\Models\Lomba;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Slide;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Visibility;

class GeneralController extends Controller
{
    public function home()
    {
        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => '',
                     'customcss' => $customcss,
                     'pagetitle' => 'Home',
                     'navactive' => 'homenav',
                     'baractive' => 'homebar'];
                     foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        $users = User::has('stories')->with('stories')->orderByDesc('created_at')->get();
        $slides = Slide::all();
        $latest4 = Blog::latest()->take(4)->get();

        // dd($users);

        return view('welcome', [
            'users' => $users,
            'slides' => $slides,
            'latest4' => $latest4,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
    }

    public function ticket()
    {
        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Ticket',
                     'customcss' => $customcss,
                     'pagetitle' => 'Tiket',
                     'navactive' => 'ticketnav',
                     'baractive' => 'ticketbar'];
                     foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        $tickets = Ticket::all();
        if(Auth::check()){
            $orders = Order::where('id_cust', auth()->user()->id)->latest()->get();

            $paidorders = Order::where('id_cust', auth()->user()->id)->where('status_bayar', 'sukses')->latest()->get();
            // dd($orders);
        } else {
            $orders = null;

            $paidorders = null;
        }

        return view('ticket.ticketindex', [
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            'tickets' => $tickets,
            'orders' => $orders,
            'paidorders' => $paidorders,
        ]);
    }

    public function lomba()
    {
        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Lomba',
                    'customcss' => $customcss,
                    'pagetitle' => 'Lomba',
                    'navactive' => 'lombanav',
                    'baractive' => 'lombabar'];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                    }

        $lombas = Lomba::where('visibilitas', 1)->get();

        if(Auth::check()){
            $user = User::find(auth()->user()->id);

            if ($user->daftars()->exists()) {
                $daftar = Daftar::where('id_user', $user->id)->first();
                return view('lomba.daftarindex', [
                    'lombas' => $lombas,
                    'daftar' => $daftar,
                    $settings['navactive'] => '-active-links',
                    $settings['baractive'] => 'active',
                    'stgs' => $settings]);
            }
        }

        return view('lomba.lombaindex', [
            'lombas' => $lombas,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
    }

    public function user()
    {
        if (Auth::check()) {
            #page_setup
            $customcss = '';
            $jmlsetting = Setting::where('group', 'env')->get();
            $settings = ['title' => ': User',
                        'customcss' => $customcss,
                        'pagetitle' => 'User',
                        'navactive' => 'usernav',
                        'baractive' => 'userbar'];
                        foreach ($jmlsetting as $i => $set) {
                            $settings[$set->setname] = $set->value;
                         }

            $pendaftars = Daftar::where('id_user', auth()->user()->id)->get();

            $paidorders = Order::where('id_cust', auth()->user()->id)->where('status_bayar', 'sukses')->latest()->get();

            return view('user.userindex', [
                'pendaftars' => $pendaftars,
                'paidorders' => $paidorders,
                $settings['navactive'] => '-active-links',
                $settings['baractive'] => 'active',
                'stgs' => $settings]);
        } else {
            return redirect()->route('flogin');
        }
    }

    public function cast()
    {
        #page_setup
        $customcss = '

        ';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': gakuencast',
                     'customcss' => $customcss,
                     'pagetitle' => 'Gakuencast',
                     'navactive' => 'castnav',
                     'baractive' => 'castbar'];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }
        $cast = Setting::where('setname', 'livelink')->first()->value;


        return view('cast.castindex', [
            'castlink' => $cast,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
    }

    public function setting()
    {
        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Setting',
                     'customcss' => $customcss,
                     'pagetitle' => 'Setting',
                     'navactive' => '',
                     'baractive' => 'settingbar'];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.setting', [
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
    }

    public function blog()
    {
        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Artikel',
                        'customcss' => $customcss,
                        'pagetitle' => 'Artikel Blog',
                        'navactive' => '',
                        'baractive' => 'lombabar'];
                        foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                        }

        $blogs = Blog::all();

        return view('blog.blogindex', [
            'blogs' => $blogs,
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
    }
}
