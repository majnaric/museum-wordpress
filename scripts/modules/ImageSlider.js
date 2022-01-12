import Swiper from 'swiper';


class ImageSlider{
    constructor(){

const swiper = new Swiper(".swiper-container", {
    speed: 900,
    loop: true,

    // If we need pagination
    // pagination: {
    //     el: ".swiper-pagination"
    // },

    // Navigation arrows
    // navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev"
    // }
});


          const images = document.getElementById("images");
const leftButton = document.getElementById("left");
const rightButton = document.getElementById("right");

const imagesList = document.querySelectorAll("#images .swiper-slide");
let index = 0;


const changeImage = (e) => {
  
  if (index > imagesList.length - 1) index = 0;
  else if (index < 0) index = imagesList.length - 1;
  images.style.transform = `translateX(${-index * images.clientWidth}px)`;
};

const run = () => {
  index++;
  changeImage();
};

const resetInterval = () => {
  clearInterval(interval);
  interval = setInterval(run, 2000);
};

let interval = setInterval(run, 2000);

rightButton.addEventListener("click", () => {
  index++;
  changeImage();
  resetInterval();
});

leftButton.addEventListener("click", () => {
  index--;
  changeImage();
  resetInterval();
});



    }
}


export default ImageSlider;


