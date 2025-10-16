<?php

namespace App\Http\Controllers\Web\Guru;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuruBlogController extends Controller
{
    /**
     * Tampilkan daftar blog.
     */
    public function index()
    {
        $blogs = Blog::with('creator')
            ->where('created_by', Auth::id())
            ->latest()
            ->paginate(10);
        return view('pages.guru.blog.index', compact('blogs'));
    }

    /**
     * Form tambah blog.
     */
    public function create()
    {
        return view('pages.guru.blog.create');
    }

    /**
     * Simpan blog baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // max 5MB
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => Auth::id(),
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('guru.blog.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail blog.
     */
    public function show(Blog $blog)
    {
        return view('pages.guru.blog.show', compact('blog'));
    }

    /**
     * Form edit blog.
     */
    public function edit(Blog $blog)
    {
        return view('pages.guru.blog.edit', compact('blog'));
    }

    /**
     * Update blog.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => Auth::id(),
        ];

        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
                Storage::disk('public')->delete($blog->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('guru.blog.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Hapus blog.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
            Storage::disk('public')->delete($blog->thumbnail);
        }

        $blog->delete();

        return redirect()->route('guru.blog.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
