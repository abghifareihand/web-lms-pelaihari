@extends('layouts.app')

@section('title', 'Edit Meeting')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Edit Meeting</h5>
                    <a href="{{ route('guru.meeting.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form class="row gy-3" action="{{ route('guru.meeting.update', $meeting->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Judul Meeting --}}
                        <div class="col-12">
                            <label class="form-label">Judul Meeting</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $meeting->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi Meeting --}}
                        <div class="col-12">
                            <label class="form-label">Deskripsi Meeting</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $meeting->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Link Meeting --}}
                        <div class="col-12">
                            <label class="form-label">Link Meeting</label>
                            <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"
                                value="{{ old('link', $meeting->link) }}">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jadwal Meeting --}}
                        <div class="col-12">
                            <label class="form-label">Jadwal Meeting</label>
                            <input type="datetime-local" name="schedule_at"
                                class="form-control @error('schedule_at') is-invalid @enderror"
                                value="{{ old('schedule_at', \Carbon\Carbon::parse($meeting->schedule_at)->format('Y-m-d\TH:i')) }}">
                            @error('schedule_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                <i class="ri-save-line me-2"></i> Update Meeting
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
