import axios from 'axios'

class Like {
    constructor() {
        this.likeBox = document.querySelector('.like-box')
        if (this.likeBox) {
            axios.defaults.headers.common["X-WP-Nonce"] = bcodingData.nonce
        }
        this.events()
    }

    events() {
        this.likeBox.addEventListener('click', (e) => this.clickDispatcher(e))
    }

    // methods
    clickDispatcher(e) {
        const currentLikeBox = e.target.closest('.like-box')
        if (currentLikeBox.getAttribute('data-exists') !== 'yes') {
            this.createLike()
        } else {
            this.deleteLike()
            
        }
    }

    async createLike() {
        const url = `${bcodingData.root_url}/wp-json/bcoding/v1/manageLike`
        try {
            const response = await axios.post(url)
            console.log(response.data)
        } catch (e) {
            console.error(e)
        }
    }

    async deleteLike() {
        try {
            const url = `${bcodingData.root_url}/wp-json/bcoding/v1/manageLike`
            const response = await axios.delete(url)
            console.log(response.data)
        } catch (err) {
            console.log(err)
        }
    }
}

export default Like