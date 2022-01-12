class ImageGallery{
    constructor(){
        let div = document.querySelectorAll('.exhibition-page--image-container');
        let pics = ["assets/images/meteors-exhibition/1a.jpg", 
        "assets/images/meteors-exhibition/2a.jpg",
        "assets/images/meteors-exhibition/3a.jpg",
        "assets/images/meteors-exhibition/4a.jpg",
        "assets/images/meteors-exhibition/5a.jpg",
        "assets/images/meteors-exhibition/6a.jpg",
         "assets/images/meteors-exhibition/7a.jpg",
         "assets/images/meteors-exhibition/8a.jpg"];
        let hasClass = false;
    
    
        for (let i = 0; i < div.length; i++){
            let img = document.createElement("img");
            div[i].appendChild(img);
            img.setAttribute('src', pics[i]);
        }

    
        document.addEventListener('click', function(event) {
    let divImage = document.querySelectorAll('.exhibition-page--image-container img');
        for(let i = 0; i < div.length; i++){
    
    div[i].classList.remove('exhibition-page--expo-resize');
    }
    
    
    
            if(event.target.parentNode.classList == 'exhibition-page--image-container' && !hasClass){
                console.log(this.target)
                event.target.parentNode.classList.add('exhibition-page--expo-resize');
                event.target.setAttribute('src', event.target.src.replace('a.jpg', '.jpg'));                
     
                hasClass = true;
    
                event.target.style.position = 'relative';
    
                for(let i = 0; i < div.length; i++){
                    div[i].style.display = 'none'
    }
          event.target.parentNode.style.display = 'block'
            } else if(event.target.parentNode.classList == 'exhibition-page--image-container' && hasClass){
    
                event.target.parentNode.classList.remove('exhibition-page--expo-resize');
let childImage = document.querySelectorAll('div img');

console.log(event.target.children.src);
// event.target.childImage.setAttribute('src', event.target.childImage.src.replace('.jpg', 'a.jpg'))


                hasClass = false;
    
                
                for(let i = 0; i < div.length; i++){
    div[i].style.display = 'block'
    }
    
            }else{
                
                for(let i = 0; i < div.length; i++){
    
   div[i].classList.remove('exhibition-page--expo-resize');

   div[i].style.display = 'block';

    }
    

                hasClass = true;
            }
            
        })
    
    }
}

export default ImageGallery;