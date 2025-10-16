<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\Admin\AdminBlogController;
use App\Http\Controllers\Web\Admin\AdminDashboardController;
use App\Http\Controllers\Web\Admin\AdminMateriController;
use App\Http\Controllers\Web\Admin\AdminMeetingController;
use App\Http\Controllers\Web\Admin\AdminProfileController;
use App\Http\Controllers\Web\Admin\AdminQuizController;
use App\Http\Controllers\Web\Admin\AdminUserController;
use App\Http\Controllers\Web\Guru\GuruBlogController;
use App\Http\Controllers\Web\Guru\GuruMateriController;
use App\Http\Controllers\Web\Guru\GuruMeetingController;
use App\Http\Controllers\Web\Guru\GuruQuizController;
use App\Http\Controllers\Web\Siswa\SiswaBlogController;
use App\Http\Controllers\Web\Siswa\SiswaMateriController;
use App\Http\Controllers\Web\Siswa\SiswaMeetingController;
use App\Http\Controllers\Web\Siswa\SiswaQuizController;
use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // ================= DASHBOARD ================= //
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    // ================= PROFILE ================= //
    Route::get('profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/{profile}', [AdminProfileController::class, 'update'])->name('profile.update');


    // ================= USER ================= //
    // GURU
    Route::get('user/guru', [AdminUserController::class, 'guruIndex'])->name('user.guru.index');
    Route::get('user/guru/create', [AdminUserController::class, 'guruCreate'])->name('user.guru.create');
    Route::post('user/guru', [AdminUserController::class, 'guruStore'])->name('user.guru.store');
    Route::get('user/guru/{user}/edit', [AdminUserController::class, 'guruEdit'])->name('user.guru.edit');
    Route::put('user/guru/{user}', [AdminUserController::class, 'guruUpdate'])->name('user.guru.update');
    Route::delete('user/guru/{user}', [AdminUserController::class, 'guruDestroy'])->name('user.guru.destroy');
    // SISWA
    Route::get('user/siswa', [AdminUserController::class, 'siswaIndex'])->name('user.siswa.index');
    Route::get('user/siswa/create', [AdminUserController::class, 'siswaCreate'])->name('user.siswa.create');
    Route::post('user/siswa', [AdminUserController::class, 'siswaStore'])->name('user.siswa.store');
    Route::get('user/siswa/{user}/edit', [AdminUserController::class, 'siswaEdit'])->name('user.siswa.edit');
    Route::put('user/siswa/{user}', [AdminUserController::class, 'siswaUpdate'])->name('user.siswa.update');
    Route::delete('user/siswa/{user}', [AdminUserController::class, 'siswaDestroy'])->name('user.siswa.destroy');

    // ================= BLOG ================= //
    Route::get('blog', [AdminBlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [AdminBlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{blog}', [AdminBlogController::class, 'show'])->name('blog.show');
    Route::get('blog/{blog}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{blog}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{blog}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');

    // ================= MATERI ================= //
    Route::get('materi', [AdminMateriController::class, 'index'])->name('materi.index');
    Route::get('materi/create', [AdminMateriController::class, 'create'])->name('materi.create');
    Route::post('materi', [AdminMateriController::class, 'store'])->name('materi.store');
    Route::get('materi/{materi}', [AdminMateriController::class, 'show'])->name('materi.show');
    Route::get('materi/{materi}/edit', [AdminMateriController::class, 'edit'])->name('materi.edit');
    Route::put('materi/{materi}', [AdminMateriController::class, 'update'])->name('materi.update');
    Route::delete('materi/{materi}', [AdminMateriController::class, 'destroy'])->name('materi.destroy');

    // ================= MEETING ================= //
    Route::get('meeting', [AdminMeetingController::class, 'index'])->name('meeting.index');
    Route::get('meeting/create', [AdminMeetingController::class, 'create'])->name('meeting.create');
    Route::post('meeting', [AdminMeetingController::class, 'store'])->name('meeting.store');
    Route::get('meeting/{meeting}', [AdminMeetingController::class, 'show'])->name('meeting.show');
    Route::get('meeting/{meeting}/edit', [AdminMeetingController::class, 'edit'])->name('meeting.edit');
    Route::put('meeting/{meeting}', [AdminMeetingController::class, 'update'])->name('meeting.update');
    Route::delete('meeting/{meeting}', [AdminMeetingController::class, 'destroy'])->name('meeting.destroy');

    // ================= QUIZ ================= //
    Route::get('quiz', [AdminQuizController::class, 'index'])->name('quiz.index');
    Route::get('quiz/create', [AdminQuizController::class, 'create'])->name('quiz.create');
    Route::post('quiz', [AdminQuizController::class, 'store'])->name('quiz.store');
    Route::get('quiz/{quiz}', [AdminQuizController::class, 'show'])->name('quiz.show');
    Route::get('quiz/{quiz}/edit', [AdminQuizController::class, 'edit'])->name('quiz.edit');
    Route::put('quiz/{quiz}', [AdminQuizController::class, 'update'])->name('quiz.update');
    Route::delete('quiz/{quiz}', [AdminQuizController::class, 'destroy'])->name('quiz.destroy');

    // ================= FALLBACK ================= //
    Route::fallback(function () {
        return redirect()->route('admin.dashboard.index');
    });
});

// Guru routes
Route::prefix('guru')->middleware(['auth', 'role:guru'])->name('guru.')->group(function () {

    // ================= BLOG ================= //
    Route::get('blog', [GuruBlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [GuruBlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [GuruBlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{blog}', [GuruBlogController::class, 'show'])->name('blog.show');
    Route::get('blog/{blog}/edit', [GuruBlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{blog}', [GuruBlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{blog}', [GuruBlogController::class, 'destroy'])->name('blog.destroy');

    // ================= MATERI ================= //
    Route::get('materi', [GuruMateriController::class, 'index'])->name('materi.index');
    Route::get('materi/create', [GuruMateriController::class, 'create'])->name('materi.create');
    Route::post('materi', [GuruMateriController::class, 'store'])->name('materi.store');
    Route::get('materi/{materi}', [GuruMateriController::class, 'show'])->name('materi.show');
    Route::get('materi/{materi}/edit', [GuruMateriController::class, 'edit'])->name('materi.edit');
    Route::put('materi/{materi}', [GuruMateriController::class, 'update'])->name('materi.update');
    Route::delete('materi/{materi}', [GuruMateriController::class, 'destroy'])->name('materi.destroy');

    // ================= MEETING ================= //
    Route::get('meeting', [GuruMeetingController::class, 'index'])->name('meeting.index');
    Route::get('meeting/create', [GuruMeetingController::class, 'create'])->name('meeting.create');
    Route::post('meeting', [GuruMeetingController::class, 'store'])->name('meeting.store');
    Route::get('meeting/{meeting}', [GuruMeetingController::class, 'show'])->name('meeting.show');
    Route::get('meeting/{meeting}/edit', [GuruMeetingController::class, 'edit'])->name('meeting.edit');
    Route::put('meeting/{meeting}', [GuruMeetingController::class, 'update'])->name('meeting.update');
    Route::delete('meeting/{meeting}', [GuruMeetingController::class, 'destroy'])->name('meeting.destroy');

    // ================= QUIZ ================= //
    Route::get('quiz', [GuruQuizController::class, 'index'])->name('quiz.index');
    Route::get('quiz/create', [GuruQuizController::class, 'create'])->name('quiz.create');
    Route::post('quiz', [GuruQuizController::class, 'store'])->name('quiz.store');
    Route::get('quiz/{quiz}', [GuruQuizController::class, 'show'])->name('quiz.show');
    Route::get('quiz/{quiz}/edit', [GuruQuizController::class, 'edit'])->name('quiz.edit');
    Route::put('quiz/{quiz}', [GuruQuizController::class, 'update'])->name('quiz.update');
    Route::delete('quiz/{quiz}', [GuruQuizController::class, 'destroy'])->name('quiz.destroy');

    // ================= FALLBACK ================= //
    Route::fallback(function () {
        return redirect()->route('guru.blog.index');
    });
});

// Siswa routes
Route::prefix('siswa')->middleware(['auth', 'role:siswa'])->name('siswa.')->group(function () {

    // ================= BLOG ================= //
    Route::get('blog', [SiswaBlogController::class, 'index'])->name('blog.index');
    Route::get('blog/{blog}', [SiswaBlogController::class, 'show'])->name('blog.show');

    // ================= MATERI ================= //
    Route::get('materi', [SiswaMateriController::class, 'index'])->name('materi.index');
    Route::get('materi/{materi}', [SiswaMateriController::class, 'show'])->name('materi.show');

    // ================= MEETING ================= //
    Route::get('meeting', [SiswaMeetingController::class, 'index'])->name('meeting.index');
    Route::get('meeting/{meeting}', [SiswaMeetingController::class, 'show'])->name('meeting.show');

    // ================= QUIZ ================= //
    Route::get('quiz', [SiswaQuizController::class, 'index'])->name('quiz.index');
    Route::get('quiz/{quiz}', [SiswaQuizController::class, 'show'])->name('quiz.show');

    // ================= FALLBACK ================= //
    Route::fallback(function () {
        return redirect()->route('siswa.blog.index');
    });
});
