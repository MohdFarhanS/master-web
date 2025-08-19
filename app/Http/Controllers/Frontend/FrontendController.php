<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\View;
use App\Models\ProfileInstansi;
use App\Models\ProfilePimpinan;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Kontak;
use App\Models\DashboardInstansi;
use App\Models\Banner;
use App\Models\File;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $profileInstansi = ProfileInstansi::with('file')->first();
        $profilePimpinan = ProfilePimpinan::with('file')->get();
        $beritaTerbaru = Berita::with('file')->latest()->take(5)->get();
        $galeri = Galeri::with('file')->latest()->take(6)->get();
        $pengumuman = Pengumuman::latest()->take(5)->get();
        $kontak = Kontak::first();
        $banners = Banner::with('file')->where('tampilkan', true)->latest()->get();

        return view('frontend.dashboard', compact(
            'profileInstansi',
            'profilePimpinan',
            'beritaTerbaru',
            'galeri',
            'pengumuman',
            'kontak',
            'banners'
        ));
    }

    public function instansi()
    {
        $profileInstansi = ProfileInstansi::with('file')->first();
        return view('frontend.Profile.instansi', compact('profileInstansi'));
    }

    public function pimpinan()
    {
        $profilePimpinan = ProfilePimpinan::with('file')->get();
        return view('frontend.Profile.pimpinan', compact('profilePimpinan'));
    }

    public function struktur()
    {
        $profileInstansi = ProfileInstansi::with('file')->first();
        return view('frontend.Profile.struktur', compact('profileInstansi'));
    }

    public function berita()
    {
        $beritaList = Berita::with('file')->latest()->get();
        $beritaTerbaru = Berita::with('file')->latest()->take(5)->get();
        $kontak = Kontak::first();
        return view('frontend.Berita.berita', compact('beritaList', 'beritaTerbaru'));
    }

    public function beritaDetail($id)
    {
        $berita = Berita::with('file')->findOrFail($id);
        $beritaTerbaru = Berita::with('file')->latest()->take(5)->get();
        return view('frontend.Berita.detailberita', compact('berita', 'beritaTerbaru'));
    }
    
    public function galeri()
    {
        $galeri = Galeri::with('file')->latest()->get();
        return view('frontend.Galeri.galeri', compact('galeri'));
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::with('file')->latest()->get();
        return view('frontend.Pengumuman.pengumuman', compact('pengumuman'));
    }
    
    public function pengumumanDetail($id)
    {
        $item = Pengumuman::with('file')->findOrFail($id);
        return view('frontend.Pengumuman.detailpengumuman', compact('item'));
    }

    public function semuaPengumuman()
    {
        $pengumuman = Pengumuman::with('file')->latest()->paginate(10);
        $totalPengumuman = Pengumuman::count();
        return view('frontend.Pengumuman.semua-pengumuman', compact('pengumuman', 'totalPengumuman'));
    }

    public function kontak()
    {
        $kontak = Kontak::first();
        return view('frontend.Kontak.kontak', compact('kontak'));
    }
}