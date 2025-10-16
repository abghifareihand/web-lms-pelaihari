@props(['id' => null])
<section id="{{ $id }}" class="w-full bg-white border-gray-200 py-20 px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl text-center">
        <h1 class="text-[28px] sm:text-[40px] lg:text-[42px] text-black font-extrabold">
            Tentang Galeri Investasi Edukasi
        </h1>
    </div>

    <!-- Card Section -->
    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div onclick="openModal('literasi')"
            class="bg-gradient-to-br from-blue-50 to-indigo-100 p-8 rounded-xl text-center cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105">
            <div class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-chart-line text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-4">Literasi Keuangan</h3>
        </div>

        <div onclick="openModal('teknologi')"
            class="bg-gradient-to-br from-green-50 to-emerald-100 p-8 rounded-xl text-center transition-transform duration-300 ease-in-out hover:scale-105">
            <div class="bg-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-laptop text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-4">Teknologi Digital</h3>
        </div>

        <div onclick="openModal('kolaboratif')"
            class="bg-gradient-to-br from-purple-50 to-violet-100 p-8 rounded-xl text-center transition-transform duration-300 ease-in-out hover:scale-105">
            <div class="bg-purple-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-4">Pembelajaran Kolaboratif</h3>
        </div>
    </div>

    <div id="custom-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg max-w-2xl w-full relative max-h-[80vh] overflow-y-auto">
            <button onclick="closeModal()"
                class="absolute top-2 right-4 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
            <h3 id="modal-title" class="text-xl font-semibold mb-4"></h3>
            <di id="modal-content" class="text-gray-700 whitespace-pre-line break-words"></di>
        </div>
    </div>
