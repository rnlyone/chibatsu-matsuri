<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home()
    {
        #page_setup
        $customcss = '';
        $settings = ['title' => ': Home',
                     'customcss' => $customcss,
                     'pagetitle' => 'Home',
                     'navactive' => 'homenav',
                     Setting::find(1)->setname => Setting::find(1)->value,
                     Setting::find(2)->setname => Setting::find(2)->value,
                     Setting::find(3)->setname => Setting::find(3)->value,
                     Setting::find(4)->setname => Setting::find(4)->value,
                     Setting::find(5)->setname => Setting::find(5)->value];

        return view('welcome', [
            $settings['navactive'] => '-active-links',
            'stgs' => $settings]);
    }

    public function ticket()
    {
        #page_setup
        $customcss = '';
        $settings = ['title' => ': Ticket',
                     'customcss' => $customcss,
                     'pagetitle' => 'Tiket',
                     'navactive' => 'ticketnav',
                     Setting::find(1)->setname => Setting::find(1)->value,
                     Setting::find(2)->setname => Setting::find(2)->value,
                     Setting::find(3)->setname => Setting::find(3)->value,
                     Setting::find(4)->setname => Setting::find(4)->value,
                     Setting::find(5)->setname => Setting::find(5)->value];

        return view('ticket.ticketindex', [
            $settings['navactive'] => '-active-links',
            'stgs' => $settings]);
    }

    public function lomba()
    {
        #page_setup
        $customcss = '';
        $settings = ['title' => ': Lomba',
                     'customcss' => $customcss,
                     'pagetitle' => 'Lomba',
                     'navactive' => 'lombanav',
                     Setting::find(1)->setname => Setting::find(1)->value,
                     Setting::find(2)->setname => Setting::find(2)->value,
                     Setting::find(3)->setname => Setting::find(3)->value,
                     Setting::find(4)->setname => Setting::find(4)->value,
                     Setting::find(5)->setname => Setting::find(5)->value];

        return view('lomba.lombaindex', [
            $settings['navactive'] => '-active-links',
            'stgs' => $settings]);
    }

    public function user()
    {
        #page_setup
        $customcss = '';
        $settings = ['title' => ': Lomba',
                     'customcss' => $customcss,
                     'pagetitle' => 'User',
                     'navactive' => 'lombanav',
                     Setting::find(1)->setname => Setting::find(1)->value,
                     Setting::find(2)->setname => Setting::find(2)->value,
                     Setting::find(3)->setname => Setting::find(3)->value,
                     Setting::find(4)->setname => Setting::find(4)->value,
                     Setting::find(5)->setname => Setting::find(5)->value];

        return view('user.userindex', [
            $settings['navactive'] => '-active-links',
            'stgs' => $settings]);
    }

    public function cast()
    {
        #page_setup
        $customcss = '';
        $settings = ['title' => ': cast',
                     'customcss' => $customcss,
                     'pagetitle' => 'Cast',
                     'navactive' => 'castnav',
                     Setting::find(1)->setname => Setting::find(1)->value,
                     Setting::find(2)->setname => Setting::find(2)->value,
                     Setting::find(3)->setname => Setting::find(3)->value,
                     Setting::find(4)->setname => Setting::find(4)->value,
                     Setting::find(5)->setname => Setting::find(5)->value];

        return view('cast.castindex', [
            $settings['navactive'] => '-active-links',
            'stgs' => $settings]);
    }

    public function blog()
    {
        #page_setup
        $customcss = '';
        $settings = ['title' => ': Blog',
                     'customcss' => $customcss,
                     'pagetitle' => 'Blog',
                     'navactive' => '',
                     Setting::find(1)->setname => Setting::find(1)->value,
                     Setting::find(2)->setname => Setting::find(2)->value,
                     Setting::find(3)->setname => Setting::find(3)->value,
                     Setting::find(4)->setname => Setting::find(4)->value,
                     Setting::find(5)->setname => Setting::find(5)->value];

        return view('blog.blogindex', [
            $settings['navactive'] => '-active-links',
            'stgs' => $settings]);
    }

    public function blogdetail()
    {
        #page_setup
        $customcss = '';
        $settings = ['title' => ': Blog',
                     'customcss' => $customcss,
                     'pagetitle' => 'Blog',
                     'navactive' => '',
                     Setting::find(1)->setname => Setting::find(1)->value,
                     Setting::find(2)->setname => Setting::find(2)->value,
                     Setting::find(3)->setname => Setting::find(3)->value,
                     Setting::find(4)->setname => Setting::find(4)->value,
                     Setting::find(5)->setname => Setting::find(5)->value];

        return view('blog.blogdetail', [
            $settings['navactive'] => '-active-links',
            'stgs' => $settings]);
    }
}
