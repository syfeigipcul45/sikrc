<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\HeroImage;
use App\Models\MediaGalleries;
use App\Models\Pengajar;
use App\Models\Post;
use App\Models\Profil;
use App\Models\TemaPelatihan;

class HomeController extends Controller
{
    public function index()
    {
        $data['hero_images'] = HeroImage::all();
        $data['tema_pelatihans'] = TemaPelatihan::orderBy('hit', 'desc')->limit(5)->get();
        $data['post'] = Post::latest()->first();
        $data['other_posts'] = Post::where('id', '!=', $data['post']->id)->latest()->limit(3)->get();
        $data['videos'] = MediaGalleries::where('type', 'video')->limit(3)->latest()->get();
        return view('homepage.index', $data);
    }

    public function getProfil($slug)
    {
        $data['profil'] = Profil::where('slug', $slug)->first();
        return view('homepage.profil.detail_profil', $data);
    }

    public function getPosts()
    {
        $data['posts'] = Post::latest()->paginate(3);
        return view('homepage.posts.posts', $data);
    }

    public function getDetailPost($slug)
    {
        $data['post'] = Post::where('slug', $slug)->first();
        $data['other_posts'] = Post::where('slug', '!=', $slug)->latest()->limit(4)->get();
        return view('homepage.posts.detail_post', $data);
    }

    public function getPengajar()
    {
        $data['pengajars'] = Pengajar::orderBy('name', 'asc')->paginate(6);
        return view('homepage.pengajar.index', $data);
    }

    public function getFasilitas()
    {
        $data['fasilitas'] = Fasilitas::orderBy('name', 'asc')->paginate(6);
        return view('homepage.fasilitas.index', $data);
    }

    public function getDetailFasilitas($slug)
    {
        $data['total'] = 0;
        $data['fasilitas'] = Fasilitas::where('slug', $slug)->first();
        $data['other_fasilitas'] = Fasilitas::where('slug', '!=', $slug)->latest()->limit(4)->get();
        foreach ($data['fasilitas']->getMedia('fasilitas') as $image) {
            $data['total']++;
        }
        return view('homepage.fasilitas.detail_fasilitas', $data);
    }
}
