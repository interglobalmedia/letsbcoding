class Like {
    constructor() {
        this.likeBox = document.querySelector('.like-box')
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

    createLike() {
        alert('I just created a like')
    }

    deleteLike() {
        alert('I just deleted a like')
    }
}

export default Like