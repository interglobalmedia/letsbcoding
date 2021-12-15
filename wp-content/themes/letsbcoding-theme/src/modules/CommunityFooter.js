class CommunityFooter {
  constructor() {
    this.footerNavLinksExplore = document.querySelectorAll(
      ".footer-menu-link"
    )
    this.footerNavLinksLearn = document.querySelectorAll(".footer-menu-link-learn")
    this.footerHandlerExplore()
    this.footerHandlerLearn()
  }
    
    footerHandlerExplore() {
        for (let i = 0; i < this.footerNavLinksExplore.length; i++) {
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/about-us`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinksExplore[7].classList.add('no-footer-link')
                this.footerNavLinksExplore[8].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/programs`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinksExplore[7].classList.add('no-footer-link')
                this.footerNavLinksExplore[8].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/courses`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinksExplore[7].classList.add('no-footer-link')
                this.footerNavLinksExplore[8].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/events`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinksExplore[7].classList.add('no-footer-link')
                this.footerNavLinksExplore[8].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/campuses`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinksExplore[7].classList.add('no-footer-link')
                this.footerNavLinksExplore[8].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/student`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinksExplore[7].classList.add('no-footer-link')
                this.footerNavLinksExplore[8].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/professor`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinksExplore[7].classList.add('no-footer-link')
                this.footerNavLinksExplore[8].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/blog`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinks[7].classList.add('no-footer-link')
                this.footerNavLinks[8].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/20`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/members`)) {
                this.footerNavLinksExplore[1].classList.add('no-footer-link')
                this.footerNavLinksExplore[2].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/groups`)) {
                this.footerNavLinksExplore[1].classList.add('no-footer-link')
                this.footerNavLinksExplore[2].classList.add('no-footer-link')
            }
            if (this.footerNavLinksExplore[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/sitemap`)) {
                this.footerNavLinksExplore[0].classList.add('no-footer-link')
                this.footerNavLinksExplore[3].classList.add('no-footer-link')
                this.footerNavLinksExplore[4].classList.add('no-footer-link')
                this.footerNavLinksExplore[5].classList.add('no-footer-link')
                this.footerNavLinksExplore[6].classList.add('no-footer-link')
                this.footerNavLinksExplore[7].classList.add('no-footer-link')
                this.footerNavLinksExplore[8].classList.add('no-footer-link')
            }
        }
    }
    footerHandlerLearn() {
        for (let i = 0; i < this.footerNavLinksLearn.length; i++) {
            if (this.footerNavLinksLearn[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/sitemap`)) {
                this.footerNavLinksLearn[0].classList.add('no-footer-link')
            }
        }
    }
}

export default CommunityFooter;
