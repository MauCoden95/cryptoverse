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




let stars = document.querySelector('.stars');
let range = document.querySelector('.range');

if (range) {
    range.addEventListener('change', () => {
        if (range.value == 1) {
            stars.innerHTML = '<i class="lni lni-star-fill"></i>';     
        }else if (range.value == 2) {
            stars.innerHTML = '<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>';     
        }else if (range.value == 3) {
            stars.innerHTML = '<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>';     
        }else if (range.value == 4) {
            stars.innerHTML = '<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>';     
        }else{
            stars.innerHTML = '<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>'+'<i class="lni lni-star-fill"></i>';     
        }
       
    })    
}