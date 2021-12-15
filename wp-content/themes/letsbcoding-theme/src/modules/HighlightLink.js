class HighlightLink {
    constructor() {
        this.links = document.querySelectorAll('.menu-link')
        this.subCommunityLinks = document.querySelectorAll('ul.sub-nav-community li a')
        this.subCurriculumLinks = document.querySelectorAll('ul.sub-nav-curriculum li a')
        this.SubCurriculumLis = document.querySelectorAll('ul.sub-nav-curriculum li')
        this.curriculumLink = document.querySelector('.menu-link.nav-highlight-curriculum')
        this.logoText = document.querySelector('.site-header h1 a')
        this.communityLinkHandler()
        this.curriculumLinkHandler()
        this.mainNavLinkHandler()
    }

    communityLinkHandler() {
        for (let i = 0; i < this.links.length; i++) {
            if (this.links[1].href == document.URL || document.URL.includes(`${bcodingData.root_url}/members`)) {
                this.links[1].classList.add('active')
                this.subCommunityLinks[0].classList.add('active')
            }
            if (this.links[1].href == document.URL || document.URL.includes(`/group`) || document.URL.includes(`/groups`)) {
                this.links[1].classList.add('active')
                this.subCommunityLinks[1].classList.add('active')
            }
        }
    }

    curriculumLinkHandler() {
        for (let i = 0; i < this.links.length; i++) {
            if (this.links[i].href == document.URL || document.URL.includes(`/program`) || document.URL.includes(`/course`) || document.URL.includes(`/student`) || document.URL.includes(`/professor`)) {
                this.curriculumLink.classList.add('active')
            }
        }
    }
    mainNavLinkHandler() {
        if (this.logoText.href == document.URL) {
            this.logoText.classList.add('active')
        }
        if (this.links[3].href == document.URL || document.URL.includes((`/event`))) {
            this.curriculumLink.classList.remove('active')
        }
    }
}

export default HighlightLink