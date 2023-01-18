var swiper = new Swiper('.cs-carousel', {
    slidesPerView:1,
    effect: 'fade',
//     loop: true,
    lazy: true,
    // speed: 600,
    parallax: true,
    autoplay: {
        delay: 2000,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
});