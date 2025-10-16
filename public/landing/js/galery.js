document.addEventListener("DOMContentLoaded", function () {
    const galleryItems = document.querySelectorAll(".gallery-item");
    const modal = document.getElementById("modal");
    const modalTitle = document.getElementById("modal-title");
    const modalDescription = document.getElementById("modal-fulldes");
    const modalImage = document.getElementById("modal-image");
    const modalId = document.getElementById("modal-id");
    const closeModal = document.getElementById("close-modal");

    galleryItems.forEach((item) => {
        item.addEventListener("click", function () {
            const id = this.dataset.id;
            const title = this.dataset.title;
            const description = this.dataset.fulldes;
            const image = this.dataset.image;

            // Isi modal
            modalTitle.textContent = title;
            modalDescription.textContent = description;
            modalImage.src = image;
            modalImage.alt = title;
            modalId.value = id;

            // Tampilkan modal
            modal.classList.remove("hidden");
        });
    });

    // Tutup modal saat tombol close diklik
    closeModal.addEventListener("click", function () {
        modal.classList.add("hidden");
    });

    // Tutup modal jika klik di luar konten modal
    window.addEventListener("click", function (e) {
        if (e.target === modal) {
            modal.classList.add("hidden");
        }
    });
});
