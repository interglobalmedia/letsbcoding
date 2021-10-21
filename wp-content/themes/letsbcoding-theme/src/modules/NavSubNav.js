class NavSubNav {
    constructor() {
        this.parentCommunityNavLink = document.querySelector('div .nav-highlight-community')
        this.parentCurriculumNavLink = document.querySelector('div .nav-highlight-curriculum')
        this.childCommunityNavUl = document.querySelector('ul.sub-nav-community')
        this.childCurriculumNavUl = document.querySelector('ul.sub-nav-curriculum')
        this.events()
    }

    events() {
        this.parentCommunityNavLink.addEventListener('click', (e) => this.communitySubNavHandler(e))
        this.parentCurriculumNavLink.addEventListener('click', (e) => this.curriculumSubNavHandler(e))
    }
    
    communitySubNavHandler(e) {
        e.preventDefault()
        this.childCommunityNavUl.classList.toggle('subnav-show')
    }
    curriculumSubNavHandler(e) {
        e.preventDefault()
        this.childCurriculumNavUl.classList.toggle('subnav-show')
    }
}

export default NavSubNav