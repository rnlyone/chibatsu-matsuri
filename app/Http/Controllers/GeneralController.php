<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Lomba;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Slide;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // dd($users);

        return view('welcome', [
            'users' => $users,
            'slides' => $slides,
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
            // dd($orders);
        } else {
            $orders = null;
        }

        return view('ticket.ticketindex', [
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            'tickets' => $tickets,
            'orders' => $orders
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

        $lombas = Lomba::all();

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

            return view('user.userindex', [
                'pendaftars' => $pendaftars,
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
        $customcss = '';
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
        $settings = ['title' => ': Blog',
                     'customcss' => $customcss,
                     'pagetitle' => 'Blog',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('blog.blogindex', [
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
    }

    public function blogdetail()
    {
        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Blog',
                     'customcss' => $customcss,
                     'pagetitle' => 'Blog',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('blog.blogdetail', [
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }
}
