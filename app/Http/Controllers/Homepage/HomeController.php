<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\HeroImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['hero_images'] = HeroImage::all();
        return view('homepage.index', $data);
    }
}
