import axios from 'axios'

class Like {
    constructor() {
    this.likeBox = document.querySelector('.like-box')
        if (this.likeBox) {
            axios.defaults.headers.common["X-WP-Nonce"] = bcodingData.nonce
            this.events()
        }
    }

    events() {
        this.likeBox.addEventListener('click', (e) => this.clickDispatcher(e))
    }

    // methods
    clickDispatcher(e) {
        let currentLikeBox = e.target.closest('.like-box')
        if (currentLikeBox.getAttribute('data-exists') === 'no') {
            this.createLike(currentLikeBox)
        } else {
            this.deleteLike(currentLikeBox)
        }
    }

    async createLike(currentLikeBox) {
        try {
            const url = `${bcodingData.root_url}/wp-json/bcoding/v1/manageLike`
            const response = await axios.post(url, {
                professorId: currentLikeBox.getAttribute('data-professor')
            })
            if (response.data !== 'Only logged in users can create a like!') {
                currentLikeBox.setAttribute('data-exists', 'yes')
                let likeCount = parseInt(currentLikeBox.querySelector('.like-count').innerHTML, 10)
                likeCount++
                currentLikeBox.querySelector('.like-count').innerHTML = likeCount
                currentLikeBox.setAttribute('data-like', response.data)
                console.log(response.data)
            }
        } catch (e) {
            console.log('Sorry!')
        }
    }

    async deleteLike(currentLikeBox) {
        try {
            const url = `${bcodingData.root_url}/wp-json/bcoding/v1/manageLike`    
            const response = await axios({
                url: url, 
                method: 'delete',
                data: { 'like': currentLikeBox.getAttribute('data-like') },
            })
            currentLikeBox.setAttribute('data-exists', 'no')
            let likeCount = parseInt(currentLikeBox.querySelector('.like-count').innerHTML, 10)
            likeCount--
            currentLikeBox.querySelector('.like-count').innerHTML = likeCount
            currentLikeBox.setAttribute('data-like', '')
            console.log(response.data)
        } catch (err) {
            console.log(err)
        }
    }
}

export default Like