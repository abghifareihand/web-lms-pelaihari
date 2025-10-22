<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $today = now()->toDateString();

        // Simpan atau update kunjungan berdasarkan IP unik
        Visitor::updateOrCreate(
            ['ip_address' => $ip],
            [
                'user_agent' => $request->userAgent(),
                'last_visit' => now(),
            ]
        );

        // Hitung pengunjung hari ini
        $todayVisitors = Visitor::whereDate('last_visit', $today)->count();

        // Hitung total pengunjung unik sepanjang waktu
        $totalVisitors = Visitor::count();

        $galery = include base_path('resources/utils/galery.php');
        $quizData = include base_path('resources/utils/quiz.php');
        return view('pages.landing', compact('galery', 'quizData', 'todayVisitors', 'totalVisitors'));
    }
}
