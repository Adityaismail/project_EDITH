<?php

namespace App\Http\Controllers;

use App\Models\Operasional;
use App\Models\Alamat;
use App\Models\SosialMedia;
use App\Models\Footer;
use App\Models\Slider;
use App\Models\Promotion;
use App\Models\Feedback;
use App\Models\Banner;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $operasional = Operasional::where('is_active', 1)->get();
        $alamat = Alamat::where('is_active', 1)->get();
        $sosialMedia = SosialMedia::where('is_active', 1)->get();
        $footer = Footer::where('is_active', 1)->get();
        $slider = Slider::where('is_active', 1)->get();
        $promotion = Promotion::where('is_active', 1)->get();
        $feedback = Feedback::where('is_active', 1)->get();
        $banner = Banner::where('is_active', 1)->get();
        $bestSeller = Produk::where('is_active', 1)->whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'Best Seller');
        })->get();
        $newProduk = Produk::where('is_active', 1)->whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'New Produk');
        })->get();
        $promo = Produk::where('is_active', 1)->whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'Promo');
        })->get();

        return view('home', compact(
            'operasional',
            'alamat',
            'sosialMedia',
            'footer',
            'slider',
            'promotion',
            'feedback',
            'banner',
            'bestSeller',
            'newProduk',
            'promo'
        ));
    }
}
