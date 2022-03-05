<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AlumniKrc;
use App\Models\TemaPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AlumniKrcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['alumni'] = AlumniKrc::orderBy('name', 'asc')->get();
        return view('dashboard.alumni-krc.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tema'] = TemaPelatihan::orderBy('name', 'asc')->get();
        return view('dashboard.alumni-krc.create', $data);
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
                'name'          => 'required',
                'tempat_lahir'  => 'required',
                'tanggal_lahir' => 'required',
                'no_hp'         => 'required',
                'instansi'      => 'required',
                'alamat'        => 'required',
                'tema_id'       => 'required',
                'avatar'        => 'required'
            ], [
                'name.required' => 'Nama harus diisi!!',
                'tempat_lahir.required' => 'Tempat lahir harus diisi!!',
                'tanggal_lahir.required'     => 'Tanggal lahir harus diisi!!',
                'no_hp.required'         => 'No. HP harus diisi!!',
                'instansi.required'      => 'Asal instansi/lembaga harus diisi!!',
                'alamat.required'        => 'Alamat harus diisi!!',
                'tema_id.required'       => 'Tema pelatihan harus dipilih!!',
                'avatar.required'       => 'Foto harus diisi'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                'name' => $request->name,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'instansi' => $request->instansi,
                'alamat' => $request->alamat,
                'tema_id' => $request->tema_id
            ];

            $alumni = AlumniKrc::create($data);
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $alumni->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            }
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->back();
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
        $data['alumni'] = AlumniKrc::find($id);
        return view('dashboard.alumni-krc.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['tema'] = TemaPelatihan::orderBy('name', 'asc')->get();
        $data['alumni'] = AlumniKrc::find($id);
        return view('dashboard.alumni-krc.edit', $data);
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
        $alumni = AlumniKrc::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'name'          => 'required',
                'tempat_lahir'  => 'required',
                'tanggal_lahir' => 'required',
                'no_hp'         => 'required',
                'instansi'      => 'required',
                'alamat'        => 'required',
                'tema_id'       => 'required',
            ], [
                'name.required' => 'Nama harus diisi!!',
                'tempat_lahir.required' => 'Tempat lahir harus diisi!!',
                'tanggal_lahir.required'     => 'Tanggal lahir harus diisi!!',
                'no_hp.required'         => 'No. HP harus diisi!!',
                'instansi.required'      => 'Asal instansi/lembaga harus diisi!!',
                'alamat.required'        => 'Alamat harus diisi!!',
                'tema_id.required'       => 'Tema pelatihan harus dipilih!!',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                'name' => $request->name,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'instansi' => $request->instansi,
                'alamat' => $request->alamat,
                'tema_id' => $request->tema_id
            ];

            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $alumni->clearMediaCollection('avatars');
                $alumni->addMedia($request->avatar)->toMediaCollection('avatars');
            }

            $alumni->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.alumni.index');
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
        $alumni = AlumniKrc::find($id);
        $alumni->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('dashboard.alumni.index');
    }
}
