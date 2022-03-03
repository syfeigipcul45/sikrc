<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\HeroImage;
use App\Models\JadwalPelatihan;
use App\Models\Kontak;
use App\Models\MateriPelatihan;
use App\Models\MediaGalleries;
use App\Models\Pengajar;
use App\Models\Post;
use App\Models\Profil;
use App\Models\TemaPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function getJadwalPelatihan()
    {
        $data['jadwal_pelatihans'] = JadwalPelatihan::orderBy('waktu_pelatihan', 'desc')->get();
        return view('homepage.pelatihan.jadwal_pelatihan', $data);
    }

    public function getTemaPelatihan()
    {
        $data['tema'] = TemaPelatihan::orderBy('name', 'asc')->get();
        return view('homepage.pelatihan.materi_pelatihan', $data);
    }

    public function getMateriPelatihan($slug)
    {
        $data['tema'] = TemaPelatihan::where('slug', $slug)->first();
        $data['presentasi'] = MateriPelatihan::where('tema_id', $data['tema']->id)->where('type', 'presentasi')->orderby('created_at', 'desc')->get();
        $data['gambar'] = MateriPelatihan::where('tema_id', $data['tema']->id)->where('type', 'gambar')->orderby('created_at', 'desc')->get();
        $data['video'] = MateriPelatihan::where('tema_id', $data['tema']->id)->where('type', 'video')->orderby('created_at', 'desc')->get();
        return view('homepage.pelatihan.show_materi', $data);
    }

    public function getPhoto()
    {
        $data['photos'] = MediaGalleries::where('type', 'photo')->latest()->get();
        return view('homepage.media.photo', $data);
    }

    public function getDetailPhoto(Request $request)
    {
        $id = $request->id;
        $data['photo'] = MediaGalleries::where(['id' => $id, 'type' => 'photo'])->first();
        return view('homepage.media.modal_photo', $data);
    }

    public function getVideo()
    {
        $data['videos'] = MediaGalleries::where('type', 'video')->latest()->get();
        return view('homepage.media.video', $data);
    }

    public function getKontak()
    {
        return view('homepage.kontak.index');
    }

    public function storeKontak(Request $request)
    {
        $data = [
            'name' => $request->name,
            'subjek' => $request->subjek,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'pesan' => $request->pesan
        ];

        Kontak::create($data);

        Session::flash('success', 'Pesan telah terkirim');
        return redirect()->back();
    }

}
