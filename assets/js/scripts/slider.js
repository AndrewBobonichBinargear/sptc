var swiper = new Swiper(".swiper:not(.swiper-gallery)", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  grabCursor: false,
  initialSlide: 0,
  centeredSlides: true,
  slidesPerView: "auto",
  spaceBetween: 10,
  speed: 2000,
  mousewheel: false,
  allowTouchMove: false,
  on: {
    click(event) {
      swiper.slideTo(this.clickedIndex);
    },
  },
});

function initSwipers() {
    document.querySelectorAll('.swiper-container').forEach((container, index) => {
        const swiper = new Swiper(container, {
            loop: true,
            pagination: {
                el: container.querySelector('.swiper-pagination'),
                clickable: true,
            },
            allowTouchMove: false,
        });
    });
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".fleet-gallery, .fleet-gallery-showcase").forEach((slider) => {
        let paginationEl = slider.querySelector(".swiper-pagination");

        let swiperInstance = new Swiper(slider, {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: paginationEl,
                clickable: true,
            },
            autoplay: false,
            speed: 200,
            mousewheel: false,
            allowTouchMove: false,
        });
    });

    let outerSlider = new Swiper(".outer-slider", {
        slidesPerView: "auto",
        centeredSlides: true,
        spaceBetween: 50,
        loop: false,
        mousewheel: false,
        simulateTouch: false,
        allowTouchMove: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".outer-next",
            prevEl: ".outer-prev",
        },
        speed: 2000,
    });

    document.querySelectorAll(".category-button").forEach((button) => {
        button.addEventListener("click", function () {
            let slideIndex = parseInt(this.getAttribute("data-slide"));
            outerSlider.slideToLoop(slideIndex);

            document.querySelectorAll(".category-button").forEach((btn) => {
                btn.classList.remove("active");
            });

            this.classList.add("active");
        });
    });
});


var swiper = new Swiper(".swiper-gallery", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  grabCursor: true,
  initialSlide: 0,
  centeredSlides: true,
  slidesPerView: "auto",
  spaceBetween: 10,
  speed: 2000,
  mousewheel: false,
  allowTouchMove: true,
  on: {
    click(event) {
      swiper.slideTo(this.clickedIndex);
    }
  },
  breakpoints: {
    768: {
      slidesPerView: "auto",
      centeredSlides: true,
      spaceBetween: 10,
    },
    0: {
      slidesPerView: "auto",
      centeredSlides: true,
      spaceBetween: 6,
    }, 
  },
});

setTimeout(function () {
  const transformValue = window.getComputedStyle(document.querySelector('.our-gallery .swiper-wrapper')).transform;

  if (transformValue.startsWith('matrix')) {
    const matrixValues = transformValue.match(/matrix.*\(([^,]+),([^,]+),([^,]+),([^,]+),([^,]+),([^,]+)\)/);
    if (matrixValues) {
      const translateX = parseInt(matrixValues[5], 10);
      document.querySelector('.our-gallery .swiper-wrapper').style.left = `-${translateX}px`;
    }
  } else if (transformValue.startsWith('translate3d')) {
    const match = transformValue.match(/translate3d\(([^,]+)/);
    if (match) {
      const translateX = parseInt(match[1], 10);
      document.querySelector('.our-gallery .swiper-wrapper').style.left = `-${translateX}px`;
    }
  }
},100)
