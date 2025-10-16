<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMeetingController extends Controller
{
    /**
     * Tampilkan daftar meeting.
     */
    public function index()
    {
        $meetings = Meeting::latest()->paginate(10);
        return view('pages.admin.meeting.index', compact('meetings'));
    }

    /**
     * Form tambah meeting.
     */
    public function create()
    {
        $teachers = User::where('role', 'guru')->get();
        $admin = Auth::id();
        return view('pages.admin.meeting.create', compact('teachers', 'admin'));
    }

    /**
     * Simpan meeting baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'required|exists:users,id',
            'link' => 'required|url',
            'schedule_at' => 'nullable|date',
        ]);

        Meeting::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'schedule_at' => $request->schedule_at,
            'created_by' => $request->created_by,
        ]);

        return redirect()->route('admin.meeting.index')->with('success', 'Meeting berhasil dibuat!');
    }

    /**
     * Tampilkan detail meeting.
     */
    public function show(Meeting $meeting)
    {
        return view('pages.admin.meeting.show', compact('meeting'));
    }

    /**
     * Form edit meeting.
     */
    public function edit(Meeting $meeting)
    {
        $teachers = User::where('role', 'guru')->get();
        $admin = Auth::id();
        return view('pages.admin.meeting.edit', compact('meeting','teachers', 'admin'));
    }

    /**
     * Update meeting.
     */
    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'required|exists:users,id',
            'link' => 'required|url',
            'schedule_at' => 'nullable|date',
        ]);

        $meeting->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'schedule_at' => $request->schedule_at,
            'created_by' => $request->created_by,
        ]);

        return redirect()->route('admin.meeting.index')->with('success', 'Meeting berhasil diperbarui!');
    }

    /**
     * Hapus meeting.
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('admin.meeting.index')->with('success', 'Meeting berhasil dihapus!');
    }
}
