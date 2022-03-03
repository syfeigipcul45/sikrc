<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TemaPelatihan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TemaPelatihanController extends Controller
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
        $data['tema'] = TemaPelatihan::orderby('name', 'asc')->get();
        return view('dashboard.tema-pelatihan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tema-pelatihan.create');
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
                'name' => 'required',
                'description' => 'required'
            ], [
                'thumbnail.required' => 'Gambar harus diisi!!',
                'thumbnail.max' => 'Ukuran gambar maskimal 5MB',
                'name.required' => 'Nama harus diisi!!',
                'description.required' => 'Deskripsi harus diisi!!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "name" => $request->name,
                "slug" => Str::slug($request->name, '-'),
                "description" => $request->description
            ];
            $tema =TemaPelatihan::create($data);
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $tema->addMediaFromRequest('thumbnail')->toMediaCollection('tema-pelatihan');
            }
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.tema_pelatihan.index');
        } catch (\Exception $th) {
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
        $data['tema'] = TemaPelatihan::find($id);
        return view('dashboard.tema-pelatihan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['tema'] = TemaPelatihan::find($id);
        return view('dashboard.tema-pelatihan.edit', $data);
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
        $tema = TemaPelatihan::find($id);
        try {
            $validator = Validator::make([
                'thumbnail' => 'max:5000',
                'name' => 'required',
                'description' => 'required'
            ], [
                'thumbnail.max' => 'Ukuran gambar maskimal 5MB',
                'name.required' => 'Nama harus diisi!!',
                'description.required' => 'Deskripsi harus diisi!!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                'name' => $request->name,
                "slug" => Str::slug($request->name, '-'),
                'description' => $request->description
            ];

            if ($request->hasFile('url_hero') && $request->file('url_hero')->isValid()) {
                $tema->clearMediaCollection('tema-pelatihan');
                $tema->addMedia($request->url_hero)->toMediaCollection('tema-pelatihan');
            }

            $tema->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.tema_pelatihan.index');
        } catch (\Exception $th) {
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
        $tema = TemaPelatihan::find($id);
        $tema->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('dashboard.tema_pelatihan.index');
    }
}
