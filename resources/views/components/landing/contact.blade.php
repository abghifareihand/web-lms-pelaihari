@props(['id' => null])
<section id="{{ $id }}" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
            <p class="text-xl text-gray-600">Tertarik bergabung atau memiliki pertanyaan?</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-4xl font-semibold mb-6">Informasi Kontak</h3>
                <p class="text-lg font-semibold mb-6">SMA NEGERI 1 PELAIHARI</p>
                <div class="space-y-4">

                    {{-- NPSN --}}
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-red-600 flex-shrink-0">
                            <i class="fa-solid fa-graduation-cap text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold">NPSN</p>
                            <p class="text-gray-600">30300697</p>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-600 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold">Alamat</p>
                            <p class="text-gray-600">
                                Jl. A. Syairani Komplek Perkantoran Gagas Pelaihari Kab.Tanah Laut 70814
                            </p>
                        </div>
                    </div>


                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-purple-600 flex-shrink-0">
                            <i class="fas fa-envelope text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold">Email</p>
                            <p class="text-gray-600">info@sman1plh.sch.id</p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-600 flex-shrink-0">
                            <i class="fas fa-phone text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold">Telepon</p>
                            <p class="text-gray-600">051221200</p>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <form id="contactForm" onsubmit="sendEmail(event)" class="space-y-4">
                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="name" class="w-full p-3 border border-gray-300 rounded-lg"
                            required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg"
                            required>
                    </div>

                    <!-- Subjek -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                        <input type="text" id="subject" class="w-full p-3 border border-gray-300 rounded-lg"
                            required>
                    </div>

                    <!-- Pesan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                        <textarea id="message" rows="4" class="w-full p-3 border border-gray-300 rounded-lg" required></textarea>
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold">
                        Kirim Pesan
                    </button>
                </form>


            </div>
        </div>
    </div>
</section>
<script>
    function sendEmail(event) {
        event.preventDefault(); // Supaya form tidak reload halaman

        // Ambil nilai input
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const subject = document.getElementById('subject').value.trim();
        const message = document.getElementById('message').value.trim();

        // Buat isi body email
        const body =
            `Nama: ${name}%0D%0A` +
            `Email: ${email}%0D%0A` +
            `Pesan:%0D%0A${message}`;

        // Buat link mailto
        const mailtoLink = `mailto:info@sma1pelaihari.sch.id?subject=${encodeURIComponent(subject)}&body=${body}`;

        // Arahkan user ke mailto link
        window.location.href = mailtoLink;
    }
</script>
