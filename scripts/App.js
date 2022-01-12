import '../style.css'
import RevealOnScroll from './modules/RevealOnScroll'
import StickyHeader from './modules/StickyHeader'
import ImageGallery from './modules/ImageGallery'
import ImageSlider from './modules/ImageSlider'
import Modal from './modules/Modal'


new Modal()
let imageGallery = new ImageGallery();
let imageSlider = new ImageSlider();

let stickyHeader = new StickyHeader();


new RevealOnScroll(document.querySelectorAll(".page-section__news"), 40);
new RevealOnScroll(document.querySelectorAll(".events-section"), 75);


if(module.hot){
    module.hot.accept()
}