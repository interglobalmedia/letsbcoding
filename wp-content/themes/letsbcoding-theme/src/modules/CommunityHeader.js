class CommunityHeader {
    constructor() {
        this.mainNavigationLinks = document.querySelectorAll('a.menu-link')
        this.communityLinks = document.querySelectorAll('div.menu-link')
        this.curriculumLinks = document.querySelector('div.nav-highlight-curriculum')
        this.communityHandler()
    }

    communityHandler() {
        for (let i = 0; i < this.mainNavigationLinks.length; i++) {
            if (this.communityLinks[0].href == document.URL || document.URL.includes(`${bcodingData.root_url}/members`)) {
                this.mainNavigationLinks[0].classList.add('no-nav-link')
                this.mainNavigationLinks[3].classList.add('no-nav-link')
                this.mainNavigationLinks[4].classList.add('no-nav-link')
                this.mainNavigationLinks[5].classList.add('no-nav-link')
                this.mainNavigationLinks[6].classList.add('no-nav-link')
                this.mainNavigationLinks[7].classList.add('no-nav-link')
                this.mainNavigationLinks[8].classList.add('no-nav-link')
                this.mainNavigationLinks[9].classList.add('no-nav-link')
                this.curriculumLinks.classList.add('no-nav-link')
            }
            if (this.communityLinks[0].href == document.URL || document.URL.includes(`${bcodingData.root_url}/groups`)) {
                this.mainNavigationLinks[0].classList.add('no-nav-link')
                this.mainNavigationLinks[3].classList.add('no-nav-link')
                this.mainNavigationLinks[4].classList.add('no-nav-link')
                this.mainNavigationLinks[5].classList.add('no-nav-link')
                this.mainNavigationLinks[6].classList.add('no-nav-link')
                this.mainNavigationLinks[7].classList.add('no-nav-link')
                this.mainNavigationLinks[8].classList.add('no-nav-link')
                this.mainNavigationLinks[9].classList.add('no-nav-link')
                this.curriculumLinks.classList.add('no-nav-link')
            }
        }
    }
}

export default CommunityHeader