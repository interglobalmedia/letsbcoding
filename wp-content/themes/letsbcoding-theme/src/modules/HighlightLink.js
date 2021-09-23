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
        }
    }
}

export default HighlightLink