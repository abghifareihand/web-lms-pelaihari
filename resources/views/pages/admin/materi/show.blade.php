@extends('layouts.app')

@section('title', 'Detail materi')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card p-0 radius-12 overflow-hidden">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Detail Materi</h5>
                    <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="p-32">
                        <div class="d-flex align-items-center gap-16 justify-content-between flex-wrap mb-24">
                            <div class="d-flex align-items-center gap-8">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($materi->creator->name ?? '-') }}&size=64&background=CCCCCC&color=000000"
                                    alt="{{ $materi->creator->name }}"
                                    class="w-48-px h-48-px rounded-circle object-fit-cover">
                                <div class="d-flex flex-column">
                                    <h6 class="text-lg mb-0">{{ $materi->creator->name ?? '-' }}</h6>
                                    <span class="text-sm text-neutral-500">
                                        {{ \Carbon\Carbon::parse($materi->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-md-3 gap-2 flex-wrap">
                                <div class="d-flex align-items-center gap-8 text-neutral-500 text-md fw-medium">
                                    <i class="ri-calendar-2-line"></i>
                                    {{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('l, d F Y H:i') }}
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-16">{{ $materi->title }}</h4>
                        <p class="text-neutral-500 mb-16">{{ $materi->description }}</p>
                        {{-- Konten Materi Berdasarkan Jenis --}}
                        @if ($materi->type === 'file' && $materi->file_path)
                            <div class="col-12">
                                <label class="form-label">File</label>
                                <p>
                                    <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-file-file"></i> Lihat / Download File
                                    </a>
                                </p>
                            </div>
                        @elseif ($materi->type === 'video' && $materi->file_path)
                            <div class="col-12">
                                <label class="form-label">Video</label>
                                <div
                                    style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 8px;">
                                    <video controls
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 8px;">
                                        <source src="{{ asset('storage/' . $materi->file_path) }}" type="video/mp4">
                                        Browser Anda tidak mendukung pemutar video.
                                    </video>
                                </div>
                            </div>
                        @elseif ($materi->type === 'youtube' && $materi->link_url)
                            {{-- Video Youtube --}}
                            <div class="col-12">
                                <label class="form-label">Video Youtube</label>
                                <div
                                    style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 8px;">
                                    <iframe src="{{ str_replace('watch?v=', 'embed/', $materi->link_url) }}"
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        @elseif ($materi->type === 'website' && $materi->link_url)
                            <div class="col-12">
                                <label class="form-label">Link Website</label>
                                <p>
                                    <a href="{{ $materi->link_url }}" target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-external-link-alt"></i> Buka Link Website
                                    </a>
                                </p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
