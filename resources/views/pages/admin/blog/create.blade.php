@extends('layouts.app')

@section('title', 'Tambah Blog')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Tambah Blog</h5>
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form class="row gy-3" action="{{ route('admin.blog.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Pembuat Blog --}}
                        <div class="col-12">
                            <label class="form-label">Pembuat Blog</label>
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

                        {{-- Judul Blog --}}
                        <div class="col-12">
                            <label class="form-label">Judul Blog</label>
                            <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror"
                                value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi Blog --}}
                        <div class="col-12">
                            <label class="form-label">Deskripsi Blog</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Thumbnail Blog --}}
                        <div class="col-12">
                            <label class="form-label">Thumbnail Blog</label>
                            <div class="upload-image-wrapper d-flex align-items-center gap-3">

                                {{-- Preview image --}}
                                <div
                                    class="uploaded-img position-relative h-200-px w-200-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 {{ empty($blog->thumbnail) ? 'd-none' : '' }}">
                                    <button type="button"
                                        class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-2 mt-2 d-flex">
                                        <iconify-icon icon="radix-icons:cross-2"
                                            class="text-xl text-danger-600"></iconify-icon>
                                    </button>
                                    <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                                        src="{{ !empty($blog->thumbnail) ? asset('storage/' . $blog->thumbnail) : '' }}"
                                        alt="image">
                                </div>

                                {{-- Upload button --}}
                                <label
                                    class="upload-file h-200-px w-200-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1 {{ !empty($blog->thumbnail) ? 'd-none' : '' }}"
                                    for="upload-file">
                                    <iconify-icon icon="solar:camera-outline"
                                        class="text-xl text-secondary-light"></iconify-icon>
                                    <span class="fw-semibold text-secondary-light">Upload</span>
                                    <input id="upload-file" type="file" name="thumbnail" hidden>
                                </label>
                            </div>
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>




                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                <i class="ri-save-line me-2"></i> Simpan Blog
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
