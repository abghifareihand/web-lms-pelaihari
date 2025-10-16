@extends('layouts.app')

@section('content')
    <div class="row gy-4">
        @forelse ($blogs as $blog)
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card h-100 p-0 radius-12 overflow-hidden">
                    <div class="card-body p-24">
                        {{-- Thumbnail --}}
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

                        <a href="{{ route('siswa.blog.show', $blog->id) }}" class="w-100 radius-8 overflow-hidden d-block"
                            style="height: 200px;">
                            <img src="{{ $thumbnailPath }}" alt="{{ $blog->title }}" class="w-100 h-100 object-fit-cover">
                        </a>

                        <div class="mt-20">
                            {{-- Category + Date --}}
                            <div class="d-flex align-items-center gap-6 justify-content-between flex-wrap mb-16">
                                <span
                                    class="badge text-sm fw-semibold
                                    {{ $blog->creator->role === 'admin' ? 'text-primary-600 bg-primary-100' : ($blog->creator->role === 'guru' ? 'text-lilac-600 bg-lilac-100' : 'text-neutral-600 bg-neutral-100') }}
                                            px-20 py-9 radius-4 text-white">
                                    {{ ucfirst($blog->creator->role ?? '-') }}
                                </span>

                                <div class="d-flex align-items-center gap-8 text-neutral-500 fw-medium text-xs">
                                    <i class="ri-calendar-2-line"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d M, Y H:i') }}
                                </div>
                            </div>


                            {{-- Title --}}
                            <h6 class="mb-16">
                                <a href="{{ route('siswa.blog.show', $blog->id) }}"
                                    class="text-line-2 text-hover-primary-600 text-lg transition-2">
                                    {{ $blog->title }}
                                </a>
                            </h6>

                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-6">
                                <div class="d-flex align-items-center gap-8">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($blog->creator->name ?? '-') }}&size=64&background=CCCCCC&color=000000"
                                        alt="{{ $blog->creator->name }}"
                                        class="w-40-px h-40-px rounded-circle object-fit-cover">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-xs mb-0 fw-semibold">{{ $blog->creator->name ?? '-' }}</h6>
                                        <span
                                            class="text-xxs text-neutral-500">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('siswa.blog.show', $blog->id) }}"
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
                    Belum ada blog yang tersedia.
                </div>
            @endforelse
        </div>

        {{ $blogs->links('components.pagination') }}
    @endsection
