<?php

namespace App\Http\Controllers\Web\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class SiswaQuizController extends Controller
{
    /**
     * Tampilkan daftar quiz.
     */
    public function index()
    {
        $quizzes = Quiz::with('creator')->latest()->paginate(10);
        return view('pages.siswa.quiz.index', compact('quizzes'));
    }

    /**
     * Tampilkan detail quiz.
     */
    public function show(Quiz $quiz)
    {
        return view('pages.siswa.quiz.show', compact('quiz'));
    }
}

