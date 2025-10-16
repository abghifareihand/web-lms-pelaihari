<?php

namespace App\Http\Controllers\Web\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        return view('pages.siswa.dashboard');
    }
}
