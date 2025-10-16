@extends('layouts.app')

@section('content')
    <div class="row gy-4">
        @forelse ($quizzes as $quiz)
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card h-100 p-0 radius-12 overflow-hidden">
                    <div class="card-body p-24">
                        {{-- Thumbnail --}}
                        <div class="w-100 radius-8 overflow-hidden d-block bg-light d-flex flex-column align-items-center justify-content-center text-center"
                            style="height: 200px;">
                            <a href="{{ $quiz->link }}" target="_blank"
                                class="text-white bg-primary px-3 py-1 rounded text-center d-inline-block mb-2">
                                Buka Quiz
                            </a>
                            {{-- <div
                                class="d-flex align-items-center justify-content-center gap-6 text-neutral-600 text-xs fw-medium">
                                <i class="ri-calendar-2-line"></i>
                                {{ \Carbon\Carbon::parse($quiz->schedule_at)->translatedFormat('d M, Y • H:i') }}
                            </div> --}}
                        </div>



                        <div class="mt-20">
                            {{-- Category + Date --}}
                            <div class="d-flex align-items-center gap-6 justify-content-between flex-wrap mb-16">
                                <span
                                    class="badge text-sm fw-semibold
                                    {{ $quiz->creator->role === 'admin' ? 'text-primary-600 bg-primary-100' : ($quiz->creator->role === 'guru' ? 'text-lilac-600 bg-lilac-100' : 'text-neutral-600 bg-neutral-100') }}
                                            px-20 py-9 radius-4 text-white">
                                    {{ ucfirst($quiz->creator->role ?? '-') }}
                                </span>

                                <div class="d-flex align-items-center gap-8 text-neutral-500 fw-medium text-xs">
                                    <i class="ri-calendar-2-line"></i>
                                    {{ \Carbon\Carbon::parse($quiz->created_at)->translatedFormat('d M, Y H:i') }}
                                </div>

                            </div>


                            {{-- Title --}}
                            <h6 class="mb-16">
                                <a href="{{ route('siswa.materi.show', $quiz->id) }}"
                                    class="text-line-2 text-hover-primary-600 text-lg transition-2">
                                    {{ $quiz->title }}
                                </a>
                            </h6>

                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-6">
                                <div class="d-flex align-items-center gap-8">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($quiz->creator->name ?? '-') }}&size=64&background=CCCCCC&color=000000"
                                        alt="{{ $quiz->creator->name }}"
                                        class="w-40-px h-40-px rounded-circle object-fit-cover">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-xs mb-0 fw-semibold">{{ $quiz->creator->name ?? '-' }}</h6>
                                        <span
                                            class="text-xxs text-neutral-500">{{ \Carbon\Carbon::parse($quiz->created_at)->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('siswa.quiz.show', $quiz->id) }}"
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
                Belum ada quiz yang tersedia.
            </div>
        @endforelse
    </div>

    {{ $quizzes->links('components.pagination') }}
@endsection
