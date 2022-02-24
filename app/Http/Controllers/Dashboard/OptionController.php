<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OptionController extends Controller
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
        $data['option'] = Option::first();
        return view('dashboard.option.settings', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'twitter' => 'required',
                'facebook' => 'required',
                'instagram' => 'required',
                'youtube' => 'required'
            ], [
                'logo.required' => 'Logo harus diisi!',
                'logo.max' => 'Logo harus di bawah atau sama dengan 2MB',
                'favicon.required' => 'Favicon harus diisi!',
                'favicon.max' => 'Favicon harus di bawah atau sama dengan 1MB',
                'phone.required' => 'Nomor telepon harus diisi!',
                'email.required' => 'Email harus diisi!',
                'email.email' => 'Format email salah',
                'address.required' => 'Alamat harus diisi!',
                'twitter.required' => 'Twitter harus diisi!',
                'facebook.required' => 'Facebook harus diisi!',
                'instagram.required' => 'Instagram harus diisi!',
                'youtube.required' => 'Youtube harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $option = Option::all();

            if($option->isEmpty()) {
                $data = [
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'whatsapp' => $request->whatsapp,
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube
                ];

                if($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $path = Storage::disk('public')->put('logo', $file);
                    $data['logo'] = url('/') . '/storage/' . $path;
                }

                if($request->hasFile('favicon')) {
                    $file = $request->file('favicon');
                    $path = Storage::disk('public')->put('favicon', $file);
                    $data['favicon'] = url('/') . '/storage/' . $path;
                }

                $saveData = Option::create($data);
                return redirect()->route('dashboard.settings.index');
            } else {
                $data = [
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'whatsapp' => $request->whatsapp,
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube
                ];

                if($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $path = Storage::disk('public')->put('logo', $file);
                    $data['logo'] = url('/') . '/storage/' . $path;
                }

                if($request->hasFile('favicon')) {
                    $file = $request->file('favicon');
                    $path = Storage::disk('public')->put('favicon', $file);
                    $data['favicon'] = url('/') . '/storage/' . $path;
                }

                $updateData = Option::where('id', $option->first()->id)->first();
                $updateData->update($data);
                Session::flash('success', 'Data Berhasil Diubah');
                return redirect()->route('dashboard.settings.index');
            }
           
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
