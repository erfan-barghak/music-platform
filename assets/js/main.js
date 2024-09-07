document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    const closeMenu = document.querySelector('.close-menu');

    menuToggle.addEventListener('click', function () {
        mainNav.classList.add('active');
    });

    closeMenu.addEventListener('click', function () {
        mainNav.classList.remove('active');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.querySelector('.prev-slide');
    const nextButton = document.querySelector('.next-slide');
    let currentIndex = 0;

    function showSlide(index) {
        if (index >= slides.length) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = slides.length - 1;
        } else {
            currentIndex = index;
        }
        document.querySelector('.slider').style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    prevButton.addEventListener('click', () => {
        showSlide(currentIndex - 1);
    });

    nextButton.addEventListener('click', () => {
        showSlide(currentIndex + 1);
    });

    // Optional: Auto-slide
    setInterval(() => {
        showSlide(currentIndex + 1);
    }, 5000);
});


<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3, // تعداد بنرهایی که به طور همزمان نمایش داده می‌شود
        spaceBetween: 30,
        loop: true, // برای فعال کردن حالت چرخشی
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000, // زمان تاخیر بین اسلایدها (میلی‌ثانیه)
            disableOnInteraction: false,
        },
    });
</script>

