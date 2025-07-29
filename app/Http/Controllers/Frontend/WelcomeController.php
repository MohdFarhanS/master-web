<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Berita;

class WelcomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->take(5)->get();
        $news = Berita::latest()->take(5)->get();
        return view('frontend.welcome', compact('announcements', 'news'));
    }

    public function historiHariIni()
    {
        $today = now()->toDateString();
        $announcements = Announcement::whereDate('created_at', $today)->get();
        $news = Berita::whereDate('created_at', $today)->get();
        return view('frontend.histori', compact('announcements', 'news'));
    }
}
