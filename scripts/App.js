import '../style.css'
import RevealOnScroll from './modules/RevealOnScroll'
import StickyHeader from './modules/StickyHeader'
import ImageGallery from './modules/ImageGallery'
import ImageSlider from './modules/ImageSlider'
import Modal from './modules/Modal'
import Search from './modules/search'
import Notes from './modules/Note'



new Notes();
new Modal();
const search = new Search();
let imageGallery = new ImageGallery();
let imageSlider = new ImageSlider();

let stickyHeader = new StickyHeader();
const myNotes = new MyNotes();

new RevealOnScroll(document.querySelectorAll(".page-section__news"), 40);
new RevealOnScroll(document.querySelectorAll(".events-section"), 75);


if(module.hot){
    module.hot.accept()
}