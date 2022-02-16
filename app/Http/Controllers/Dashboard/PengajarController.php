<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KategoriPengajar;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PengajarController extends Controller
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

    public function index()
    {
        $data['pengajars'] = Pengajar::orderby('parent_menu', 'asc')
            ->orderby('name', 'asc')->get();
        return view('dashboard.pengajar.index', $data);
    }

    public function create()
    {
        $data['kategori_pengajars'] = KategoriPengajar::orderby('kategori_pengajar', 'asc')->get();
        return view('dashboard.pengajar.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'parent_menu' => 'required',
                'media' => 'required'
            ], [
                'name.required' => 'Nama pengajar harus diisi!',
                'description.required' => 'Deskripsi pengajar harus diisi!',
                'parent_menu.required' => 'Kategori pengajar harus diisi!',
                'media.required' => 'Gambar harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "name" => $request->name,
                "description" => $request->description,
                "parent_menu" => $request->parent_menu,
            ];

            $pengajar = Pengajar::create($data);
            if ($request->hasFile('media') && $request->file('media')->isValid()) {
                $pengajar->addMediaFromRequest('media')->toMediaCollection('pengajars');
            }
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.instructur.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function edit($id)
    {
        $data['pengajar'] = Pengajar::find($id);
        $data['kategori_pengajars'] = KategoriPengajar::orderby('kategori_pengajar', 'asc')->get();
        return view('dashboard.pengajar.edit', $data);
    }

    public function show($id)
    {
        $data['pengajar'] = Pengajar::find($id);
        $data['kategori_pengajars'] = KategoriPengajar::orderby('kategori_pengajar', 'asc')->get();
        return view('dashboard.pengajar.show', $data);
    }

    public function update(Request $request, $id)
    {
        $pengajar = Pengajar::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'parent_menu' => 'required',
                'media' => 'required'
            ], [
                'name.required' => 'Nama pengajar harus diisi!',
                'description.required' => 'Deskripsi pengajar harus diisi!',
                'parent_menu.required' => 'Kategori pengajar harus diisi!',
                'media.required' => 'Gambar harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                "name" => $request->name,
                "description" => $request->description,
                "parent_menu" => $request->parent_menu,
            ]; 

            if ($request->hasFile('media') && $request->file('media')->isValid()) {
                $pengajar->clearMediaCollection('pengajars');
                $pengajar->addMedia($request->media)->toMediaCollection('pengajars');
            }

            $pengajar->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.instructur.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function destroy($id)
    {
        $pengajar = Pengajar::find($id);
        $pengajar->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
