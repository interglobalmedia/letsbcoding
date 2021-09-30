class HighlightLink {
    constructor() {
        this.links = document.querySelectorAll('.menu-link')
        this.subLinks = document.querySelectorAll('ul.sub-nav li a')
        console.log(this.subLinks)
        console.log(this.links[3])
        this.linkHandler()
    }

    linkHandler() {
        for (let i = 0; i < this.links.length; i++) {
            if (this.links[1].href == document.URL || document.URL.includes(`${bcodingData.root_url}/members`)) {
                this.links[1].classList.add('active')
            }
            if (this.links[1].href == document.URL || document.URL.includes(`${bcodingData.root_url}/members`)) {
                this.subLinks[0].classList.add('active')
            }
            if (this.links[3].href == document.URL || document.URL.includes(`${bcodingData.root_url}/events`)) {
                this.links[3].classList.add('current-menu-item')
            }
            if (this.links[1].href == document.URL || document.URL.includes(`/group`) || document.URL.includes(`/groups`)) {
                this.links[1].classList.add('active')
            }
            if (this.links[1].href == document.URL || document.URL.includes(`/group`) || document.URL.includes(`/groups`)) {
                this.subLinks[1].classList.add('active')
            }
            if (this.links[i].href == document.URL || document.URL.includes(`/student`) || document.URL.includes(`/professor`)) {
                this.links[4].classList.add('active')
            }
        }
    }
}

export default HighlightLink