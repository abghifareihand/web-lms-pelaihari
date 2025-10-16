<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<x-head />

<body>

    <!-- ..::  header area start ::.. -->
    <x-sidebar />
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        <x-navbar />
        <!-- ..::  navbar end ::.. -->
        <div class="dashboard-main-body">


            @yield('content')

        </div>
    </main>

    <!-- ..::  scripts  start ::.. -->
    <x-script />
    <!-- ..::  scripts  end ::.. -->

    {{-- tempat buat nulis script langsung di halaman (seperti login.blade.php) --}}
    @yield('scripts')

</body>

</html>
