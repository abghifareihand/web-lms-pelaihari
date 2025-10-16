<?php

namespace App\Http\Controllers\Web\Guru;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruQuizController extends Controller
{
    /**
     * Tampilkan daftar quiz.
     */
    public function index()
    {
        $quizzes = Quiz::with('creator')
            ->where('created_by', Auth::id())
            ->latest()
            ->paginate(10);
        return view('pages.guru.quiz.index', compact('quizzes'));
    }

    /**
     * Form tambah quiz.
     */
    public function create()
    {
        return view('pages.guru.quiz.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|url',
        ]);

        Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('guru.quiz.index')->with('success', 'Quiz berhasil dibuat!');
    }

    /**
     * Tampilkan detail quiz.
     */
    public function show(Quiz $quiz)
    {
        return view('pages.guru.quiz.show', compact('quiz'));
    }

    /**
     * Form edit quiz.
     */
    public function edit(Quiz $quiz)
    {
        return view('pages.guru.quiz.edit', compact('quiz'));
    }

    /**
     * Update quiz.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|url',
        ]);

        $quiz->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('guru.quiz.index')->with('success', 'Quiz berhasil diperbarui!');
    }

    /**
     * Hapus quiz.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('guru.quiz.index')->with('success', 'Quiz berhasil dihapus!');
    }
}
