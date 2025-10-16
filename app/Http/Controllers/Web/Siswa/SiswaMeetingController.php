<?php

namespace App\Http\Controllers\Web\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class SiswaMeetingController extends Controller
{
    /**
     * Tampilkan daftar meeting.
     */
    public function index()
    {
        $meetings = Meeting::with('creator')->latest()->paginate(10);
        return view('pages.siswa.meeting.index', compact('meetings'));
    }

    /**
     * Tampilkan detail meeting.
     */
    public function show(Meeting $meeting)
    {
        return view('pages.siswa.meeting.show', compact('meeting'));
    }
}
