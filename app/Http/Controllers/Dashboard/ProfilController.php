<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['profil'] = Profil::orderby('order', 'asc')->get();
        return view('dashboard.profil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profil.create');
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
                'content' => 'required'
            ], [
                'name.required' => 'Nama submenu harus diisi!',
                'content.required' => 'Deskripsi submenu harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "name" => $request->name,
                "content" => $request->content,
                "slug" => Str::slug($request->name)
            ];

            Profil::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.profil.index');
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
        $data['profil'] = Profil::find($id);
        return view('dashboard.profil.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['profil'] = Profil::find($id);
        return view('dashboard.profil.edit', $data);
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
        $profil = Profil::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'content' => 'required'
            ], [
                'name.required' => 'Nama submenu harus diisi!',
                'content.required' => 'Deskripsi submenu harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                "name" => $request->name,
                "content" => $request->content,
                "slug" => Str::slug($request->name)
            ];

            $profil->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.profil.index');
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
        $profil = Profil::find($id);
        $profil->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }

    public function increase($id)
    {
        $profil = Profil::find($id);

        if ($profil->order > 1) {
            $profil->order = $profil->order - 1;
            $profil->save();
            Session::flash('success', 'Urutan Berhasil Naik');
        } else {
            Session::flash('error', 'Urutan Mencapai Batas Naik');
        }

        return redirect(route('dashboard.profil.index'));
    }

    public function decrease($id)
    {
        $profil = Profil::find($id);
        $profil->order = $profil->order + 1;
        $profil->save();
        Session::flash('success', 'Urutan Berhasil Turun');
        return redirect(route('dashboard.profil.index'));
    }
}
