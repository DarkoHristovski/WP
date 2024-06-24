let cards = document.querySelectorAll('.section-cards .cards');
let cards2 = document.getElementsByClassName('.cards');
let burgerBtn = document.querySelector('.burger')
let showTextBtn = document.querySelectorAll('button');

console.log('showTextBtn',showTextBtn)

let burgerBtnFunction = (e) =>{
    e.preventDefault;
    document.body.classList.toggle('show-menu');
    }

burgerBtn.addEventListener('click',burgerBtnFunction);



showTextBtn.forEach((button)=>{
    button.addEventListener('click',function(){
        const cardElement = button.closest('.cards');
        if(cardElement){
            let textWrapper = cardElement.querySelector('.text-wrapper p');
            if(textWrapper){
                let textContent = textWrapper.textContent;
                alert(textContent)
            }
        }


    })
})


document.addEventListener('DOMContentLoaded', function () {

  const swiper2 = new Swiper('#swiper-2', {
    slidesPerView: 1.5,
    spaceBetween: 80,
    centeredSlides: true,
    loop: true,
    breakpoints: {
                // when window width is >= 320px (mobile)
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                // when window width is >= 640px (tablet)
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });

  const swiper1 = new Swiper('#swiper-1', {
    speed: 400,
    autoplay: {
      delay: 5000,
    },
    // Optional parameters
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });




});