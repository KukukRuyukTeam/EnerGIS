document.addEventListener("DOMContentLoaded", function() {
    const images = ["image/plta.png", "image/pltb.png", "image/pltbm.png", "image/pltm.png", "image/pltmh.png", "image/pltp.png", "image/plts.png", "image/spklu.png"];

    const slideshowViewport = document.querySelector(".slideshow-viewport");
    const prevButton = document.querySelector(".prev-button");
    const nextButton = document.querySelector(".next-button");
    const paginationDots = document.querySelector(".pagination-dots");

    let currentSlide = 0;

    function loadImages() {
        for (let i = 0; i < images.length; i++) {
            const img = document.createElement("img");
            img.src = images[i];
            img.alt = `Image ${i + 1}`;
            slideshowViewport.appendChild(img);

            const dot = document.createElement("span");
            dot.classList.add("dot");
            dot.addEventListener("click", () => showSlide(i));
            paginationDots.appendChild(dot);
        }

        showSlide(currentSlide);
    }

    function showSlide(slideIndex) {
        if (slideIndex < 0) {
            slideIndex = images.length - 1;
        } else if (slideIndex >= images.length) {
            slideIndex = 0;
        }

        currentSlide = slideIndex;

        slideshowViewport.style.transform = `translateX(-${slideIndex * 25}%)`;

        const dots = paginationDots.querySelectorAll(".dot");
        dots.forEach((dot, index) => {
            if (index === slideIndex) {
                dot.classList.add("activee");
            } else {
                dot.classList.remove("activee");
            }
        });
    }

    function changeSlide(n) {
        showSlide(currentSlide + n);
    }

    prevButton.addEventListener("click", () => changeSlide(-1));
    nextButton.addEventListener("click", () => changeSlide(1));

    loadImages();
});