@extends('layouts.app')

@section('title', 'Data Quiz')

@section('content')
    <div class="row gy-4">
        {{-- Alert --}}
        @if ($message = Session::get('success'))
            <div class="col-12">
                <x-alert type="success" :message="$message" class="mb-24" />
            </div>
        @endif
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Data Quiz</h5>
                    <a href="{{ route('admin.quiz.create') }}" class="btn btn-primary"><i class="ri-add-line"></i>Tambah
                        Quiz</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table bordered-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Pembuat</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($quizzes as $quiz)
                                    <tr>
                                        <td>{{ Str::limit($quiz->title, 30, '...') }}</td>
                                        <td>
                                            {{ $quiz->creator->name ?? '-' }}
                                            @if ($quiz->creator)
                                                | {{ ucfirst($quiz->creator->role) }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ $quiz->link }}" target="_blank"
                                                class="text-white bg-primary px-3 py-1 rounded text-center d-inline-block">
                                                Buka Quiz
                                            </a>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($quiz->created_at)->translatedFormat('d F Y H:i') }}
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            {{-- Show --}}
                                            <a href="{{ route('admin.quiz.show', $quiz->id) }}"
                                                class="w-32-px h-32-px bg-primary-light text-primary-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('admin.quiz.edit', $quiz->id) }}"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('admin.quiz.destroy', $quiz->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0 p-0">
                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                </button>
                                            </form>
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data quiz</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $quizzes->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
