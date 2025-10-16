@props([
    'type' => 'success',
    'message' => '',
    'autoHide' => true, // default auto hide
])

@php
    $bg =
        $type === 'success'
            ? 'bg-success-100 text-success-600 border-success-100'
            : ($type === 'error'
                ? 'bg-danger-100 text-danger-600 border-danger-100'
                : 'bg-gray-100 text-gray-700 border-gray-100');
@endphp

@if ($message)
    <div class="alert {{ $bg }} px-16 py-11 mb-16 fw-medium text-md radius-8 d-flex align-items-center justify-content-between"
        role="alert">
        <div>
            {{ $message }}
        </div>
        <button
            class="remove-button {{ $type === 'success' ? 'text-success-600' : 'text-danger-600' }} text-xxl line-height-1">
            &times;
        </button>
    </div>

    <script>
        const alertBox = document.currentScript.previousElementSibling;
        const removeBtn = alertBox.querySelector('.remove-button');

        // otomatis hilang jika autoHide = true
        @if ($autoHide)
            setTimeout(() => {
                if (alertBox) alertBox.remove();
            }, 3000);
        @endif

        // tetap bisa close manual
        removeBtn.addEventListener('click', () => {
            if (alertBox) alertBox.remove();
        });
    </script>
@endif
