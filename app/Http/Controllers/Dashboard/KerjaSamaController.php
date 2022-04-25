<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DokumenKerjasama;
use App\Models\KerjaSama;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
        $count = KerjaSama::latest()->first();
        if ($count == null) {
            $id = 1;
        } else {
            $id = ($count->id + 1);
        }

        // $files = [];
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'images' => 'required',
            ], [
                'name.required' => 'Nama kerja sama harus diisi!',
                'description.required' => 'Deskripsi kerja sama harus diisi!',
                'images.required' => 'Gambar harus diisi!',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "id" => $id,
                "name" => $request->name,
                "description" => $request->description,
                "slug" => Str::slug($request->name, '-')
            ];

            // $data['link_file'] = json_encode($files);

            $kerja_sama = KerjaSama::create($data);

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

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $key => $file) {
                    // $file = $request->files[$key];
                    $path = Storage::disk('public')->putFileAs('dokumen-kerjasama', $file, time() . "_" . $file->getClientOriginalName());
                    $dokumen['id_kerjasama'] = $id;
                    $dokumen['name'] = $request->names[$key];
                    $dokumen['link_file'] = url('/') . '/storage/' . $path;
                    // $file = url('/') . '/storage/' . $path;
                    // array_push($files, $file);
                    DokumenKerjasama::insert($dokumen);
                }
            }

            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.kerja_sama.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
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
        $data['dokumens'] = DokumenKerjasama::where('id_kerjasama', $id)->get();
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
        $data['dokumens'] = DokumenKerjasama::where('id_kerjasama', $id)->get();
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

        // tambah file
        if ($request->hasFile('addFiles')) {
            foreach ($request->file('addFiles') as $key => $file) {
                // $file = $request->files[$key];
                $path = Storage::disk('public')->putFileAs('dokumen-kerjasama', $file, time() . "_" . $file->getClientOriginalName());
                $dokumen['id_kerjasama'] = $id;
                $dokumen['name'] = $request->addNames[$key];
                $dokumen['link_file'] = url('/') . '/storage/' . $path;
                // $file = url('/') . '/storage/' . $path;
                // array_push($files, $file);
                DokumenKerjasama::insert($dokumen);
            }
        }

        // update dokumen
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $dokumen_kerjasama = DokumenKerjasama::find($request->id_dokumen[$key]);
                // if ($request->hasFile('files')) {
                $path = Storage::disk('public')->putFileAs('dokumen-kerjasama', $file, $file->getClientOriginalName());
                $updateDokumen['name'] = $request->names[$key];
                Storage::disk('public')->delete('/dokumen-kerjasama/' . basename($request->old_link_file[$key]));
                $updateDokumen['link_file'] = url('/') . '/storage/' . $path;
                // } else {
                //     $updateDokumen['name'] = $request->names[$key];
                //     $updateDokumen['link_file'] = $request->old_link_file;
                // }                           
                $dokumen_kerjasama->update($updateDokumen);
            }
        } else {
            if ($request->has('names')) {
                foreach ($request->names as $key => $value) {
                    // for($i = 0; $i < count($request->names); $i++) {
                    $dokumen_kerjasama = DokumenKerjasama::find($request->id_dokumen[$key]);
                    // if ($request->hasFile('files')) {
                    // $path = Storage::disk('public')->putFileAs('datas', $file, $file->getClientOriginalName());
                    // $updateDokumen['name'] = $request->names[$key];
                    // Storage::disk('public')->delete('/dokumen-kerjasama/' . basename($request->old_link_file));
                    // $updateDokumen['link_file'] = url('/') . '/storage/' . $path;
                    // } else {
                    $updateDokumen['name'] = $request->names[$key];
                    $updateDokumen['link_file'] = $request->old_link_file[$key];
                    // }
                    $dokumen_kerjasama->update($updateDokumen);
                }
            }
        }

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
        $dokumen = DokumenKerjasama::where('id_kerjasama', $id);
        $dokumen->delete();
        $kerja_sama = KerjaSama::find($id);
        $kerja_sama->delete();
        Storage::disk('public')->delete('/dokumen-kerjasama/' . basename($dokumen->get('link_file')));
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }

    public function destroyDokumen($id)
    {
        $dokumen = DokumenKerjasama::find($id);
        $dokumen->delete();
        Storage::disk('public')->delete('/dokumen-kerjasama/' . basename($dokumen->link_file));
        Session::flash('success', 'Dokumen Berhasil Dihapus');

        return redirect()->back();
    }
}
