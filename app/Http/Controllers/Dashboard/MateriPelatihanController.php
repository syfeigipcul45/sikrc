<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MateriPelatihan;
use App\Models\TemaPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MateriPelatihanController extends Controller
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
        $data['tema'] = TemaPelatihan::orderby('name', 'asc')->get();
        return view('dashboard.materi-pelatihan.index', $data);
    }

    public function show($id)
    {
        $data['tema'] = TemaPelatihan::find($id);
        $data['presentasi'] = MateriPelatihan::where('tema_id', $id)->where('type', 'presentasi')->orderby('created_at', 'desc')->get();
        $data['gambar'] = MateriPelatihan::where('tema_id', $id)->where('type', 'gambar')->orderby('created_at', 'desc')->get();
        $data['video'] = MateriPelatihan::where('tema_id', $id)->where('type', 'video')->orderby('created_at', 'desc')->get();
        return view('dashboard.materi-pelatihan.show', $data);
    }

    // Presentasi
    public function createPresentasi($id)
    {
        $data['tema'] = TemaPelatihan::find($id);
        return view('dashboard.materi-pelatihan.createPresentasi', $data);
    }

    public function storePresentasi(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'link_media' => 'required',
                'caption' => 'required'
            ], [
                'link_media.required' => 'File harus dipilih!!',
                'caption.required' => 'Judul harus diisi!!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                'tema_id' => $request->tema_id,
                'caption' => $request->caption,
                'type' => 'presentasi',
                'is_published' => $request->is_published
            ];

            if ($request->hasFile('link_media')) {
                $file = $request->file('link_media');
                $path = Storage::disk('public')->putFileAs('materi', $file, time()."_".$file->getClientOriginalName());
                $data['link_media'] = url('/') . '/storage/' . $path;
            }

            MateriPelatihan::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function editPresentasi($id)
    {
        $data['materi'] = MateriPelatihan::find($id);
        return view('dashboard.materi-pelatihan.editPresentasi', $data);
    }

    public function updatePresentasi(Request $request, $id)
    {
        $materiPresentasi = MateriPelatihan::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'caption' => 'required'
            ], [
                'caption.required' => 'Judul harus diisi!!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            if($request->is_published == 1){
                $is_published = 1;
            } else {
                $is_published = 0;
            }

            $updateData = [
                'caption' => $request->caption,
                'is_published' => $is_published
            ];

            if ($request->hasFile('link_media')) {
                $file = $request->file('link_media');
                $path = Storage::disk('public')->putFileAs('materi', $file, time()."_".$file->getClientOriginalName());

                Storage::disk('public')->delete('/materi/' . basename($request->old_link_media));
                $updateData['link_media'] = url('/') . '/storage/' . $path;;
            } else {
                $updateData['link_media'] = $request->old_link_media;
            }

            $materiPresentasi->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');
            Session::flash('presentasi', 'show');

            return redirect()->route('dashboard.materi_pelatihan.show', $materiPresentasi->tema_id);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroyPresentasi($id)
    {
        $materi = MateriPelatihan::find($id);
        $materi->delete();
        Storage::disk('public')->delete('/materi/' . basename($materi->link_media));
        Session::flash('success', 'Data berhasil dihapus');
        Session::flash('presentasi', 'show');
        return redirect()->back();
    }

    // Gambar
    public function createGambar($id)
    {
        $data['tema'] = TemaPelatihan::find($id);
        return view('dashboard.materi-pelatihan.createGambar', $data);
    }

    public function storeGambar(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'link_media' => 'required',
                'caption' => 'required'
            ], [
                'link_media.required' => 'File harus dipilih!!',
                'caption.required' => 'Judul harus diisi!!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                'tema_id' => $request->tema_id,
                'caption' => $request->caption,
                'type' => 'gambar',
                'is_published' => $request->is_published
            ];

            if ($request->hasFile('link_media')) {
                $file = $request->file('link_media');
                $path = Storage::disk('public')->putFileAs('materi', $file, time()."_".$file->getClientOriginalName());
                $data['link_media'] = url('/') . '/storage/' . $path;
            }

            MateriPelatihan::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function editGambar($id)
    {
        $data['materi'] = MateriPelatihan::find($id);
        return view('dashboard.materi-pelatihan.editGambar', $data);
    }

    public function updateGambar(Request $request, $id)
    {
        $materiGambar = MateriPelatihan::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'caption' => 'required'
            ], [
                'caption.required' => 'Judul harus diisi!!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            if($request->is_published == 1){
                $is_published = 1;
            } else {
                $is_published = 0;
            }

            $updateData = [
                'caption' => $request->caption,
                'is_published' => $is_published
            ];

            if ($request->hasFile('link_media')) {
                $file = $request->file('link_media');
                $path = Storage::disk('public')->putFileAs('materi', $file, time()."_".$file->getClientOriginalName());

                Storage::disk('public')->delete('/materi/' . basename($request->old_link_media));
                $updateData['link_media'] = url('/') . '/storage/' . $path;;
            } else {
                $updateData['link_media'] = $request->old_link_media;
            }

            $materiGambar->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');
            Session::flash('gambar', 'show');

            return redirect()->route('dashboard.materi_pelatihan.show', $materiGambar->tema_id);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroyGambar($id)
    {
        $materi = MateriPelatihan::find($id);
        $materi->delete();
        Storage::disk('public')->delete('/materi/' . basename($materi->link_media));
        Session::flash('success', 'Data berhasil dihapus');
        Session::flash('gambar', 'show');
        return redirect()->back();
    }

    // Video
    public function createVideo($id)
    {
        $data['tema'] = TemaPelatihan::find($id);
        return view('dashboard.materi-pelatihan.createVideo', $data);
    }

    public function storeVideo(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'link_media' => 'required',
                'caption' => 'required'
            ], [
                'link_media.required' => 'File harus dipilih!!',
                'caption.required' => 'Judul harus diisi!!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                'tema_id' => $request->tema_id,
                'link_media' => $request->link_media,
                'caption' => $request->caption,
                'type' => 'video'
            ];

            MateriPelatihan::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function editVideo($id)
    {
        $data['materi'] = MateriPelatihan::find($id);
        return view('dashboard.materi-pelatihan.editVideo', $data);
    }

    public function updateVideo(Request $request, $id)
    {
        $materiVideo = MateriPelatihan::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'link_media' => 'required',
                'caption' => 'required'
            ], [
                'link_media.required' => 'File harus dipilih!!',
                'caption.required' => 'Judul harus diisi!!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                'link_media' => $request->link_media,
                'caption' => $request->caption,
            ];

            $materiVideo->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');
            Session::flash('video', 'show');

            return redirect()->route('dashboard.materi_pelatihan.show', $materiVideo->tema_id);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroyVideo($id)
    {
        $materi = MateriPelatihan::find($id);
        $materi->delete();
        Session::flash('success', 'Data berhasil dihapus');
        Session::flash('video', 'show');
        return redirect()->back();
    }

    public function filePresentasi($id) 
    {
        $data['materi'] = MateriPelatihan::find($id);
        return view('dashboard.materi-pelatihan.materi', $data);
    }
}
