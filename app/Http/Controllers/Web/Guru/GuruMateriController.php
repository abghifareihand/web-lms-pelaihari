<?php

namespace App\Http\Controllers\Web\Guru;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuruMateriController extends Controller
{
    /**
     * Tampilkan daftar materi.
     */
    public function index()
    {
        $materis = Materi::with('creator')
            ->where('created_by', Auth::id())
            ->latest()
            ->paginate(10);
        return view('pages.guru.materi.index', compact('materis'));
    }

    /**
     * Form tambah materi baru.
     */

    public function create()
    {
        return view('pages.guru.materi.create');
    }

    /**
     * Simpan materi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:file,video,youtube,website',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240', // 10MB
            'file_video' => 'nullable|required_if:type,video|mimes:mp4,mov,avi|max:51200', // 50MB
            'link_youtube' => 'nullable|required_if:type,youtube|url',
            'link_website' => 'nullable|required_if:type,website|url',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'created_by' => Auth::id(),
        ];

        // Upload file PDF
        if ($request->type === 'file' && $request->hasFile('file_upload')) {
            $data['file_path'] = $request->file('file_upload')->store('materi/file', 'public');
        }

        // Upload file video
        if ($request->type === 'video' && $request->hasFile('file_video')) {
            $data['file_path'] = $request->file('file_video')->store('materi/video', 'public');
        }

        // Upload link YouTube
        if ($request->type === 'youtube') {
            $data['link_url'] = $request->link_youtube;
        }

        // Upload link Website
        if ($request->type === 'website') {
            $data['link_url'] = $request->link_website;
        }

        Materi::create($data);

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail materi.
     */
    public function show(Materi $materi)
    {
        return view('pages.guru.materi.show', compact('materi'));
    }

    /**
     * Form edit materi.
     */
    public function edit(Materi $materi)
    {
        return view('pages.guru.materi.edit', compact('materi'));
    }

    /**
     * Update materi.
     */
    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:file,video,youtube,website',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240', // 10MB
            'file_video' => 'nullable|file|mimes:mp4,mov,avi|max:51200', // 50MB
            'link_youtube' => 'nullable|url',
            'link_website' => 'nullable|url',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'created_by' => Auth::id(),
        ];

        // Hapus file lama jika tipe berubah atau file diupload baru
        if (in_array($materi->type, ['file', 'video']) && $materi->file_path && Storage::disk('public')->exists($materi->file_path)) {
            Storage::disk('public')->delete($materi->file_path);
        }

        // Upload file baru sesuai tipe
        if ($request->type === 'file' && $request->hasFile('file_upload')) {
            $data['file_path'] = $request->file('file_upload')->store('materi/file', 'public');
            $data['link_url'] = null;
        }

        if ($request->type === 'video' && $request->hasFile('file_video')) {
            $data['file_path'] = $request->file('file_video')->store('materi/video', 'public');
            $data['link_url'] = null;
        }

        // Link YouTube
        if ($request->type === 'youtube') {
            $data['file_path'] = null;
            $data['link_url'] = $request->link_youtube;
        }

        // Link Website
        if ($request->type === 'website') {
            $data['file_path'] = null;
            $data['link_url'] = $request->link_website;
        }

        $materi->update($data);

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil diperbarui!');
    }


    /**
     * Hapus materi.
     */
    public function destroy(Materi $materi)
    {
        if ($materi->file_path && Storage::disk('public')->exists($materi->file_path)) {
            Storage::disk('public')->delete($materi->file_path);
        }

        $materi->delete();

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil dihapus!');
    }
}
