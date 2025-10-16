let currentQuestion = 0;
let score = 0;

let questionEl = document.getElementById("question");
let quizContent = document.getElementById("quiz-content");
let quizProgress = document.getElementById("quiz-progress");
let progressText = quizContent.querySelector("p.text-sm");

function loadQuestion() {
    const current = quizQuestions[currentQuestion];

    // Ganti teks soal
    questionEl.textContent = current.question;

    // Ganti opsi jawaban
    const optionsContainer = quizContent.querySelector(".space-y-2");
    optionsContainer.innerHTML = ""; // Kosongkan dulu

    current.options.forEach((option) => {
        const button = document.createElement("button");
        button.className =
            "quiz-option w-full text-left p-3 bg-white bg-opacity-30 rounded hover:bg-opacity-50 transition";
        button.textContent = option.text;
        button.onclick = () => selectAnswer(button, option.correct);
        optionsContainer.appendChild(button);
    });

    // Update progress bar
    const progressPercent =
        ((currentQuestion + 1) / quizQuestions.length) * 100;
    quizProgress.style.width = `${progressPercent}%`;
    progressText.textContent = `Pertanyaan ${currentQuestion + 1} dari ${
        quizQuestions.length
    }`;
}

function selectAnswer(button, isCorrect) {
    const options = quizContent.querySelectorAll(".quiz-option");

    // Nonaktifkan semua tombol
    options.forEach((btn) => {
        btn.disabled = true;
        btn.classList.remove("bg-green-500", "bg-red-500");
    });

    // Tambahkan warna
    if (isCorrect) {
        button.classList.add("bg-green-500");
        score++;
    } else {
        button.classList.add("bg-red-500");
    }

    // Lanjut ke pertanyaan berikutnya setelah delay
    setTimeout(() => {
        currentQuestion++;
        if (currentQuestion < quizQuestions.length) {
            loadQuestion();
        } else {
            showResult();
        }
    }, 800); // jeda 0.8 detik
}

function showResult() {
    quizContent.innerHTML = `
        <div class="text-center">
            <h2 class="text-2xl font-bold mb-4">🎉 Kuis Selesai!</h2>
            <p class="text-lg">Kamu menjawab <strong>${score}</strong> dari <strong>${quizQuestions.length}</strong> soal dengan benar.</p>
            <button id="restart-btn" class="mt-6 px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded transition">
                Ulangi Kuis
            </button>
        </div>
    `;

    // Tambahkan event listener ke tombol ulangi
    document
        .getElementById("restart-btn")
        .addEventListener("click", restartQuiz);
}

function restartQuiz() {
    currentQuestion = 0;
    score = 0;

    // Kembalikan struktur HTML quiz ke awal
    quizContent.innerHTML = `
        <p class="text-sm text-right mb-2 text-white/60">Pertanyaan 1 dari ${quizQuestions.length}</p>
        <div id="question" class="text-lg font-semibold mb-4"></div>
        <div class="space-y-2"></div>
        <div class="mt-4">
            <div class="bg-white bg-opacity-30 rounded-full h-2">
                <div id="quiz-progress" class="progress-bar bg-yellow-400 h-2 rounded-full" style="width: 0%"></div>
            </div>
            <p class="text-sm mt-2">Pertanyaan 1 dari ${quizQuestions.length}</p>
        </div>
    `;

    // Re-bind elemen karena elemen sebelumnya hilang setelah innerHTML
    questionEl = document.getElementById("question");
    quizProgress = document.getElementById("quiz-progress");
    progressText = quizContent.querySelector("p.text-sm");

    loadQuestion();
}

// Jalankan saat halaman siap
document.addEventListener("DOMContentLoaded", () => {
    if (typeof quizQuestions !== "undefined" && quizQuestions.length > 0) {
        loadQuestion();
    }
});
