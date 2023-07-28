window.onload = function() {
     var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    });


    let userBtn = document.querySelector('.user_btn');
    var div = document.querySelector('.hiddenContent');

    userBtn.addEventListener('click', () => {
          div.classList.toggle('form-admin-invisible');
    })
};




