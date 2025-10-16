<!DOCTYPE html>
<html lang="en" data-theme="light">

<x-head />

<body>
    <section class="auth bg-base d-flex flex-wrap">
        @yield('content')
    </section>


    <x-script />
    {{-- tempat buat nulis script langsung di halaman (seperti login.blade.php) --}}
    @yield('scripts')
</body>

</html>
