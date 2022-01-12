class Modal{
 constructor(){
    this.injectHTML()
    this.modal = document.querySelector(".modal")
    this.closeIcon = document.querySelector(".modal__close")
    this.openModalButtons = document.querySelectorAll(".open-modal") 
    this.events()
 }

 events(){
//listen for open click
this.openModalButtons.forEach( el => el.addEventListener("click", e => this.openTheModal(e) ))

//Listen for close click
this.closeIcon.addEventListener("click", () => this.closeTheModal())

// pushes any key
document.addEventListener("keyup", e => this.keyPressHandler(e))

 }

 keyPressHandler(e){
    if(e.keyCode == 27){
        this.closeTheModal()
    }
 }

openTheModal(e){
    e.preventDefault()
    this.modal.classList.add('modal--is-visible')
}

closeTheModal(){
    this.modal.classList.remove('modal--is-visible') 
}

 injectHTML(){
  document.body.insertAdjacentHTML('beforeend', `
  <div class="modal">
  <div class="modal__inner">
    <h2 class="modal__title">Get in Touch</h2>
    <div class="wrapper wrapper--narrow">
      <p class="modal__description">We will have an online order system in place soon. Until then, connect with us on any of the platforms below!</p>
    </div>

    <div class="social-network modal__social-icons">
      <a href="https://www.facebook.com/"><i class="fab fa-facebook social-network__icon"></i></a>
      <a href="https://www.twitter.com/"><i class="fab fa-twitter social-network__icon"></i></a>
      <a href="https://www.instagram.com/"><i class="fab fa-instagram social-network__icon"></i></a>
      <i class="far fa-envelope social-network__icon"></i>
    </div>

  </div>

  <div class="modal__close">X</div>
</div>
  `)
 }
}

export default Modal