<?php

namespace App\Http\Controllers\Web\Guru;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruMeetingController extends Controller
{
    /**
     * Tampilkan daftar meeting.
     */
    public function index()
    {
        $meetings = Meeting::with('creator')
            ->where('created_by', Auth::id())
            ->latest()
            ->paginate(10);
        return view('pages.guru.meeting.index', compact('meetings'));
    }

    /**
     * Form tambah meeting.
     */
    public function create()
    {
        return view('pages.guru.meeting.create');
    }

    /**
     * Simpan meeting baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|url',
            'schedule_at' => 'nullable|date',
        ]);

        Meeting::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'schedule_at' => $request->schedule_at,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('guru.meeting.index')->with('success', 'Meeting berhasil dibuat!');
    }

    /**
     * Tampilkan detail meeting.
     */
    public function show(Meeting $meeting)
    {
        return view('pages.guru.meeting.show', compact('meeting'));
    }

    /**
     * Form edit meeting.
     */
    public function edit(Meeting $meeting)
    {
        return view('pages.guru.meeting.edit' , compact('meeting'));
    }

    /**
     * Update meeting.
     */
    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|url',
            'schedule_at' => 'nullable|date',
        ]);

        $meeting->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'schedule_at' => $request->schedule_at,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('guru.meeting.index')->with('success', 'Meeting berhasil diperbarui!');
    }

    /**
     * Hapus meeting.
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('guru.meeting.index')->with('success', 'Meeting berhasil dihapus!');
    }
}
