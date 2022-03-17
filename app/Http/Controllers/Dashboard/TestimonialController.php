<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['testimonials'] = Testimonial::orderBy('is_published', 'desc')->orderBy('created_at', 'desc')->get();
        return view('dashboard.testimonial.index', $data);
    }

    public function update($id, Request $request)
    {
        $testimonial = Testimonial::find($id);

        $updateData = [
            'is_published' => $request->is_published
        ];

        $testimonial->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.testimonial.index');
    }

    public function show($id) 
    {
        $data['testimonial'] = Testimonial::find($id);
        return view('dashboard.testimonial.show', $data);
    }
}
