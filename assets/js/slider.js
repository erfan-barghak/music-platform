document.addEventListener('DOMContentLoaded', function () {
    const sliderWrapper = document.querySelector('.ad-slider-wrapper');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const slides = document.querySelectorAll('.ad-slide');
    let slideIndex = 0;
    const slideWidth = slides[0].offsetWidth;

    function showSlide(index) {
        sliderWrapper.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    prevButton.addEventListener('click', () => {
        slideIndex = (slideIndex > 0) ? slideIndex - 1 : slides.length - 1;
        showSlide(slideIndex);
    });

    nextButton.addEventListener('click', () => {
        slideIndex = (slideIndex < slides.length - 1) ? slideIndex + 1 : 0;
        showSlide(slideIndex);
    });

    // Optional: Allow dragging to scroll
    let startX, scrollLeft;
    let isDown = false;

    sliderWrapper.addEventListener('mousedown', (e) => {
        isDown = true;
        sliderWrapper.classList.add('active');
        startX = e.pageX - sliderWrapper.offsetLeft;
        scrollLeft = sliderWrapper.scrollLeft;
    });

    sliderWrapper.addEventListener('mouseleave', () => {
        isDown = false;
        sliderWrapper.classList.remove('active');
    });

    sliderWrapper.addEventListener('mouseup', () => {
        isDown = false;
        sliderWrapper.classList.remove('active');
    });

    sliderWrapper.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - sliderWrapper.offsetLeft;
        const walk = (x - startX) * 2; // scroll-fast
        sliderWrapper.scrollLeft = scrollLeft - walk;
    });
});
