@extends('layouts.app')

@section('title', 'Detail Blog')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card p-0 radius-12 overflow-hidden">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Detail Blog</h5>
                    <a href="{{ route('siswa.blog.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body p-0">
                    {{-- <img src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : asset('assets/images/blog/blog-details.png') }}"
                        alt="Thumbnail Blog" class="w-100 h-100 object-fit-cover"> --}}
                    @php
                        $thumbnailPath = null;
                        if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
                            // Jika file ada di storage/public
                            $thumbnailPath = asset('storage/' . $blog->thumbnail);
                        } else {
                            // Jika file tidak ada atau kosong → fallback ke assets
                            $thumbnailPath = asset('assets/images/blog/blog.jpg');
                        }
                    @endphp

                    <div style="width:100%; height:500px;">
                        <img src="{{ $thumbnailPath }}" alt="{{ $blog->title }}" class="w-100 h-100 object-fit-cover">
                    </div>

                    <div class="p-32">
                        <div class="d-flex align-items-center gap-16 justify-content-between flex-wrap mb-24">
                            <div class="d-flex align-items-center gap-8">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($blog->creator->name ?? '-') }}&size=64&background=CCCCCC&color=000000"
                                    alt="{{ $blog->creator->name }}"
                                    class="w-48-px h-48-px rounded-circle object-fit-cover">
                                <div class="d-flex flex-column">
                                    <h6 class="text-lg mb-0">{{ $blog->creator->name ?? '-' }}</h6>
                                    <span class="text-sm text-neutral-500">
                                        {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-md-3 gap-2 flex-wrap">
                                <div class="d-flex align-items-center gap-8 text-neutral-500 text-md fw-medium">
                                    <i class="ri-calendar-2-line"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('l, d F Y H:i') }}
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-16">{{ $blog->title }}</h4>
                        <p class="text-neutral-500 mb-16">{{ $blog->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
