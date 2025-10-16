<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminQuizController extends Controller
{
    /**
     * Tampilkan daftar quiz.
     */
    public function index()
    {
        $quizzes = Quiz::latest()->paginate(10);
        return view('pages.admin.quiz.index', compact('quizzes'));
    }

    /**
     * Form tambah quiz.
     */
    public function create()
    {
        $teachers = User::where('role', 'guru')->get();
        $admin = Auth::id();
        return view('pages.admin.quiz.create', compact('teachers', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'required|exists:users,id',
            'link' => 'required|url',
        ]);

        Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'created_by' => $request->created_by,
        ]);

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz berhasil dibuat!');
    }

    /**
     * Tampilkan detail quiz.
     */
    public function show(Quiz $quiz)
    {
        return view('pages.admin.quiz.show', compact('quiz'));
    }

    /**
     * Form edit quiz.
     */
    public function edit(Quiz $quiz)
    {
        $teachers = User::where('role', 'guru')->get();
        $admin = Auth::id();
        return view('pages.admin.quiz.edit', compact('quiz', 'teachers', 'admin'));
    }

    /**
     * Update quiz.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'required|exists:users,id',
            'link' => 'required|url',
        ]);

        $quiz->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'created_by' => $request->created_by,
        ]);

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz berhasil diperbarui!');
    }

    /**
     * Hapus quiz.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('admin.quiz.index')->with('success', 'Quiz berhasil dihapus!');
    }
}
