@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Tambah Siswa</h5>
                    <a href="{{ route('admin.user.siswa.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form class="row gy-3" action="{{ route('admin.user.siswa.store') }}" method="POST">
                        @csrf

                        {{-- Nama Siswa --}}
                        <div class="col-12">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Username Siswa --}}
                        <div class="col-12">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control"
                                @error('username') is-invalid @enderror" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Password Siswa --}}
                        <div class="col-12">
                            <label class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror pe-5" id="password-input"
                                    value="{{ old('password') }}">

                                {{-- Icon show/hide --}}
                                <span
                                    class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer toggle-password">
                                    <iconify-icon icon="ri:eye-line" id="password-toggle-icon"></iconify-icon>
                                </span>

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                <i class="ri-save-line me-2"></i> Simpan Siswa
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
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.getElementById('password-input');
        const toggleIcon = document.getElementById('password-toggle-icon');

        togglePassword.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.setAttribute('icon', 'ri:eye-off-line');
            } else {
                passwordInput.type = 'password';
                toggleIcon.setAttribute('icon', 'ri:eye-line');
            }
        });
    </script>
@endsection
