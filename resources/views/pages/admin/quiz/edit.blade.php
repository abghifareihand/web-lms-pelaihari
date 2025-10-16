@extends('layouts.app')

@section('title', 'Edit Quiz')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Edit Quiz</h5>
                    <a href="{{ route('admin.quiz.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form class="row gy-3" action="{{ route('admin.quiz.update', $quiz->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Pembuat Quiz --}}
                        <div class="col-12">
                            <label class="form-label">Pembuat Quiz</label>
                            <select name="created_by" class="form-control radius-8 form-select">
                                {{-- Current creator --}}
                                <option value="{{ $quiz->created_by }}" selected>
                                    {{ $quiz->creator->name ?? '-' }} (Saat ini)
                                </option>

                                {{-- List Guru --}}
                                @foreach ($teachers as $teacher)
                                    @if ($teacher->id != $quiz->created_by)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        {{-- Judul Quiz --}}
                        <div class="col-12">
                            <label class="form-label">Judul Quiz</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $quiz->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi Quiz --}}
                        <div class="col-12">
                            <label class="form-label">Deskripsi Quiz</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $quiz->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Link Quiz --}}
                        <div class="col-12">
                            <label class="form-label">Link Quiz</label>
                            <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"
                                value="{{ old('link', $quiz->link) }}">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                <i class="ri-save-line me-2"></i> Update Quiz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
