@props(['id' => null, 'quizData' => []])
<section id="{{ $id }}" class="w-full bg-white border-gray-200 h-auto p-4">
    <div class="mx-auto max-w-6xl text-center">
        <h1 class="text-[32px] sm:text-[42px] text-black font-extrabold mt-10">Tools Edukasi</h1>
        <p class="text-[18px] sm:text-[24px] mt-2 text-[#4B5563]">
            Alat interaktif untuk mempraktikkan konsep keuangan
        </p>
    </div>

    <!-- Kalkulator & Kuis berdampingan -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">

        <!-- Kalkulator Investasi -->
        <div class="bg-gradient-to-r from-[#4DAFFE] to-[#12E1FE] p-8 rounded-xl text-white shadow-lg">
            <h3 class="text-2xl font-bold mb-6 text-center">Kalkulator Investasi</h3>
            <div class="bg-white bg-opacity-20 p-6 rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Investasi Awal (Rp)</label>
                        <input type="number" id="initialInvestment" class="w-full p-2 rounded text-gray-800"
                            placeholder="1000000">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Bunga per Tahun (%)</label>
                        <input type="number" id="interestRate" class="w-full p-2 rounded text-gray-800"
                            placeholder="10">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Periode (Tahun)</label>
                        <input type="number" id="period" class="w-full p-2 rounded text-gray-800" placeholder="5">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Setoran Bulanan (Rp)</label>
                        <input type="number" id="monthlyDeposit" class="w-full p-2 rounded text-gray-800"
                            placeholder="100000">
                    </div>
                </div>
                <button onclick="calculateInvestment()"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 rounded font-semibold transition duration-300">
                    Hitung Hasil Investasi
                </button>
                <div id="investmentResult" class="mt-4 p-4 bg-white bg-opacity-30 rounded hidden">
                    <p class="text-lg font-semibold">Hasil Investasi:</p>
                    <p id="finalAmount" class="text-2xl font-bold mt-2"></p>
                </div>
            </div>
        </div>

        <!-- Kuis Literasi Keuangan -->
        <div class="bg-gradient-to-r from-[#F18FF2] to-[#F45E7C] p-8 rounded-xl text-white shadow-lg">
            <h3 class="text-2xl font-bold mb-6 text-center">Kuis Literasi Keuangan</h3>
            <div id="quiz-content" class="bg-white bg-opacity-20 p-6 rounded-lg">
                <p class="text-lg mb-4" id="question">Apa yang dimaksud dengan inflasi?</p>
                <div class="space-y-2">
                    <button
                        class="quiz-option w-full text-left p-3 bg-white bg-opacity-30 rounded hover:bg-opacity-50 transition"
                        onclick="selectAnswer(this, false)">
                        Penurunan harga barang secara umum
                    </button>
                    <button
                        class="quiz-option w-full text-left p-3 bg-white bg-opacity-30 rounded hover:bg-opacity-50 transition"
                        onclick="selectAnswer(this, true)">
                        Kenaikan harga barang secara umum
                    </button>
                    <button
                        class="quiz-option w-full text-left p-3 bg-white bg-opacity-30 rounded hover:bg-opacity-50 transition"
                        onclick="selectAnswer(this, false)">
                        Nilai tukar mata uang
                    </button>
                </div>
                <div class="mt-4">
                    <div class="bg-white bg-opacity-30 rounded-full h-2">
                        <div id="quiz-progress" class="progress-bar bg-yellow-400 h-2 rounded-full" style="width: 33%">
                        </div>
                    </div>
                    <p class="text-sm mt-2">Pertanyaan 1 dari 3</p>
                </div>
            </div>
        </div>

    </div>
</section>

@push('scripts')
    <script>
        const quizQuestions = @json($quizData);
    </script>
    <script src="{{ asset('landing/js/investment-calculator.js') }}"></script>
    <script src="{{ asset('landing/js/quiz.js') }}"></script>
@endpush
