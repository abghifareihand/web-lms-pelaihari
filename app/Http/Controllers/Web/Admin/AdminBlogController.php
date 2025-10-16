<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    /**
     * Tampilkan daftar blog.
     */
    public function index()
    {
        $blogs = Blog::with('creator')->latest()->paginate(10);
        return view('pages.admin.blog.index', compact('blogs'));
    }

    /**
     * Form tambah blog.
     */
    public function create()
    {
        $teachers = User::where('role', 'guru')->get();
        $admin = Auth::id();
        return view('pages.admin.blog.create', compact('teachers', 'admin'));
    }

    /**
     * Simpan blog baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'created_by' => 'required|exists:users,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // max 5MB
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => $request->created_by,
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blog.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail blog.
     */
    public function show(Blog $blog)
    {
        return view('pages.admin.blog.show', compact('blog'));
    }

    /**
     * Form edit blog.
     */
    public function edit(Blog $blog)
    {
        $teachers = User::where('role', 'guru')->get();
        $admin = Auth::id();
        return view('pages.admin.blog.edit', compact('blog', 'teachers', 'admin'));
    }

    /**
     * Update blog.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'created_by' => 'required|exists:users,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => $request->created_by,
        ];

        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
                Storage::disk('public')->delete($blog->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Artikel berhasil diperbarui!');
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

        return redirect()->route('admin.blog.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
