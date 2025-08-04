<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\ProfileInstansi;
use App\Models\ProfilePimpinan;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Kontak;
use App\Models\DashboardInstansi;
use App\Models\Dashboard;

class FrontendController extends Controller
{
    public function __construct()
    {
        $dashboardInstansi = DashboardInstansi::first();
        view()->share('dashboardInstansi', $dashboardInstansi);
    }

    public function dashboard()
    {
        $profileInstansi = ProfileInstansi::with('file')->first();
        $profilePimpinan = ProfilePimpinan::with('file')->get();
        $beritaTerbaru = Berita::with('file')->latest()->take(5)->get();
        $galeri = Galeri::with('file')->latest()->take(6)->get();
        $pengumuman = Pengumuman::latest()->take(5)->get();
        $kontak = Kontak::first();
        return view('frontend.dashboard', compact('profileInstansi', 'profilePimpinan', 'beritaTerbaru', 'galeri', 'pengumuman', 'kontak'));
    }

    public function galeri()
    {
        $galeri = Galeri::latest()->get();
        return view('frontend.Galeri.galeri', compact('galeri'));
    }

    public function pengumumanDetail($id)
    {
        $item = Pengumuman::with('file')->findOrFail($id);
        $totalPengumuman = Pengumuman::count();
        return view('frontend.Pengumuman.detailpengumuman', compact('item', 'totalPengumuman'));
    }

    public function instansi()
    {
        return view('frontend.Profile.instansi', [
            'profileInstansi' => ProfileInstansi::with('file')->first()
        ]);
    }

    public function pimpinan()
    {
        return view('frontend.Profile.pimpinan', [
            'profilePimpinan' => ProfilePimpinan::with('file')->get()
        ]);
    }

    public function struktur()
    {
        return view('frontend.Profile.struktur', [
            'profileInstansi' => ProfileInstansi::with('file')->first()
        ]);
    }

    public function berita()
    {
        return view('frontend.Berita.berita', [
            'beritaList' => Berita::with('file')->latest()->get(),
            'beritaTerbaru' => Berita::with('file')->latest()->take(5)->get()
        ]);
    }

    public function kontak()
    {
        return view('frontend.Kontak.kontak', [
            'kontak' => Kontak::first()
        ]);
    }
}