<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MediaGalleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MediaGalleriesController extends Controller
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
    public function indexPhoto()
    {
        $data['photos'] = MediaGalleries::where('type', 'photo')->latest()->get();
        return view('dashboard.media.photo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPhoto()
    {
        return view('dashboard.media.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePhoto(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'caption' => 'required',
                'images' => 'required'
            ], [
                'caption.required' => 'Caption harus diisi!',
                'images.required' => 'Gambar harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "caption" => $request->caption,
                "type" => "photo"
            ];
            // dd($data);

            $photo = MediaGalleries::create($data);
            foreach ($request->file('images', []) as $media) {
                $photo->addMedia($media)->toMediaCollection('media-photo');
            }

            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.media_photo.index');
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
    public function showPhoto($id)
    {
        $data['photo'] = MediaGalleries::find($id);
        return view('dashboard.media.photo.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPhoto($id)
    {
        $data['photo'] = MediaGalleries::find($id);
        return view('dashboard.media.photo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePhoto(Request $request, $id)
    {
        $photo = MediaGalleries::find($id);

        $updateData = [
            "caption" => $request->caption,
        ];

        if ($request->file('images')) {
            if (count($request->file('images')) > 0) {
                foreach ($request->file('images', []) as $media) {
                    $photo->clearMediaCollection('media-photo');
                }
            }
        }

        foreach ($request->file('images', []) as $media) {
            $photo->addMedia($media)->toMediaCollection('media-photo');
        }

        $photo->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.media_photo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPhoto($id)
    {
        $photo = MediaGalleries::find($id);
        $photo->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexVideo()
    {
        $data['videos'] = MediaGalleries::where('type', 'video')->latest()->get();
        return view('dashboard.media.video.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVideo()
    {
        return view('dashboard.media.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVideo(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'caption' => 'required',
                'link_media' => 'required'
            ], [
                'caption.required' => 'Caption harus diisi!',
                'link_media.required' => 'Link media harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "link_media" => $request->link_media,
                "caption" => $request->caption,
                "type" => "video"
            ];

            MediaGalleries::create($data);

            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.media_video.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVideo($id)
    {
        $data['video'] = MediaGalleries::find($id);
        return view('dashboard.media.video.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVideo(Request $request, $id)
    {
        $video = MediaGalleries::find($id);

        $updateData = [
            "link_media" => $request->link_media,
            "caption" => $request->caption,
        ];

        $video->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.media_video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVideo($id)
    {
        $video = MediaGalleries::find($id);
        $video->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
