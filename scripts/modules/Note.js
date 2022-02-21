import $ from 'jquery';

class Notes{
    constructor(){
      this.events();
    }

    events(){
        document.querySelector('.note-delete').addEventListener('click', this.deleteNote);

    }

    //  Methods go here
    deleteNote(){
alert("you clicked delete");
    }
}

export default Notes;