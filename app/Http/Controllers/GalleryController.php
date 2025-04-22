<?php

namespace App\Http\Controllers;

use App\Models\Operasional;
use App\Models\Alamat;
use App\Models\SosialMedia;
use App\Models\Footer;
use App\Models\HeaderGallery;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $operasional = Operasional::where('is_active', 1)->get();
        $alamat = Alamat::where('is_active', 1)->get();
        $sosialMedia = SosialMedia::where('is_active', 1)->get();
        $footer = Footer::where('is_active', 1)->get();
        $header = HeaderGallery::where('is_active', 1)->get();
        $gallery = Gallery::where('is_active', 1)->get();
        return view('gallery', compact('operasional', 'alamat', 'sosialMedia', 'footer', 'header', 'gallery'));
    }
}
