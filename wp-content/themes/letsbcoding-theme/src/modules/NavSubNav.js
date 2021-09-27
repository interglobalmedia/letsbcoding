class NavSubNav {
    constructor() {
        this.parentNavLink = document.querySelector('div .members')
        this.childNavUl = document.querySelector('ul.sub-nav')
        this.events()
    }

    events() {
        this.parentNavLink.addEventListener('click', (e) => this.subnavHandler(e))
    }
    
    subnavHandler(e) {
        e.preventDefault()
        this.childNavUl.classList.toggle('subnav-show')
    }
}

export default NavSubNav