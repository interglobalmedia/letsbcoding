import axios from 'axios'

class StudentLike {
    constructor() {
        this.studentLikeBox = document.querySelector('.student-like-box')
        if (this.studentLikeBox) {
            axios.defaults.headers.common["X-WP-Nonce"] = bcodingData.nonce
            this.events()
        }
    }

    events() {
        this.studentLikeBox.addEventListener('click', (e) => this.studentClickDispatcher(e))
        console.log(this.studentLikeBox)
    }

    // methods
    studentClickDispatcher(e) {
        let currentStudentLikeBox = e.target.closest('.student-like-box')
        if (currentStudentLikeBox.getAttribute('data-student-exists') === 'no') {
            this.createStudentLike(currentStudentLikeBox)
        } else {
            this.deleteStudentLike(currentStudentLikeBox)
        }
    }

    async createStudentLike(currentStudentLikeBox) {
        try {
            const url = `${bcodingData.root_url}/wp-json/bcoding/v1/manageStudentLike`
            const response = await axios.post(url, {
                studentId: currentStudentLikeBox.getAttribute('data-student')
            })
            if (response.data !== 'Only logged in users can create a like!') {
                currentStudentLikeBox.setAttribute('data-student-exists', 'yes')
                let studentLikeCount = parseInt(currentStudentLikeBox.querySelector('.student-like-count').innerHTML, 10)
                studentLikeCount++
                currentStudentLikeBox.querySelector('.student-like-count').innerHTML = studentLikeCount
                currentStudentLikeBox.setAttribute('data-student-like', response.data)
                console.log(response.data)
            }
        } catch (e) {
            console.log('Sorry!')
        }
    }

    async deleteStudentLike(currentStudentLikeBox) {
        try {
            const url = `${bcodingData.root_url}/wp-json/bcoding/v1/manageStudentLike`    
            const response = await axios({
                url: url, 
                method: 'DELETE',
                data: { 'studentlike': currentStudentLikeBox.getAttribute('data-student-like') },
            })
            currentStudentLikeBox.setAttribute('data-student-exists', 'no')
            let studentLikeCount = parseInt(currentStudentLikeBox.querySelector('.student-like-count').innerHTML, 10)
            studentLikeCount--
            currentStudentLikeBox.querySelector('.student-like-count').innerHTML = studentLikeCount
            currentStudentLikeBox.setAttribute('data-student-like', '')
            console.log(response.data)
        } catch (err) {
            console.log(err)
        }
    }
}

export default StudentLike