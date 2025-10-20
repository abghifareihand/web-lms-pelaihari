@props(['galery', 'id' => null])
<section id="{{ $id }}" class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4 mt-10">
        <div class="mx-auto max-w-8xl text-center">
            <h2 class="text-[28px] sm:text-[40px] lg:text-[42px] font-bold mb-6 text-center">Galeri Kegiatan</h2>
            <p class="text-[18px] sm:text-[24px] mt-2 text-[#4B5563] text-justify">
                Ucapan Terima kasih dan apresiasi setinggi-tingginya kami ucapkan kepada Kementerian Pendidikan Tinggi,
                Sains dan Teknologi, melalui Direktorat Riset, Teknologi, dan Pengabdian Kepada Masyarakat atas dukungan
                pendanaan melalui Skema Pemberdayaan Berbasis Masyarakat dengan Ruang Lingkup Pemberdayaan Masyarakat
                Pemula, Lembaga Layanan Pendidikan Tinggi Wilayah XI, Galeri Investasi Edukasi BEI SMAN 1 Pelaihari, dan
                Sekolah Tinggi Ilmu Ekonomi Pancasetia serta seluruh pihak yang terlibat dosen, dan mahasiswa atas
                kontribusi nyata dalam menyukseskan program ini.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-10">
            @foreach ($galery as $item)
                <div class="gallery-item bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 ease-in-out hover:scale-105"
                    data-id="{{ $item['id'] }}" data-title="{{ $item['title'] }}"
                    data-description="{{ $item['description'] }}" data-image="{{ asset($item['image']) }}">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $item['title'] }}</h3>

                        <p class="text-gray-600 line-clamp-3">
                            {{ $item['description'] }}
                        </p>

                        <button class="text-blue-600 text-sm font-medium mt-1 inline-block hover:underline open-modal"
                            data-title="{{ $item['title'] }}" data-description="{{ $item['description'] }}"
                            data-image="{{ asset($item['image']) }}">
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>
            @endforeach
        </div>



    </div>
    {{-- modal --}}
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg max-w-md w-full relative overflow-hidden">
            <button id="close-modal"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>

            <img id="modal-image" src="" alt="" class="w-full h-48 object-cover mb-4 rounded">
            <h3 id="modal-title" class="text-xl font-semibold mb-2 break-words"></h3>
            <p id="modal-description"
                class="text-gray-700 mb-4 break-words whitespace-pre-wrap overflow-y-auto max-h-60"></p>

            <input type="hidden" id="modal-id" value="">
        </div>
    </div>


</section>
@push('scripts')
    <script src="{{ asset('landing/js/galery.js') }}"></script>
@endpush
