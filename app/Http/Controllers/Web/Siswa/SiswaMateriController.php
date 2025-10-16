<?php

namespace App\Http\Controllers\Web\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class SiswaMateriController extends Controller
{
    /**
     * Tampilkan daftar materi.
     */
    public function index()
    {
        $materis = Materi::with('creator')->latest()->paginate(10);
        return view('pages.siswa.materi.index', compact('materis'));
    }

    /**
     * Tampilkan detail materi.
     */
    public function show(Materi $materi)
    {
        return view('pages.siswa.materi.show', compact('materi'));
    }
}
