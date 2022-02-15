<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KategoriPengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KategoriPengajarController extends Controller
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
        $data['kategori_pengajars'] = KategoriPengajar::orderby('kategori_pengajar', 'asc')->get();
        return view('dashboard.kategori-pengajar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori-pengajar.create');
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
                'kategori_pengajar' => 'required'
            ], [
                'kategori_pengajar.required' => 'Kategori pengajar harus diisi!'
            ]);

            if($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "kategori_pengajar" => $request->kategori_pengajar
            ];
            KategoriPengajar::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.kategori_pengajar.index');
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
        $data['kategori_pengajar'] = KategoriPengajar::find($id);
        return view('dashboard.kategori-pengajar.edit', $data);
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
        $kategori_pengajar = KategoriPengajar::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'kategori_pengajar' => 'required'
            ], [
                'kategori_pengajar.required' => 'Kategori pengajar harus diisi!'
            ]);

            if($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                "kategori_pengajar" => $request->kategori_pengajar
            ];
            $kategori_pengajar->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.kategori_pengajar.index');
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
        $kategori_pengajar = KategoriPengajar::find($id);
        $kategori_pengajar->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
