document.addEventListener('DOMContentLoaded', function() {
    const slidesContainer = document.querySelector('.ad-slides');
    const slides = document.querySelectorAll('.ad-slide');
    const prevButton = document.querySelector('.prev-slide');
    const nextButton = document.querySelector('.next-slide');
    let index = 0;

    function showSlide(n) {
        if (n >= slides.length) {
            index = 0;
        } else if (n < 0) {
            index = slides.length - 1;
        } else {
            index = n;
        }
        slidesContainer.style.transform = 'translateX(' + (-index * 100) + '%)';
    }

    prevButton.addEventListener('click', function() {
        showSlide(index - 1);
    });

    nextButton.addEventListener('click', function() {
        showSlide(index + 1);
    });

    showSlide(index);
});
