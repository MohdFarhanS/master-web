<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Routing\Controller as Controller;
use App\Models\ProfileInstansi;
use App\Models\ProfilePimpinan;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Kontak;
use App\Models\DashboardInstansi;
use App\Models\Dashboard;
use App\Models\Banner;

class FrontendController extends Controller
{
    public function dashboard() {
        $profileInstansi = ProfileInstansi::with('file')->first();
        $profilePimpinan = ProfilePimpinan::with('file')->get();
        $beritaTerbaru = Berita::with('file')->latest()->take(5)->get();
        $galeri = Galeri::with('file')->latest()->take(6)->get();
        $pengumuman = Pengumuman::latest()->take(5)->get();
        $kontak = Kontak::first();
        $banners = Banner::with('file')->where('tampilkan', true)->latest()->get();
        return view('frontend.dashboard', [
            'profileInstansi' => $profileInstansi,
            'profilePimpinan' => $profilePimpinan,
            'beritaTerbaru' => $beritaTerbaru,
            'galeri' => $galeri,
            'pengumuman' => $pengumuman,
            'kontak' => $kontak,
            'banners' => $banners
        ]);
    }
    public function __construct()
    {
        // Bagikan data dashboardInstansi ke semua tampilan frontend
        $dashboardInstansi = DashboardInstansi::first() ?? (object)[
            'judul' => 'Dashboard Instansi',
            'deskripsi' => 'Belum ada data instansi.'
        ];
        view()->share('dashboardInstansi', $dashboardInstansi);
    }

    // Detail pengumuman berdasarkan ID
    public function pengumumanDetail($id) {
        $item = Pengumuman::with('file')->findOrFail($id);
        return view('frontend.Pengumuman.detailpengumuman', compact('item'));
    }
    // Tampilkan profil instansi
    public function instansi() {
        $profileInstansi = ProfileInstansi::with('file')->first();
        return view('frontend.Profile.instansi', compact('profileInstansi'));
    }
    // Tampilkan profil pimpinan
    public function pimpinan() {
        $profilePimpinan = ProfilePimpinan::with('file')->get();
        return view('frontend.Profile.pimpinan', compact('profilePimpinan'));
    }
    // Tampilkan struktur organisasi
    public function struktur() {
        $profileInstansi = ProfileInstansi::with('file')->first();
        return view('frontend.Profile.struktur', compact('profileInstansi'));
    }
    // Tampilkan daftar berita
    public function berita() {
        $beritaList = Berita::with('file')->latest()->get();
        $beritaTerbaru = Berita::with('file')->latest()->take(5)->get();
        return view('frontend.Berita.berita', compact('beritaList', 'beritaTerbaru'));
    }

    // Detail berita berdasarkan ID
    public function beritaDetail($id) {
        $berita = Berita::with('file')->findOrFail($id);
        return view('frontend.Berita.detailberita', compact('berita'));
    }
    // Detail berita (alternatif) berdasarkan ID
    public function detailBerita($id) {
        $berita = Berita::with('file')->findOrFail($id);
        $beritaTerbaru = Berita::with('file')->latest()->take(5)->get();
        return view('frontend.Berita.detailberita', compact('berita', 'beritaTerbaru'));
    }
    // Tampilkan galeri foto
    public function galeri() {
        $galeri = Galeri::with('file')->latest()->get();
        return view('frontend.Galeri.galeri', compact('galeri'));
    }
    // Tampilkan daftar pengumuman
    public function pengumuman() {
        $pengumuman = Pengumuman::with('file')->latest()->get();
        return view('frontend.Pengumuman.pengumuman', compact('pengumuman'));
    }
    // Tampilkan semua pengumuman dengan pagination
    public function semuaPengumuman() {
        $pengumuman = Pengumuman::latest()->paginate(10);
        $totalPengumuman = Pengumuman::count();
        return view('frontend.Pengumuman.semua-pengumuman', compact('pengumuman', 'totalPengumuman'));
    }
    // Tampilkan halaman kontak
    public function kontak() {
        $kontak = Kontak::first();
        return view('frontend.Kontak.kontak', compact('kontak'));
    }
    // Detail galeri berdasarkan ID
    public function galeriDetail($id) {
        $foto = Galeri::with('file')->findOrFail($id);
        return view('frontend.Galeri.detail', compact('foto'));
    }
}