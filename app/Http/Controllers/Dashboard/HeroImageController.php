<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HeroImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeroImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['hero_images'] = HeroImage::all();
        return view('dashboard.hero-images.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hero-images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'thumbnail' => 'required|max:5000',
                'title' => 'required',
                'description' => 'required'
            ], [
                'thumbnail.required' => 'Gambar harus diisi!',
                'thumbnail.max' => 'Ukuran gambar maskimal 5MB',
                'title.required' => 'Judul harus diisi!',
                'description.required' => 'Deskripsi harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "title" => $request->title,
                "description" => $request->description,
            ];

            $hero_image = HeroImage::create($data);
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $hero_image->addMediaFromRequest('thumbnail')->toMediaCollection('hero-image');
            }
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.hero_images.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
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
        $data['hero_image'] = HeroImage::find($id);
        return view('dashboard.hero-images.edit', $data);
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
        $hero_image = HeroImage::find($id);

        try {
            $validator = Validator::make($request->all(), [
                'thumbnail' => 'max:5000',
                'title' => 'required',
                'description' => 'required'
            ], [
                'thumbnail.max' => 'Ukuran gambar maskimal 5MB',
                'title.required' => 'Judul harus diisi!',
                'description.required' => 'Deskripsi harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            if ($request->hasFile('url_hero') && $request->file('url_hero')->isValid()) {
                $hero_image->clearMediaCollection('hero-image');
                $hero_image->addMedia($request->url_hero)->toMediaCollection('posts');
            }

            $hero_image->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.hero_images.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero_image = HeroImage::find($id);
        $hero_image->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
