<?php

namespace App\Http\Controllers\Web\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class SiswaBlogController extends Controller
{
    /**
     * Tampilkan daftar blog.
     */
    public function index()
    {
        $blogs = Blog::with('creator')->latest()->paginate(10);
        return view('pages.siswa.blog.index', compact('blogs'));
    }

    /**
     * Tampilkan detail blog.
     */
    public function show(Blog $blog)
    {
        return view('pages.siswa.blog.show', compact('blog'));
    }
}
