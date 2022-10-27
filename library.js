var swiper = new Swiper('.swiper1', {
  speed: 400,
  spaceBetween: 0,
  direction: 'horizontal',
  loop: true,
  allowTouchMove: false,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});

var swiper = new Swiper('.swiper2', {
  speed: 400,
  spaceBetween: 0,
  direction: 'horizontal',
  loop: true,
  allowTouchMove: false,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});


var swiper = new Swiper('.swiper3', {
  speed: 400,
  spaceBetween: 0,
  direction: 'vertical',
  loop: true,
  allowTouchMove: true,

  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
