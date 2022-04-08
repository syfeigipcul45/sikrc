<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelatihan;
use App\Models\TemaPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JadwalPelatihanController extends Controller
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
        $data['jadwal'] = JadwalPelatihan::orderby('waktu_pelatihan', 'desc')->get();
        return view('dashboard.jadwal-pelatihan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $data['tema'] = TemaPelatihan::orderby('name', 'asc')->get();
        return view('dashboard.jadwal-pelatihan.create', $data);
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
                'tema_id' => 'required',
                'lokasi_pelatihan' => 'required',
                'waktu_pelatihan' => 'required',
                // 'jam_mulai'     => 'required',
                // 'jam_berakhir'  => 'required',
                'peserta'   => 'required',
                'file_undangan' => 'required'
            ], [
                'tema_id.required' => 'Tema pelatihan harus diisi!',
                'lokasi_pelatihan.required' => 'Lokasi pelatihan harus diisi!',
                'waktu_pelatihan.required' => 'Waktu pelatihan harus diisi!',
                // 'jam_mulai.required'    => 'Jam mulai harus diisi!',
                // 'jam_berakhir.required'    => 'Jam berakhir harus diisi!',
                'peserta.required'  => 'Peserta harus diisi!',
                'file_undangan' => 'File undangan harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "tema_id" => $request->tema_id,
                "lokasi_pelatihan" => $request->lokasi_pelatihan,
                "waktu_pelatihan" => $request->waktu_pelatihan,
                // "jam_mulai"     => $request->jam_mulai,
                // "jam_berakhir"     => $request->jam_berakhir,
                "peserta"   => $request->peserta,
            ];

            if ($request->hasFile('file_undangan')) {
                $file = $request->file('file_undangan');
                $path = Storage::disk('public')->putFileAs('file-undangan', $file, time()."_".$file->getClientOriginalName());
                $data['file_undangan'] = url('/') . '/storage/' . $path;
            }
            // dd($data);

            JadwalPelatihan::create($data);

            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.jadwal_pelatihan.index');
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
        $data['jadwal'] = JadwalPelatihan::find($id);
        $data['tema'] = TemaPelatihan::orderby('name', 'asc')->get();
        return view('dashboard.jadwal-pelatihan.edit', $data);
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
        $jadwal = JadwalPelatihan::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'tema_id' => 'required',
                'lokasi_pelatihan' => 'required',
                'waktu_pelatihan' => 'required',
                // 'jam_mulai'     => 'required',
                // 'jam_berakhir'  => 'required',
                'peserta'   => 'required'
            ], [
                'tema_id.required' => 'Tema pelatihan harus diisi!',
                'lokasi_pelatihan.required' => 'Lokasi pelatihan harus diisi!',
                'waktu_pelatihan.required' => 'Waktu pelatihan harus diisi!',
                // 'jam_mulai.required'    => 'Jam mulai harus diisi!',
                // 'jam_berakhir.required'    => 'Jam berakhir harus diisi!',
                'peserta.required' => 'Peserta harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                "tema_id" => $request->tema_id,
                "lokasi_pelatihan" => $request->lokasi_pelatihan,
                "waktu_pelatihan" => $request->waktu_pelatihan,
                // "jam_mulai"     => $request->jam_mulai,
                // "jam_berakhir"     => $request->jam_berakhir
                "peserta"  => $request->peserta
            ];
            if ($request->hasFile('file_undangan')) {
                $file = $request->file('file_undangan');
                $path = Storage::disk('public')->putFileAs('file-undangan', $file, time()."_".$file->getClientOriginalName());

                Storage::disk('public')->delete('/file-undangan/' . basename($request->old_file_undangan));
                $updateData['file_undangan'] = url('/') . '/storage/' . $path;;
            } else {
                $updateData['file_undangan'] = $request->old_file_undangan;
            }

            $jadwal->update($updateData);

            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.jadwal_pelatihan.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
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
        $jadwal = JadwalPelatihan::find($id);
        $jadwal->delete();
        Session::flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
