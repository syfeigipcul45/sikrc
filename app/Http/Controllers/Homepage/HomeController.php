<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\AlumniKrc;
use App\Models\DokumenKerjasama;
use App\Models\Fasilitas;
use App\Models\HeroImage;
use App\Models\JadwalPelatihan;
use App\Models\KerjaSama;
use App\Models\Kontak;
use App\Models\MateriPelatihan;
use App\Models\MediaGalleries;
use App\Models\Pengajar;
use App\Models\Post;
use App\Models\Product;
use App\Models\Profil;
use App\Models\TemaPelatihan;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $data['hero_images'] = HeroImage::orderBy('order', 'asc')->get();
        $data['tema_pelatihans'] = TemaPelatihan::orderBy('hit', 'desc')->limit(5)->get();
        $data['posts'] = Post::latest()->limit(3)->get();
        $data['pengajars'] = Pengajar::orderBy('order', 'asc')->get();
        $data['testimonials'] = Testimonial::where('is_published', '1')->get();
        return view('homepage.index', $data);
    }

    public function getProfil($slug)
    {
        $data['profil'] = Profil::where('slug', $slug)->first();
        return view('homepage.profil.detail_profil', $data);
    }

    public function getPosts(Request $request)
    {
        $data['posts'] = [];
        if (!empty($request->keyword)) {
            $data['posts'] = Post::where(function ($query) use ($request) {
                $query->where('title', "LIKE", "%" . $request->keyword . "%");
            })->paginate(6);
        } else {
            $data['posts'] = Post::latest()->paginate(6);
        }        
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
        $data['pengajars'] = Pengajar::orderBy('order', 'asc')->paginate(9);
        return view('homepage.pengajar.index', $data);
    }

    public function getDetailPengajar($id)
    {
        $data['pengajar'] = Pengajar::find($id);
        return view('homepage.pengajar.detail_pengajar', $data);
    }

    public function getFasilitas()
    {
        $data['fasilitas'] = Fasilitas::orderBy('order', 'asc')->paginate(6);
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
        $data['presentasi_private'] = MateriPelatihan::where('tema_id', $data['tema']->id)->where('type', 'presentasi')->where('is_published', 1)->orderby('created_at', 'desc')->get();
        $data['gambar'] = MateriPelatihan::where('tema_id', $data['tema']->id)->where('type', 'gambar')->orderby('created_at', 'desc')->get();
        $data['gambar_private'] = MateriPelatihan::where('tema_id', $data['tema']->id)->where('type', 'gambar')->where('is_published', 1)->orderby('created_at', 'desc')->get();
        $data['video'] = MateriPelatihan::where('tema_id', $data['tema']->id)->where('type', 'video')->orderby('created_at', 'desc')->get();
        return view('homepage.pelatihan.show_materi', $data);
    }

    public function getAlumni()
    {
        $data['alumnis'] = AlumniKrc::orderBy('name', 'asc')->paginate(9);
        $data['row'] = AlumniKrc::count();
        return view('homepage.alumni-krc.index', $data);
    }

    public function getPhoto()
    {
        $data['photos'] = MediaGalleries::where('type', 'photo')->latest()->paginate(9);
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
        $data['videos'] = MediaGalleries::where('type', 'video')->latest()->paginate(9);
        return view('homepage.media.video', $data);
    }

    public function getTestimoni()
    {
        $data['tema_pelatihans'] = TemaPelatihan::orderBy('name', 'asc')->get();
        return view('homepage.kontak.index', $data);
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

    public function storeTestimonial(Request $request)
    {
        $data = [
            'name' => $request->name,
            'tema_id' => $request->tema_id,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'pesan' => $request->pesan
        ];

        Testimonial::create($data);

        Session::flash('success', 'Pesan telah terkirim');
        return redirect()->back();
    }

    public function getProduk(Request $request)
    {
        $data['produk'] = [];
        if (!empty($request->keyword)) {
            $data['produk'] = Product::where(function ($query) use ($request) {
                $query->where('name', "LIKE", "%" . $request->keyword . "%");
                $query->orWhere('price', "LIKE", "%" . $request->keyword . "%");
                $query->orWhere('stock', "LIKE", "%" . $request->keyword . "%");
            })->paginate(12);
        } else {
            $data['produk'] = Product::orderBy('name', 'asc')->paginate(12);
        }
        return view('homepage.promosi.produk', $data);
    }

    public function getDetailProduk($slug)
    {
        $data['produk'] = Product::where('slug', $slug)->first();
        return view('homepage.promosi.detail_produk', $data);
    }

    public function getKerjaSama()
    {
        $data['kerja_sama'] = KerjaSama::orderBy('name','asc')->paginate(6);
        return view('homepage.promosi.kerja_sama', $data);
    }

    public function getDetailKerjaSama($slug)
    {
        $data['total'] = 0;
        $data['kerja_sama'] = KerjaSama::where('slug', $slug)->first();
        $data['other_kerja_sama'] = KerjaSama::where('slug', '!=', $slug)->latest()->limit(4)->get();
        $data['dokumens'] = DokumenKerjasama::where('id_kerjasama', $data['kerja_sama']->id)->get();
        foreach ($data['kerja_sama']->getMedia('kerja-sama') as $image) {
            $data['total']++;
        }
        return view('homepage.promosi.detail_kerja_sama', $data);
    }

}
