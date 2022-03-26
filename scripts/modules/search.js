import axios from "axios"

class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.addSearchHTML()
    this.resultsDiv = document.querySelector("#search-overlay__results")
    this.openButton = document.querySelectorAll(".js-search-trigger")
    this.closeButton = document.querySelector(".search-overlay__close")
    this.searchOverlay = document.querySelector(".search-overlay")
    this.searchField = document.querySelector("#search-term")
    this.isOverlayOpen = false
    this.isSpinnerVisible = false
    this.previousValue
    this.typingTimer
    this.events()
  }

  // 2. events
  events() {
    this.openButton.forEach(el => {
      el.addEventListener("click", e => {
        e.preventDefault()
        this.openOverlay()
      })
    })

    this.closeButton.addEventListener("click", () => this.closeOverlay())
    document.addEventListener("keydown", e => this.keyPressDispatcher(e))
    this.searchField.addEventListener("keyup", () => this.typingLogic())
  }

  // 3. methods (function, action...)
  typingLogic() {
    if (this.searchField.value != this.previousValue) {
      clearTimeout(this.typingTimer)

      if (this.searchField.value) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>'
          this.isSpinnerVisible = true
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750)
      } else {
        this.resultsDiv.innerHTML = ""
        this.isSpinnerVisible = false
      }
    }

    this.previousValue = this.searchField.value
  }

  async getResults() {
    try {
      const response = await axios.get(museumData.root_url + "/wp-json/museum/v1/search?term=" + this.searchField.value)
      const results = response.data

    //   Ovo je kod koji bi trebao da ubaci html u search overlay. javlja da ne prepoznaje title of undefined. console log u for loopu console.log(results[i].title izlistava nazive svih trazenih rezultata)



      this.resultsDiv.innerHTML = `
        <div class="search__row">
          <div class="search__one-third">
            <h2 class="search__section-title">General Information</h2>
            ${results.generalInfo.length   ? '<ul class="search--list">' : "<p>No general information matches that search.</p>"}
              ${results.generalInfo.map(item => `<li class="search--list-item"><a class="btn__learn-more btn__learn-more--dark" href="${item.permalink}">${item.title}</a> ${item.postType == "post" ? `by ${item.authorName}` : ""}</li>`).join("")}
            ${results.generalInfo.length ? "</ul>" : ""}
          </div>
          <div class="search__one-third">
            <h2 class="search__section-title">Departments</h2>
            ${results.departments.length ? '<ul class="search--list">' : `<p>No departments match that search. <a class="btn__learn-more btn__learn-more--dark" href="${museumData.root_url}/departments">View all departments</a></p>`}
              ${results.departments.map(item => `<li class="search--list-item"><a class="btn__learn-more btn__learn-more--dark" href="${item.permalink}">${item.title}</a></li>`).join("")}
            ${results.departments.length ? "</ul>" : ""}

            <h2 class="search__section-title">Curators</h2>
            ${results.curators.length ? '<ul class="search--list">' : `<p>No curators match that search.</p>`}
              ${results.curators
          .map(
            item => `
                <li class="search--list-item">
                  <a class="btn__learn-more btn__learn-more--dark"" href="${item.permalink}">
                    <img class="search--curator-image" src="${item.image}">
                    <span class="btn__learn-more btn__learn-more--dark search--list">${item.title}</span>
                  </a>
                </li>
              `
          )
          .join("")}
            ${results.curators.length ? "</ul>" : ""}

          </div>
          <div class="search__one-third">
            <h2 class="search__section-title">Exhibitions</h2>
            ${results.exhibitions.length ? '<ul class="search--list">' : `<p>No Exhibitions match that search. <a class="btn__learn-more btn__learn-more--dark" href="${museumData.root_url}/exhibitions">View all Exhibitions</a></p>`}
              ${results.exhibitions.map(item => `<li class="search--list-item"><a class="btn__learn-more btn__learn-more--dark" href="${item.permalink}">${item.title}</a></li>`).join("")}
            ${results.exhibitions.length ? "</ul>" : ""}

            <h2 class="search__section-title">Events</h2>
            ${results.events.length ? "" : `<p>No events match that search. <a class="btn__learn-more btn__learn-more--dark" href="${museumData.root_url}/events">View all events</a></p>`}
              ${results.events
          .map(
            item => `
                <div class="events-section__date-search-container">
                  <a class="event-summary__date t-center" href="${item.permalink}">
                    <span class="events-section__date events-section__date--inside events-section__date--search">${item.date}</span>  
                  </a>
                  <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a class="btn__learn-more btn__learn-more--dark search-title" href="${item.permalink}">${item.title}</a></h5>
                    <p>${item.description} <a href="${item.permalink}" class="btn__learn-more btn__learn-more--dark">Learn more</a></p>
                  </div>
                </div>
              `
          )
          .join("")}

          </div>
        </div>
      `

    
    // kraj  primera

    
      this.isSpinnerVisible = false
    } catch (e) {
      console.log(e)
    }
  }

  keyPressDispatcher(e) {
    if (e.keyCode == 83 && !this.isOverlayOpen && document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA") {
      this.openOverlay()
    }

    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay()
    }
  }

  openOverlay() {
    this.searchOverlay.classList.add("search-overlay--active")
    document.body.classList.add("body-no-scroll")
    this.searchField.value = ""
    setTimeout(() => this.searchField.focus(), 301)
    console.log("our open method just ran!");
    this.isOverlayOpen = true;
    return false;
  }

  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active")
    document.body.classList.remove("body-no-scroll")
    console.log("our close method just ran!")
    this.isOverlayOpen = false
  }

  addSearchHTML() {
    document.body.insertAdjacentHTML(
      "beforeend",
      `
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
          </div>
        </div>
        
        <div class="container">
          <div id="search-overlay__results"></div>
        </div>

      </div>
    `
    )
  }
}

export default Search
