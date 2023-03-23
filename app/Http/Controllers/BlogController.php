<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Artikel',
                        'customcss' => $customcss,
                        'pagetitle' => 'List Artikel Blog',
                        'navactive' => '',
                        'baractive' => 'lombabar'];
                        foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                        }

        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('admin.blog', [
            'blogs' => $blogs,
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
    }

    public function blogdetail($uuid)
    {
        $article = Blog::where('uuid', $uuid)->first();

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

        try {
            $other['prev'] = Blog::where('id', '<', $article->id)->orderBy('id', 'desc')->first()->uuid;
        } catch (\Throwable $th) {
            $other['prev'] = null;
        }

        try {
            $other['next'] = Blog::where('id', '>', $article->id)->orderBy('id', 'desc')->first()->uuid;
        } catch (\Throwable $th) {
            $other['next'] = null;
        }

        $latest = Blog::latest()->take(3)->get();

        return view('blog.blogdetail', [
            'article' => $article,
            'other' => $other,
            'latest' => $latest,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
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
        $settings = ['title' => ': Buat Artikel',
                     'customcss' => $customcss,
                     'pagetitle' => 'Buat Artikel',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.blog.buatartikel', [
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
            'cover' => 'required|mimes:png,gif,webp,jpg,jpeg|max:50000',
            'category' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $file = $validatedData['cover'];
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $fileExtension;

        // Simpan data ke database
        $blog = new Blog();
        $blog->uuid = Str::slug($validatedData['title'], '-');
        $blog->category = $validatedData['category'];
        $blog->title = $validatedData['title'];
        $blog->content = nl2br($validatedData['content']);
        $blog->cover = $fileName;

        // Move uploaded file to storage
        $file->storeAs('public/coverblog', $fileName, 'public');

        $blog->save();


        return redirect()->route('ourblog.index')->with('sukses', 'Berhasil membuat Artikel');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($blog)
    {
        $article = Blog::find($blog);
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Edit Artikel',
                     'customcss' => $customcss,
                     'pagetitle' => 'Edit Artikel',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.blog.buatartikel', [
            'article' => $article,
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog)
    {
        // dd($request);
        // Validasi input dari user

        $blog = Blog::find($blog);
        if ($request->cover == null) {
            $validatedData = $request->validate([
                'category' => 'required|string',
                'title' => 'required|string',
                'content' => 'required|string',
            ]);
        } else {
            $validatedData = $request->validate([
                'cover' => 'required|mimes:png,gif,webp,jpg,jpeg|max:50000',
                'category' => 'required|string',
                'title' => 'required|string',
                'content' => 'required|string',
            ]);

            $file = $validatedData['cover'];
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $fileExtension;

            $blog->cover = $fileName;

            // Move uploaded file to storage
            $file->storeAs('public/coverblog', $fileName, 'public');
        }

        // Simpan data ke database
        $blog->uuid = Str::slug($validatedData['title'], '-');
        $blog->category = $validatedData['category'];
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];




        $blog->save();


        return redirect()->route('ourblog.index')->with('sukses', 'Berhasil Mengedit Artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog)
    {
        $blog = Blog::find($blog);

        $blog->delete();
        return redirect()->route('ourblog.index')->with('sukses', 'Berhasil Menghapus Artikel');
    }
}
