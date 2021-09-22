class HighlightLink {
    constructor() {
        this.links = document.querySelectorAll('.menu-link')
        this.linkHandler()
    }

    linkHandler() {
        for (var i = 0; i < this.links.length; i++) {
            if (this.links[i].href === document.URL) {
                this.links[i].classList.add('active')
            }
            if (this.links[0].href === document.URL || document.URL === `${bcodingData.root_url}`) {
                this.links[0].classList.add('active')
            }
            if (this.links[1].href === document.URL || document.URL.includes(`${bcodingData.root_url}/members`)) {
                this.links[1].classList.add('active')
            }
        }
    }
}

export default HighlightLink