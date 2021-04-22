const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    slidesPerView: 1,
    breakpoints:{
        480:{
          slidesPerView: 3,
          spaceBetween: 10,
        },
        960:{
          slidesPerView: 4,
          spaceBetween: 10,
          centeredSlides: false,
        }
    },
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: true
    },
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });