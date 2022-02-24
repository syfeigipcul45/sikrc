<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FasilitasController extends Controller
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
        $data['fasilitas'] = Fasilitas::orderby('name', 'asc')->get();
        return view('dashboard.fasilitas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.fasilitas.create');
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
                'name' => 'required',
                'description' => 'required',
                'images' => 'required'
            ], [
                'name.required' => 'Nama pengajar harus diisi!',
                'description.required' => 'Deskripsi pengajar harus diisi!',
                'images.required' => 'Gambar harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "name" => $request->name,
                "description" => $request->description,
            ];
            // dd($data);

            $fasilitas = Fasilitas::create($data);
            foreach ($request->file('images', []) as $media) {
                $fasilitas->addMedia($media)->toMediaCollection('fasilitas');
            }

            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.fasilitas.index');
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
        $data['fasilitas'] = Fasilitas::find($id);
        return view('dashboard.fasilitas.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['fasilitas'] = Fasilitas::find($id);
        return view('dashboard.fasilitas.edit', $data);
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
        $fasilitas = Fasilitas::find($id);

        $updateData = [
            "name" => $request->name,
            "description" => $request->description,
        ];

        if ($request->file('images')) {
            if (count($request->file('images')) > 0) {
                foreach ($request->file('images', []) as $media) {
                    $fasilitas->clearMediaCollection('fasilitas');
                }
            }
        }

        foreach ($request->file('images', []) as $media) {
            $fasilitas->addMedia($media)->toMediaCollection('fasilitas');
        }

        $fasilitas->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
