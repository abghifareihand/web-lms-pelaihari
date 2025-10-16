<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Materi;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total guru & siswa
        $guruCount = User::where('role', 'guru')->count();
        $siswaCount = User::where('role', 'siswa')->count();

        // Hari ini
        $startOfDay = Carbon::now()->startOfDay();
        $endOfDay = Carbon::now()->endOfDay();

        $guruToday = User::where('role', 'guru')
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->count();

        $siswaToday = User::where('role', 'siswa')
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->count();

        // Jumlah minggu ini
        $startOfWeek = Carbon::now()->startOfWeek(); // Senin
        $endOfWeek = Carbon::now()->endOfWeek();     // Minggu

        $guruThisWeek = User::where('role', 'guru')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        $siswaThisWeek = User::where('role', 'siswa')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        // Jumlah minggu sebelumnya
        $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek();

        $guruLastWeek = User::where('role', 'guru')
            ->whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])
            ->count();

        $siswaLastWeek = User::where('role', 'siswa')
            ->whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])
            ->count();

        // Perubahan minggu ini
        $guruIncrease = $guruThisWeek - $guruLastWeek;
        $siswaIncrease = $siswaThisWeek - $siswaLastWeek;

        // Total blog
        $totalBlog = Blog::count();
        $blogThisWeek = Blog::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $blogToday = Blog::whereBetween('created_at', [$startOfDay, $endOfDay])->count();

        // Total materi
        $totalMateri = Materi::count();
        $materiThisWeek = Materi::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $materiToday = Materi::whereBetween('created_at', [$startOfDay, $endOfDay])->count();

        // Ambil 10 user terbaru (guru & siswa)
        $latestUsers = User::where('role', '!=', 'admin')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('pages.admin.dashboard', compact(
            'guruCount',
            'siswaCount',
            'guruToday',
            'siswaToday',
            'guruIncrease',
            'siswaIncrease',
            'totalBlog',
            'blogThisWeek',
            'blogToday',
            'totalMateri',
            'materiThisWeek',
            'materiToday',
            'latestUsers'
        ));
    }
}