</section>
<script>
    const modalContents = {
        literasi: [
            `Literasi dan Digitalisasi Keuangan di Galeri Investasi Edukasi BEI SMAN 1 Pelaihari, ruang lingkup Pemberdayaan Masyarakat Pemula (PMP) bertujuan untuk meningkatkan pengetahuan dan kemampuan siswa dalam literasi dan digitalisasi keuangan, serta meningkatkan keaktifan Galeri BEI di SMAN 1 Pelaihari, untuk dapat memberi dampak positif dalam hal kualitas hidup dan kesejahteraan ekonomi melalui pengelolaan keuangan yang tepat, PKM ini juga sejalan dengan Sustainable Development Goals (SDG's) SDG 4 (Pendidikan Berkualitas), SDG 8 (Pekerjaan Layak dan Pertumbuhan Ekonomi). Serta memiliki keterkaitan dengan Asta Cita yang mengedepankan pemberdayaan masyarakat melalui pendidikan dan peningkatan kapasitas sumber daya manusia dalam bidang ekonomi dan keuangan, dan memberikan dampak pada tercapainya Indikator Kinerja Utama (IKU) 2, 3, 4 dan 5. Kegiatan PKM memiliki permasalahan prioritas Kurangnya Literasi Keuangan di Kalangan Siswa; Belum adanya teknologi digital untuk pengelolaan keuangan bagi siswa yang memadai, kurangnya Akses dan Pemanfaatan Teknologi Keuangan; Kurangnya Pembelajaran Praktek tentang Investasi dan Keuangan Digital. Sehingga dari permasalahan tersebut diberikan solusi dengan melakukan peningkatan literasi Keuangan melalui Pelatihan dan Edukasi; Menyiapkan aplikasi atau software yang akan di gunakan dalam pelatihan untuk pemanfaatan teknologi Keuangan; Simulasi Praktik digitalisasi Keuangan dan Investasi. Pelaksanaan PKM ini terdiri dari 3 dosen dan 2 mahasiswa, masing-masing dosen memiliki keahlian dengan latar belakang pada program studi akuntansi, program studi manajemen dan program studi magister manajemen yang memiliki fokus pada bidang ilmu manajemen keuangan, ilmu manajemen sumber daya manusia, dan ilmu ekonomi yang memiliki kompetensi tambahan Microsoft Certified Educator (MCE). Metode pelaksanaan dengan Tahapan pelaksanaan meliputi sosialisasi, pelatihan, penerapan teknologi, pendampingan, evaluasi, serta keberlanjutan program. Teknologi dan inovasi yang akan diimplementasikan menggunakan Platform Galeri Investasi BEI; aplikasi atau software pengelolaan keuangan. Pelaksanaan PKM di jadwalkan selama 6 bulan dengan anggaran yang terdiri untuk Biaya Upah dan Jasa,Teknologi dan inovasi, Biaya Pelatihan, Biaya Perjalanan, Biaya Lainnya sebesar Rp 18.637.000,-`
        ],
        teknologi: [
            `Program Pengabdian kepada Masyarakat (PKM) bertema “Literasi dan Digitalisasi Keuangan di Galeri Investasi SMAN 1 Pelaihari” memanfaatkan berbagai produk teknologi dan inovasi, baik hard technology (berbasis perangkat dan sistem informasi) maupun soft technology (berbasis edukasi dan pengembangan kapasitas manusia). Tujuan penerapan inovasi ini adalah untuk meningkatkan literasi keuangan, keterampilan digital, serta kesiapan siswa menghadapi transformasi ekonomi digital. `, `1. E-Learning Platform (Soft Technology)
 Platform E-learning berbasis web dikembangkan untuk mendukung pembelajaran literasi keuangan digital secara interaktif. Sistem ini menyediakan materi, video pembelajaran, dan modul mandiri yang dapat diakses oleh guru dan siswa kapan saja melalui perangkat komputer atau smartphone.
Teknologi ini memberikan fleksibilitas pembelajaran dan menciptakan ekosistem edukatif modern di Galeri Investasi Edukasi BEI. Dengan konten interaktif, siswa dapat meningkatkan pemahaman mereka terhadap keuangan dan investasi melalui pengalaman belajar mandiri dan kolaboratif.
`, `2. Platform Galeri Investasi BEI (Hard–Soft Integration)
Platform Galeri Investasi BEI diimplementasikan sebagai sarana simulasi dan edukasi pasar modal real-time. Melalui akun pengguna virtual, siswa dapat melakukan simulasi transaksi jual-beli saham, memantau pergerakan pasar, serta menganalisis kinerja investasi secara langsung.
Teknologi ini berperan sebagai laboratorium investasi digital yang menghubungkan teori dengan praktik. Platform ini membantu siswa memahami cara kerja pasar modal, membentuk pola pikir investasi rasional, dan menumbuhkan sikap disiplin finansial.
`, `3. Aplikasi KOINS Syariah (Hard Technology)
Aplikasi KOINS Syariah dimanfaatkan sebagai sarana pembelajaran dan praktik investasi halal berbasis digital. Aplikasi ini menyediakan fitur seperti dashboard portofolio, simulasi transaksi real-time, serta modul edukasi investasi syariah. Penggunaan KOINS Syariah memberi pengalaman nyata dalam pengelolaan aset sesuai prinsip syariah, melatih siswa membuat keputusan investasi yang etis, rasional, dan bertanggung jawab. Inovasi ini menjadi langkah strategis dalam menanamkan nilai-nilai keuangan syariah dan meningkatkan literasi finansial berbasis etika.
`, `4. Regional Development Information System (RDIS) (Hard Technology)
RDIS merupakan sistem informasi berbasis web yang digunakan untuk mengelola kegiatan Galeri Investasi secara terpusat dan terintegrasi dengan Bursa Efek Indonesia (BEI). Sistem ini memfasilitasi pendaftaran, perencanaan, pelaporan kegiatan, dan basis data peserta secara digital, mendukung transparansi dan efisiensi administrasi. RDIS menjadi fondasi tata kelola modern untuk pengembangan Galeri Investasi yang profesional, efisien, dan berkelanjutan.
`
        ],

        kolaboratif: [
            `Pelaksanaan Pengabdian kepada Masyarakat (PKM) di Galeri Investasi (GI) Edukasi BEI SMAN 1 Pelaihari dirancang secara sistematis dan partisipatif untuk meningkatkan literasi keuangan serta kapasitas digital siswa sebagai mitra utama kegiatan. Pendekatan yang digunakan mengintegrasikan unsur edukasi, pelatihan, penerapan teknologi, pendampingan, serta evaluasi yang berorientasi pada keberlanjutan program`,
            `Pertama, Edukasi Interaktif Literasi Keuangan, yang memberikan pemahaman mendalam mengenai perencanaan keuangan, konsep investasi, dan strategi menabung sejak dini. `,
            `Kedua, Pemanfaatan Teknologi Keuangan, yang melatih siswa dalam penggunaan LMS, platform Galeri Investasi BEI, serta aplikasi investasi digital. Ketiga, Integrasi Pembelajaran Praktis, berupa simulasi investasi, analisis pasar saham sederhana, serta pengenalan laporan keuangan perusahaan. `,
        ]
    };

    function openModal(titleKey) {
        const titleMap = {
            literasi: 'Literasi Keuangan',
            teknologi: 'Teknologi Digital',
            kolaboratif: 'Pembelajaran Kolaboratif'
        };

        const title = titleMap[titleKey] || 'Informasi';
        const content = modalContents[titleKey] || 'Konten belum tersedia.';

        document.getElementById('modal-title').innerText = title;
        const contentContainer = document.getElementById('modal-content');
        contentContainer.innerHTML = ''; // Kosongkan dulu

        content.forEach(paragraph => {
            const p = document.createElement('p');
            p.textContent = paragraph.trim();
            p.className = 'mb-4 text-gray-700 leading-relaxed';
            contentContainer.appendChild(p);
        });
        document.getElementById('custom-modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('custom-modal').classList.add('hidden');
    }
</script>
