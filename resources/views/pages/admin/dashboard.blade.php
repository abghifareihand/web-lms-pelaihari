@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row gy-4">

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-3">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                        <div class="d-flex align-items-center">
                            <div
                                class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                <span
                                    class="mb-0 w-40-px h-40-px bg-primary-600 flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6">
                                    <iconify-icon icon="fa-solid:users"
                                        class="text-white text-2xl mb-0"></iconify-icon>
                                </span>
                            </div>
                            <div>
                                <span class="mb-2 fw-medium text-secondary-light text-md">Total Guru</span>
                                <h6 class="fw-semibold my-1">{{ $guruCount }}</h6>
                                {{-- <p class="text-sm mb-0">
                                    Kenaikan
                                    <span class="fw-medium text-success-main text-sm">
                                        {{ $guruToday >= 0 ? '+' : '' }}{{ $guruToday }}
                                    </span>
                                    hari ini
                                </p> --}}
                                {{-- <p class="text-sm mb-0">
                                    Kenaikan
                                    <span class="fw-medium text-success-main text-sm">
                                        {{ $guruIncrease >= 0 ? '+' : '' }}{{ $guruIncrease }}
                                    </span>
                                    minggu ini
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Widget End -->

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-2">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                        <div class="d-flex align-items-center">
                            <div
                                class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                <span
                                    class="mb-0 w-40-px h-40-px bg-purple flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6">
                                    <iconify-icon icon="fa-solid:users"
                                        class="text-white text-2xl mb-0"></iconify-icon>
                                </span>
                            </div>
                            <div>
                                <span class="mb-2 fw-medium text-secondary-light text-md">Total Siswa</span>
                                <h6 class="fw-semibold my-1">{{ $siswaCount }}</h6>
                                {{-- <p class="text-sm mb-0">
                                    Kenaikan
                                    <span class="fw-medium text-success-main text-sm">
                                        {{ $siswaToday >= 0 ? '+' : '' }}{{ $siswaToday }}
                                    </span>
                                    hari ini
                                </p>
                                <p class="text-sm mb-0">
                                    Kenaikan
                                    <span class="fw-medium text-success-main text-sm">
                                        {{ $siswaIncrease >= 0 ? '+' : '' }}{{ $siswaIncrease }}
                                    </span>
                                    minggu ini
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Widget End -->

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-5">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                        <div class="d-flex align-items-center">

                            <div
                                class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                <span
                                    class="mb-0 w-40-px h-40-px bg-red flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6">
                                    <iconify-icon icon="fa-solid:newspaper"
                                        class="text-white text-2xl mb-0"></iconify-icon>
                                </span>
                            </div>

                            <div>
                                <span class="mb-2 fw-medium text-secondary-light text-md">Total Blog</span>
                                <h6 class="fw-semibold my-1">{{ $totalBlog }}</h6>
                                {{-- <p class="text-sm mb-0">
                                    Kenaikan
                                    <span class="fw-medium text-success-main text-sm">
                                        {{ $blogToday >= 0 ? '+' : '' }}{{ $blogToday }}
                                    </span>
                                    hari ini
                                </p>
                                <p class="text-sm mb-0">
                                    Kenaikan
                                    <span class="fw-medium text-success-main text-sm">
                                        {{ $blogThisWeek >= 0 ? '+' : '' }}{{ $blogThisWeek }}
                                    </span>
                                    minggu ini
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Widget End -->

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-4">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                        <div class="d-flex align-items-center">

                            <div
                                class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                <span
                                    class="mb-0 w-40-px h-40-px bg-success-main flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6">
                                    <iconify-icon icon="fa-solid:book" class="icon"></iconify-icon>
                                </span>
                            </div>

                            <div>
                                <span class="mb-2 fw-medium text-secondary-light text-md">Total Materi</span>
                                <h6 class="fw-semibold my-1">{{ $totalMateri }}</h6>
                                {{-- <p class="text-sm mb-0">
                                    Kenaikan
                                    <span class="fw-medium text-success-main text-sm">
                                        {{ $materiToday >= 0 ? '+' : '' }}{{ $materiToday }}
                                    </span>
                                    hari ini
                                </p>
                                <p class="text-sm mb-0">
                                    Kenaikan
                                    <span class="fw-medium text-success-main text-sm">
                                        {{ $materiThisWeek >= 0 ? '+' : '' }}{{ $materiThisWeek }}
                                    </span>
                                    minggu ini
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Widget End -->



        <!-- Latest Investments Start -->
        <div class="col-xxl">
            <div class="card h-100">
                <div class="card-body p-24">
                    <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                        <h6 class="mb-2 fw-semibold text-lg">Guru dan Siswa Terbaru</h6>

                    </div>
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestUsers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td>{{ $user->created_at->translatedFormat('d F Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Investments End -->


    </div>
@endsection
