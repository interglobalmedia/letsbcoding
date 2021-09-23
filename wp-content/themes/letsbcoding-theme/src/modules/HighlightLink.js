class HighlightLink {
    constructor() {
        this.links = document.querySelectorAll('.menu-link')
        this.linkHandler()
    }

    linkHandler() {
        for (var i = 0; i < this.links.length; i++) {
            if (this.links[1].href == document.URL || document.URL.includes(`${bcodingData.root_url}/members`)) {
                this.links[1].classList.add('active')
            }
            if (this.links[3].href == document.URL || document.URL.includes(`${bcodingData.root_url}/events`)) {
                this.links[3].classList.add('current-menu-item')
            }
        }
    }
}

export default HighlightLink