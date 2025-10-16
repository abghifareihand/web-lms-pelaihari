@extends('layouts.app')

@section('content')
    <div class="row gy-4">
        @forelse ($materis as $materi)
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card h-100 p-0 radius-12 overflow-hidden">
                    <div class="card-body p-24">
                        {{-- Thumbnail --}}
                        <a href="{{ route('siswa.materi.show', $materi->id) }}"
                            class="w-100 radius-8 overflow-hidden d-block bg-light d-flex align-items-center justify-content-center"
                            style="height: 200px;">

                            @switch($materi->type)
                                @case('file')
                                    <span class="badge text-sm fw-semibold bg-dark-success-gradient px-20 py-9 radius-4 text-white">
                                        File
                                    </span>
                                @break

                                @case('video')
                                    <span class="badge text-sm fw-semibold bg-dark-primary-gradient px-20 py-9 radius-4 text-white">
                                        Video
                                    </span>
                                @break

                                @case('youtube')
                                    <span class="badge text-sm fw-semibold bg-dark-danger-gradient px-20 py-9 radius-4 text-white">
                                        YouTube
                                    </span>
                                @break

                                @case('website')
                                    <span class="badge text-sm fw-semibold bg-dark-lilac-gradient px-20 py-9 radius-4 text-white">
                                        Website
                                    </span>
                                @break
                            @endswitch
                        </a>


                        <div class="mt-20">
                            {{-- Category + Date --}}
                            <div class="d-flex align-items-center gap-6 justify-content-between flex-wrap mb-16">
                                <span
                                    class="badge text-sm fw-semibold
                                    {{ $materi->creator->role === 'admin' ? 'text-primary-600 bg-primary-100' : ($materi->creator->role === 'guru' ? 'text-lilac-600 bg-lilac-100' : 'text-neutral-600 bg-neutral-100') }}
                                            px-20 py-9 radius-4 text-white">
                                    {{ ucfirst($materi->creator->role ?? '-') }}
                                </span>

                                <div class="d-flex align-items-center gap-8 text-neutral-500 fw-medium text-xs">
                                    <i class="ri-calendar-2-line"></i>
                                    {{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('d M, Y H:i') }}
                                </div>
                            </div>


                            {{-- Title --}}
                            <h6 class="mb-16">
                                <a href="{{ route('siswa.materi.show', $materi->id) }}"
                                    class="text-line-2 text-hover-primary-600 text-lg transition-2">
                                    {{ $materi->title }}
                                </a>
                            </h6>

                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-6">
                                <div class="d-flex align-items-center gap-8">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($materi->creator->name ?? '-') }}&size=64&background=CCCCCC&color=000000"
                                        alt="{{ $materi->creator->name }}"
                                        class="w-40-px h-40-px rounded-circle object-fit-cover">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-xs mb-0 fw-semibold">{{ $materi->creator->name ?? '-' }}</h6>
                                        <span
                                            class="text-xxs text-neutral-500">{{ \Carbon\Carbon::parse($materi->created_at)->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('siswa.materi.show', $materi->id) }}"
                                    class="btn btn-sm btn-primary-600 d-flex align-items-center gap-1 text-xs px-8 py-6">
                                    Read More </a>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         @empty
            <div class="col-12 text-center py-20 text-gray-500">
                Belum ada materi yang tersedia.
            </div>
        @endforelse
    </div>

    {{ $materis->links('components.pagination') }}
@endsection
