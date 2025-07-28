<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::with('file')->get();
        return view('frontend.galeri.index', compact('galeris'));
    }

    public function show($id)
    {
        $galeri = Galeri::with('file')->findOrFail($id);
        return view('frontend.galeri.show', compact('galeri'));
    }
}
