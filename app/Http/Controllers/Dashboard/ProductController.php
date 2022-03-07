<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
        $data['product'] = Product::orderBy('name', 'asc')->get();
        return view('dashboard.produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.produk.create');
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
                'price' => 'required',
                'stock' => 'required',
                'images' => 'required'
            ], [
                'name.required' => 'Nama produk harus diisi!',
                'description.required' => 'Deskripsi produk harus diisi!',
                'price.required' => 'Harga produk harus diisi!',
                'stock.required' => 'Stock produk harus diisi!',
                'images.required' => 'Gambar harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "name" => $request->name,
                "slug" => Str::slug($request->name, '-'),
                "price" => deleteSeparator($request->price),
                "stock" => $request->stock,
                "description" => $request->description,
            ];

            $produk = Product::create($data);
            foreach ($request->file('images', []) as $media) {
                $produk->addMedia($media)->toMediaCollection('produk');
            }

            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.produk.index');
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
        $data['produk'] = Product::find($id);
        return view('dashboard.produk.edit', $data);
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
        $produk = Product::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'stock' => 'required',
            ], [
                'name.required' => 'Nama produk harus diisi!',
                'description.required' => 'Deskripsi produk harus diisi!',
                'price.required' => 'Harga produk harus diisi!',
                'stock.required' => 'Stock produk harus diisi!',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                "name" => $request->name,
                "slug" => Str::slug($request->name, '-'),
                "price" => deleteSeparator($request->price),
                "stock" => $request->stock,
                "description" => $request->description,
            ];

            if ($request->file('images')) {
                if (count($request->file('images')) > 0) {
                    foreach ($request->file('images', []) as $media) {
                        $produk->clearMediaCollection('fasilitas');
                    }
                }
            }

            foreach ($request->file('images', []) as $media) {
                $produk->addMedia($media)->toMediaCollection('fasilitas');
            }

            $produk->update($updateData);

            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.produk.index');
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
        $produk = Product::find($id);
        $produk->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('dashboard.produk.index');
    }
}
