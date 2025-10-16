<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $galery = include base_path('resources/utils/galery.php');
        $quizData = include base_path('resources/utils/quiz.php');
        return view('pages.landing', compact('galery', 'quizData'));
    }
}
