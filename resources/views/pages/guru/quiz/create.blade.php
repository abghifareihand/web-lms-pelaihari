@extends('layouts.app')

@section('title', 'Tambah Quiz')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Tambah Quiz</h5>
                    <a href="{{ route('guru.quiz.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form class="row gy-3" action="{{ route('guru.quiz.store') }}" method="POST">
                        @csrf

                        {{-- Judul Quiz --}}
                        <div class="col-12">
                            <label class="form-label">Judul Quiz</label>
                            <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror"
                                value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi Quiz --}}
                        <div class="col-12">
                            <label class="form-label">Deskripsi Quiz</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Link Quiz --}}
                        <div class="col-12">
                            <label class="form-label">Link Quiz</label>
                            <input type="url" name="link" class="form-control" @error('link') is-invalid @enderror"
                                value="{{ old('link') }}">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                <i class="ri-save-line me-2"></i> Simpan Quiz
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
        const fileInput = document.getElementById("upload-file");
        const imagePreview = document.getElementById("uploaded-img__preview");
        const uploadedImgContainer = document.querySelector(".uploaded-img");
        const uploadButton = document.querySelector(".upload-file");
        const removeButton = document.querySelector(".uploaded-img__remove");

        fileInput.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                imagePreview.src = src;
                uploadedImgContainer.classList.remove("d-none");
                uploadButton.classList.add("d-none");
            }
        });

        removeButton.addEventListener("click", () => {
            imagePreview.src = "";
            uploadedImgContainer.classList.add("d-none");
            uploadButton.classList.remove("d-none");
            fileInput.value = "";
        });
    </script>
@endsection
