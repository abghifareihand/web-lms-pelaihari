@extends('layouts.app')

@section('title', 'Tambah Materi')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Tambah Materi</h5>
                    <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form class="row gy-3" action="{{ route('admin.materi.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Pembuat Materi --}}
                        <div class="col-12">
                            <label class="form-label">Pembuat Materi</label>
                            <select name="created_by" class="form-control radius-8 form-select">
                                {{-- Default current user --}}
                                <option value="{{ $admin }}" selected>{{ Auth::user()->name }} (Anda)</option>

                                {{-- List Guru --}}
                                @foreach ($teachers as $teacher)
                                    @if ($teacher->id != $admin)
                                        {{-- supaya user sendiri tidak dobel --}}
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        {{-- Judul Materi --}}
                        <div class="col-12">
                            <label class="form-label">Judul Materi</label>
                            <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror"
                                value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi Materi --}}
                        <div class="col-12">
                            <label class="form-label">Deskripsi Materi</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jenis Materi --}}
                        <div class="col-12">
                            <label class="form-label">Jenis Materi</label>
                            <select name="type" id="type" class="form-control radius-8 form-select">
                                <option value="">-- Pilih Jenis Materi --</option>
                                <option value="file" {{ old('type') == 'file' ? 'selected' : '' }}>Upload File</option>
                                <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Upload Video
                                </option>
                                <option value="youtube" {{ old('type') == 'youtube' ? 'selected' : '' }}>Link YouTube
                                </option>
                                <option value="website" {{ old('type') == 'website' ? 'selected' : '' }}>Link Website
                                </option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Upload File --}}
                        <div class="col-12" id="form-file" style="display:none;">
                            <label class="form-label">Upload File</label>
                            <input type="file" name="file_upload" class="form-control"
                                accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
                            @error('file_upload')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>




                        {{-- Upload Video --}}
                        <div class="col-12" id="form-video" style="display:none;">
                            <label class="form-label">Upload File Video</label>
                            <input type="file" name="file_video" class="form-control" accept="video/*">
                            @error('file_video')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Link YouTube --}}
                        <div class="col-12" id="form-youtube" style="display:none;">
                            <label class="form-label">Link YouTube</label>
                            <input type="url" name="link_youtube" class="form-control"
                                placeholder="https://youtube.com/..." value="{{ old('link_youtube') }}">
                            @error('link_youtube')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Link Webiste --}}
                        <div class="col-12" id="form-website" style="display:none;">
                            <label class="form-label">Link Webiste</label>
                            <input type="url" name="link_website" class="form-control" placeholder="https://contoh.com"
                                value="{{ old('link_website') }}">
                            @error('link_website')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                <i class="ri-save-line me-2"></i> Simpan Materi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            // Show/hide form field sesuai jenis materi
            const type = $('#type');
            const formPDF = $('#form-file');
            const formVideo = $('#form-video');
            const formYoutube = $('#form-youtube');
            const formWebsite = $('#form-website');

            function toggleForms() {
                const val = type.val();
                formPDF.toggle(val === 'file');
                formVideo.toggle(val === 'video');
                formYoutube.toggle(val === 'youtube');
                formWebsite.toggle(val === 'website');
            }

            type.on('change', toggleForms);

            // Set form sesuai old value saat reload
            const oldType = "{{ old('type') }}";
            if (oldType) {
                type.val(oldType);
            }

            toggleForms(); // initial load
        });
    </script>
@endsection
