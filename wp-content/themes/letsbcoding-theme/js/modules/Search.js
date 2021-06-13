class Search {
    //1. create and initiate the object
    constructor() {
        /* ordering matters. This needs to be placed before everything else. */
        this.addSearchHTML()
        this.searchResultsDiv = document.querySelector('#search-overlay__results')
        this.openButton = document.querySelectorAll('.js-search-trigger')
        this.closeButton = document.querySelector('.search-overlay__close')
        this.searchOverlay = document.querySelector('.search-overlay')
        this.isOverlayOpen = false
        this.isSpinnerVisible = false
        this.searchField = document.querySelector('#search-term')
        
        this.allInputs = document.querySelectorAll('input, textarea')
        this.previousValue
        this.typingTimer
        this.events()
    }
    //2. events
    events() {
        this.openButton[0].addEventListener('click', this.openOverlay.bind(this))
        this.openButton[1].addEventListener('click', this.openOverlay.bind(this))
        this.closeButton.addEventListener('click', this.closeOverlay.bind(this))
        document.addEventListener('keydown', this.keyPressDispatcher.bind(this))
        this.searchField.addEventListener('keyup', this.typingConstruct.bind(this))
    }
    //3. methods (or functions)

    openOverlay() {
        this.searchOverlay.classList.add('search-overlay--active')
        document.body.classList.add('body-no-scroll')
        this.searchField.value = ``
        setTimeout(() => this.searchField.focus(), 301)
        this.isOverlayOpen = true
    }
 
    closeOverlay() {
        this.searchOverlay.classList.remove('search-overlay--active')
        document.body.classList.remove('body-no-scroll')
        this.isOverlayOpen = false
        
    }

    keyPressDispatcher(e) {
        if (e.key === 's' && !this.isOverlayOpen && this.checkFocus(this.allInputs)) {
            this.openOverlay()
            // this.isOverlayOpen = true
        }

        if (e.key === 'Escape' && this.isOverlayOpen && this.checkFocus(this.allInputs)) {
            this.closeOverlay()
            // this.isOverlayOpen = false
        }
    }

    typingConstruct() {
        
        if (this.searchField.value !== this.previousValue) {
            clearTimeout(this.typingTimer)

            if (this.searchField.value) {
                if (!this.isSpinnerVisible) {
                    this.searchResultsDiv.innerHTML = `<div class="spinner-loader"></div>`
                    this.isSpinnerVisible = true
                }
                this.typingTimer = setTimeout(this.getSearchResults.bind(this), 750)
            } else {
                this.searchResultsDiv.innerHTML = ``
                this.isSpinnerVisible = false
            }
        }

        this.previousValue = this.searchField.value
    }

    async renderHTML() {
        // await response of fetch call
        let response = await fetch(`${bcodingData.root_url}/wp-json/bcoding/v1/search?term=${this.searchField.value}`)
        // only proceed once promise is resolved
        let results = await response.json()
        // const results = await this.apiEndpointCall()
        return this.searchResultsDiv.innerHTML = `
            <div class="row">
                <div class="one-third">
                    <h2 class="search-overlay__section-title">General Results</h2>
                        ${results.generalResults.length ? `<ul class="link-list min-list">` : `<p>No data matches your search<p>`}
                        ${results.generalResults.map(result => `<li><a href="${result.permalink}">${result.title}</a> by ${result.authorName}</li>`).join('')}    
                    ${results.generalResults.length ? `</ul>` : ``}
                </div>

                <div class="one-third">
                    <h2 class="search-overlay__section-title">Programs</h2>
                        ${results.programs.length ? `<ul class="link-list min-list">` : `<p>No programs match your search. <a href="${bcodingData.root_url}/programs">View all programs.</a><p>`}
                        ${results.programs.map(result => `<li><a href="${result.permalink}">${result.title}</a></li>`).join('')}    
                    ${results.programs.length ? `</ul>` : ``}

                    <h2 class="search-overlay__section-title">Professors</h2>
                        ${results.professors.length ? `<ul class="professor-cards">` : `<p>No professors match your search.<p>`}
                        ${results.professors.map(result => `
                        <li class="professor-card__list-item">
                            <a class="professor-card" href="${result.permalink}">
                                <img class="professor-card__image" src="${result.image}">
                                <span class="professor-card__name">${result.title}</span>
                            </a>
                        </li>
                        `).join('')}
                    ${results.professors.length ? `</ul>` : ``}
                </div>
                
                <div class="one-third">
                    <h2 class="search-overlay__section-title">Campuses</h2>
                        ${results.campuses.length ? `<ul class="link-list min-list">` : `<p>No campuses matches your search. <a href="${bcodingData.root_url}/campuses">View all programs.</a></p>`}
                        ${results.campuses.map(result => `<li><a href="${result.permalink}">${result.title}</a> ${result.postType === 'post' ? `by ${result.authorName}` : ``}</li>`).join('')}
                        ${results.campuses.length ? `</ul>` : ``}

                    <h2 class="search-overlay__section-title">Events</h2>
                        ${!results.events.length ? `<p>No campuses matches your search. <a href="${bcodingData.root_url}/events">View all events.</a></p>` :
                        `${results.events.map(result => `
                        <div class="event-summary">
                            <a class="event-summary__date event-summary__date--blue t-center" href="${result.permalink}">
                            <span class="event-summary__month">${result.month}</span>
                            <span class="event-summary__day">${result.day}</span>
                            </a>
                            <div class="event-summary__content">
                                <h5 class="event-summary__title headline headline--tiny"><a href="${result.permalink}">${result.title}</a></h5>
                                <p>${result.description} <a href="${result.permalink}" class="nu gray">Read more</a></p>
                            </div>
                        </div>
                        `).join('')}`}
                </div>
            </div>
        `
    }

    getSearchResults() {
        this.renderHTML()
            .catch(e => {
                this.searchResultsDiv.innerHTML = `<p>Unexpected error. Please try again.</p>`
        })
        this.isSpinnerVisible = false
    }

    checkFocus(all) {
		//loops through all inputs
		for (const el of all) {
			//checks if any of the inputs have focus
			//returns false as soon as it finds focused elements
			if (document.activeElement == el) return false;
		}
		//else return true
		return true;
    }

     addSearchHTML() {
        // create a new element
        const elem = document.createElement('div');
        // set a class attribute
        elem.setAttribute('class', 'search-overlay');
        // Add all the html (except for the outer div as that has been generated by the new element)
        elem.innerHTML = `
        <div class="search-overlay__top">
            <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" class="search-term" id="search-term" placeholder="Type and search..." />
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
            </div>
        </div>
    
        <div class="container">
            <div id="search-overlay__results"></div>
        </div>`
    
    // append the new element to the body
        document.body.append(elem);
    }
}
 
export default Search;


