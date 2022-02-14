<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index() {
        $data['posts'] = Post::latest()->get();
        return view('dashboard.posts.index', $data);
    }

    public function create() {
        return view('dashboard.posts.create');
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'content' => 'required',
            ], [
                'title.required' => 'Judul berita harus diisi!',
                'content.required' => 'Konten berita harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "author_id" => Auth::user()->id,
                "title" => $request->title,
                "slug" => Str::slug($request->title, '-'),
                "content" => $request->content,
            ];

            $post = Post::create($data);
            if ($request->hasFile('media') && $request->file('media')->isValid()) {
                $post->addMediaFromRequest('media')->toMediaCollection('posts');
            }
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.posts.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function edit($id) {
        $data['posts'] = Post::find($id);
        return view('dashboard.posts.edit', $data);
    }

    public function show($id) {
        $data['posts'] = Post::find($id);
        return view('dashboard.posts.show', $data);
    }

    public function update(Request $request, $id) {
        $post = Post::find($id);

        $updateData = [
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title, '-'),
        ];

        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $post->clearMediaCollection('posts');
            $post->addMedia($request->media)->toMediaCollection('posts');
        }

        $post->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.posts.index');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
