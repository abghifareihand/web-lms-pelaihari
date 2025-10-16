@extends('layouts.app')

@section('title', 'Detail Meeting')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card p-0 radius-12 overflow-hidden">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Detail Meeting</h5>
                    <a href="{{ route('siswa.meeting.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="p-32">
                        <div class="d-flex align-items-center gap-16 justify-content-between flex-wrap mb-24">
                            <div class="d-flex align-items-center gap-8">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($meeting->creator->name ?? '-') }}&size=64&background=CCCCCC&color=000000"
                                    alt="{{ $meeting->creator->name }}"
                                    class="w-48-px h-48-px rounded-circle object-fit-cover">
                                <div class="d-flex flex-column">
                                    <h6 class="text-lg mb-0">{{ $meeting->creator->name ?? '-' }}</h6>
                                    <span class="text-sm text-neutral-500">
                                        {{ \Carbon\Carbon::parse($meeting->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-md-3 gap-2 flex-wrap">
                                <div class="d-flex align-items-center gap-8 text-neutral-500 text-md fw-medium">
                                    <i class="ri-calendar-2-line"></i>
                                    {{ \Carbon\Carbon::parse($meeting->created_at)->translatedFormat('l, d F Y H:i') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Jadwal Meeting</label>
                            <p>
                                {{ \Carbon\Carbon::parse($meeting->schedule_at)->translatedFormat('l, d F Y H:i') }}
                            </p>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Link Meeting</label>
                            <p>
                                <a href="{{ $meeting->link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-external-link-alt"></i> Buka Link Meeting
                                </a>
                            </p>
                        </div>
                        <h4 class="mb-16">{{ $meeting->title }}</h4>
                        <p class="text-neutral-500 mb-16">{{ $meeting->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
