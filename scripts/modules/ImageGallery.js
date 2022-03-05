
// class Modal{
//     constructor(){
//        this.injectHTML()
//        this.modal = document.querySelector(".modal")
//        this.closeIcon = document.querySelector(".modal__close")
//        this.openModalButtons = document.querySelectorAll(".exhibition-page--image-container") 
//        this.events()
//     }
   
//     events(){
//    //listen for open click
//    this.openModalButtons.forEach( el => el.addEventListener("click", e => this.openTheModal(e) ))
   
//    //Listen for close click
//    this.closeIcon.addEventListener("click", () => this.closeTheModal())
   
//    // pushes any key
//    document.addEventListener("keyup", e => this.keyPressHandler(e))
   
//     }
   
//     keyPressHandler(e){
//        if(e.keyCode == 27){
//            this.closeTheModal()
//        }
//     }
   
//    openTheModal(e){
//        e.preventDefault()
//        this.modal.classList.add('modal--is-visible')
//    }
   
//    closeTheModal(){
//        this.modal.classList.remove('modal--is-visible') 
//    }
   
//     injectHTML(){
//      document.body.insertAdjacentHTML('beforeend', `
//      <div class="modal">
//      <div class="modal__inner">
//        <h2 class="modal__title">Exhibition photos</h2>
//        <div class="wrapper wrapper--narrow">
//          <p class="modal__description">We will have an online order system in place soon. Until then, connect with us on any of the platforms below!</p>
//        </div>

//        </div>
   
//      </div>
   
//      <div class="modal__close">X</div>
//    </div>
//      `)
//     }
//    }
  

class Modal{
  constructor () {

    
     
// Get the modal
let modal = document.querySelector('#myModal');
let pageHeader = document.querySelector('.wrapper__header');

// Get the <span> element that closes the modal
let closeModal = document.querySelector(".close");

// When the user clicks on <span> (x), close the modal
closeModal.onclick = function() { 
    modal.style.display = "none";
    pageHeader.style.display = "block";
}

// Get all images and insert the clicked image inside the modal
// Get the content of the image description and insert it inside the modal image caption
var images = document.querySelectorAll('.img');
let photos = document.querySelectorAll('.expo-photo');
var modalImg = document.getElementById("img01");
// var captionText = document.querySelector("#caption");
var i;
// for (i = 0; i < images.length; i++) {
//    images[i].onclick = function(e){
//      e.preventDefault();
//        modal.style.display = "block";
//        modalImg.src = console.log(images[i]);
//        modalImg.alt = this.alt;
//       //  captionText.innerHTML = 'this.nextElementSibling.innerHTML';
//        console.log(e)
//    }
// }

photos.forEach(image => {
  image.onclick = function(e){
    e.preventDefault();
      modal.style.display = "block";
      modalImg.src = this.src.replace("150x150", "480x650");
      modalImg.innerHTML = console.log(this.src.replace("150x150", "480x650"));
      modalImg.alt = this.alt;
      pageHeader.style.display = "none";

  }
})

  }
}





   export default Modal
  