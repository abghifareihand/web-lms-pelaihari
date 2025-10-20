@props(['id' => null])
<div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-6 flex items-center justify-center">
    <img class="w-full max-w-screen-xl h-auto mx-auto" src="{{ asset('landing/img/beranda/logo-header.png') }}"
        alt="Logo Header">
</div>

<section id="{{ $id }}" class="bg-[#6C6DD2] py-12 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div
        class="max-w-screen-lg mx-auto flex flex-col lg:flex-row justify-between items-center gap-8 lg:gap-12 px-4 sm:px-6 lg:px-8">

        <!-- Text Section -->
        <div class="flex-1 text-center lg:text-left">
            <h1 class="text-2xl sm:text-5xl lg:text-[42px] font-extrabold leading-tight text-white">
                PENERIMA PENDANAAN
            </h1>

            <p class="mb-2 text-white text-base sm:text-lg max-w-xl mx-auto lg:mx-0 font-bold">
                PROGRAM PENGABDIAN KEPADA MASYARAKAT BATCH II TAHUN ANGGARAN 2025 DARI KEMENDIKTISAINTEK
            </p>

            <!-- Kalimat lebih besar -->
            <p class="mb-2 text-white text-xl sm:text-3xl lg:text-4xl max-w-xl mx-auto lg:mx-0 font-bold">
                LITERASI DAN DIGITALISASI KEUANGAN DI GALERI INVESTASI EDUKASI BEI SMAN 1 PELAIHARI
            </p>

            <p class="mb-8 text-white text-base sm:text-lg max-w-xl mx-auto lg:mx-0 font-bold">
                SKEMA PEMBERDAYAAN BERBASIS MASYARAKAT, RUANG LINGKUP PEMBERDAYAAN MASYARAKAT PEMULA
            </p>

            <p class="mt-4 text-white text-base sm:text-lg max-w-xl mx-auto lg:mx-0 font-bold">
                Kuasai Literasi & Digital KEUANGAN, Wujudkan Masa Depan yang Lebih Baik!
            </p>

            <div class="mt-6 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                <a href="{{ route('login') }}"
                    class="text-base sm:text-lg inline-block text-white bg-[#EAB308] hover:bg-[#bb8d02] focus:ring-4 focus:ring-blue-300 font-medium rounded-3xl px-6 py-3 focus:outline-none">
                    Mulai Belajar
                </a>

                <a
                    class="text-base sm:text-lg inline-block text-white bg-transparent hover:bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-3xl px-6 py-3 border-white border hover:text-black focus:outline-none">
                    Tonton Video
                </a>
            </div>
        </div>

        <!-- Image Section -->
        <div class="flex-1 flex justify-center lg:justify-end">
            <img class="w-full max-w-xs sm:max-w-md lg:max-w-[550px] rounded-xl animate-float"
                src="{{ asset('landing/img/beranda/page-beranda.png') }}" alt="imageberanda" />
        </div>
    </div>
</section>
