<?php

namespace App\Http\Controllers;

use App\Models\Operasional;
use App\Models\Alamat;
use App\Models\SosialMedia;
use App\Models\Footer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $operasional = Operasional::where('is_active', 1)->get();
        $alamat = Alamat::where('is_active', 1)->get();
        $sosialMedia = SosialMedia::where('is_active', 1)->get();
        $footer = Footer::where('is_active', 1)->get();
        return view('contect', compact('operasional', 'alamat', 'sosialMedia', 'footer'));
    }
}
