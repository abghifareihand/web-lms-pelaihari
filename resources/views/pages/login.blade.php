@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="max-w-464-px mx-auto w-100">
            {{-- Card --}}
            <div class="card px-24 py-16 shadow-none radius-8 h-100 bg-white">
                {{-- Header --}}
                <div class="text-center mb-5">
                    <h5 class="mb-2">Login</h5>
                    <p class="text-secondary-light text-md mb-0">Masukkan username dan password anda</p>
                </div>

                {{-- Alert --}}
                @if ($message = Session::get('error'))
                    <x-alert type="error" :message="$message" :auto-hide="false" class="mb-24" />
                @endif

                {{-- Form --}}
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:user"></iconify-icon>
                        </span>
                        <input type="text" name="username" class="form-control h-56-px bg-neutral-50 radius-12"
                            placeholder="Username" required>
                    </div>

                    <div class="position-relative mb-16">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password" class="form-control h-56-px bg-neutral-50 radius-12"
                                id="your-password" placeholder="Password" required>
                        </div>
                        <span
                            class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                            data-toggle="#your-password"></span>
                    </div>
                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Toggle password
            const toggles = document.querySelectorAll(".toggle-password");
            toggles.forEach(toggle => {
                toggle.addEventListener("click", () => {
                    toggle.classList.toggle("ri-eye-off-line");
                    const target = document.querySelector(toggle.dataset.toggle);
                    if (target) target.type = target.type === "password" ? "text" : "password";
                });
            });

            // Auto-close alert saat user mengetik
            const alertEl = document.querySelector('.alert');
            if (alertEl) {
                // tombol close manual
                const closeBtn = alertEl.querySelector('.remove-button');
                if (closeBtn) {
                    closeBtn.addEventListener('click', () => alertEl.remove());
                }

                // close saat input
                const inputs = document.querySelectorAll('input');
                inputs.forEach(input => {
                    input.addEventListener('input', () => alertEl.remove());
                });
            }
        });
    </script>
@endsection
