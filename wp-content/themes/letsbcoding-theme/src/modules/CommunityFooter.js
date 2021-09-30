class CommunityFooter {
  constructor() {
    this.footerNavLinks = document.querySelectorAll(
      ".footer-menu-link"
    );
      console.log(this.footerNavLinks[0])
      this.footerHandler()
  }
    
    footerHandler() {
        for (let i = 0; i < this.footerNavLinks.length; i++) {
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/about-us`)) {
                this.footerNavLinks[0].classList.add('no-footer-link')
                this.footerNavLinks[3].classList.add('no-footer-link')
                this.footerNavLinks[4].classList.add('no-footer-link')
                this.footerNavLinks[5].classList.add('no-footer-link')
                this.footerNavLinks[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/programs`)) {
                this.footerNavLinks[0].classList.add('no-footer-link')
                this.footerNavLinks[3].classList.add('no-footer-link')
                this.footerNavLinks[4].classList.add('no-footer-link')
                this.footerNavLinks[5].classList.add('no-footer-link')
                this.footerNavLinks[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/events`)) {
                this.footerNavLinks[0].classList.add('no-footer-link')
                this.footerNavLinks[3].classList.add('no-footer-link')
                this.footerNavLinks[4].classList.add('no-footer-link')
                this.footerNavLinks[5].classList.add('no-footer-link')
                this.footerNavLinks[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/campuses`)) {
                this.footerNavLinks[0].classList.add('no-footer-link')
                this.footerNavLinks[3].classList.add('no-footer-link')
                this.footerNavLinks[4].classList.add('no-footer-link')
                this.footerNavLinks[5].classList.add('no-footer-link')
                this.footerNavLinks[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/student`)) {
                this.footerNavLinks[0].classList.add('no-footer-link')
                this.footerNavLinks[3].classList.add('no-footer-link')
                this.footerNavLinks[4].classList.add('no-footer-link')
                this.footerNavLinks[5].classList.add('no-footer-link')
                this.footerNavLinks[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/professor`)) {
                this.footerNavLinks[0].classList.add('no-footer-link')
                this.footerNavLinks[3].classList.add('no-footer-link')
                this.footerNavLinks[4].classList.add('no-footer-link')
                this.footerNavLinks[5].classList.add('no-footer-link')
                this.footerNavLinks[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/blog`)) {
                this.footerNavLinks[0].classList.add('no-footer-link')
                this.footerNavLinks[3].classList.add('no-footer-link')
                this.footerNavLinks[4].classList.add('no-footer-link')
                this.footerNavLinks[5].classList.add('no-footer-link')
                this.footerNavLinks[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/20`)) {
                this.footerNavLinks[0].classList.add('no-footer-link')
                this.footerNavLinks[3].classList.add('no-footer-link')
                this.footerNavLinks[4].classList.add('no-footer-link')
                this.footerNavLinks[5].classList.add('no-footer-link')
                this.footerNavLinks[6].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/members`)) {
                this.footerNavLinks[1].classList.add('no-footer-link')
                this.footerNavLinks[2].classList.add('no-footer-link')
            }
            if (this.footerNavLinks[0] == document.URL || document.URL.includes(`${bcodingData.root_url}/groups`)) {
                this.footerNavLinks[1].classList.add('no-footer-link')
                this.footerNavLinks[2].classList.add('no-footer-link')
            }
        }
    }
}

export default CommunityFooter;
