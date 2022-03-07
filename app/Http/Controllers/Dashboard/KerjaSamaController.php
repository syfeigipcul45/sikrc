<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KerjaSama;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KerjaSamaController extends Controller
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
        $data['kerja_sama'] = KerjaSama::orderby('name', 'asc')->get();
        return view('dashboard.kerja-sama.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kerja-sama.create');
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
                'images' => 'required',
            ], [
                'name.required' => 'Nama kerja sama harus diisi!',
                'description.required' => 'Deskripsi kerja sama harus diisi!',
                'images.required' => 'Gambar harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "name" => $request->name,
                "description" => $request->description,
                "slug" => Str::slug($request->name, '-')
            ];
            // dd($data);

            $kerja_sama = KerjaSama::create($data);
            foreach ($request->file('images', []) as $media) {
                $kerja_sama->addMedia($media)->toMediaCollection('kerja-sama');
            }

            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.kerja_sama.index');
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
        $data['kerja_sama'] = KerjaSama::find($id);
        return view('dashboard.kerja-sama.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['kerja_sama'] = KerjaSama::find($id);
        return view('dashboard.kerja-sama.edit', $data);
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
        $kerja_sama = KerjaSama::find($id);

        $updateData = [
            "name" => $request->name,
            "description" => $request->description,
            "slug" => Str::slug($request->name, '-')
        ];

        if ($request->file('images')) {
            if (count($request->file('images')) > 0) {
                foreach ($request->file('images', []) as $media) {
                    $kerja_sama->clearMediaCollection('kerja-sama');
                }
            }
        }

        foreach ($request->file('images', []) as $media) {
            $kerja_sama->addMedia($media)->toMediaCollection('kerja-sama');
        }

        $kerja_sama->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.kerja_sama.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kerja_sama = KerjaSama::find($id);
        $kerja_sama->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
