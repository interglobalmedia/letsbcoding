import axios from 'axios'
class MyNotes {
    constructor() {
        this.myNotes = document.querySelector('#my-notes')
        this.submitNote = document.querySelector('.submit-note')
        this.noteValues = {}
        if (this.myNotes) {
            axios.defaults.headers.common['X-WP-Nonce'] = bcodingData.nonce
            this.myNotes = document.querySelector('#my-notes')
            this.events()
        }
    }
    events() {
        this.myNotes.addEventListener("click", e => this.clickHandler(e))
        this.submitNote.addEventListener("click", () => this.createNote())
    }

    clickHandler(e) {
        if (e.target.classList.contains('delete-note') || e.target.classList.contains('fa-trash-o')) this.deleteNote(e)
        if (e.target.classList.contains('edit-note') || e.target.classList.contains('fa-pencil') || e.target.classList.contains('fa-times')) this.editNote(e)
        if (e.target.classList.contains('update-note') || e.target.classList.contains('fa-arrow-right')) this.updateNote(e)
    }

    // custom methods
    async deleteNote(e) {
        const note = e.target.closest('li');
        try {
            // const noteId = e.target.parentNode.dataset.noteId
            const url = `${bcodingData.root_url}/wp-json/wp/v2/note/${note.dataset.noteId}`
            const response = await axios.delete(url)
            this.fadeOut(note)
            setTimeout(() => {
                 note.remove()
            }, 401)
            if (response.data.userNoteCount < 5) {
                document.querySelector('.note-limit-message').classList.remove('active')
            }
        } catch (err) {
            console.log(err)
        }
    }

    //This is placeholder for jQuery slideUp
	fadeOut(el) {
		el.classList.add('fade-out')
	}

    editNote(e) {
        const note = e.target.closest('li')
        if (note.getAttribute('data-status') === 'editable') {
            this.makeReadOnly(note)
        } else {
            this.makeEditable(note)
        }
    }

    makeEditable(note) {
        note.querySelector('.edit-note').innerHTML = `<i class="fa fa-times" aria-hidden="true"></i> Cancel`
        note.querySelector('.note-title-field').removeAttribute('readonly')
        note.querySelector('.note-body-field').removeAttribute('readonly')
        note.querySelector('.note-title-field').classList.add('note-active-field')
        note.querySelector('.note-body-field').classList.add('note-active-field')
        note.querySelector('.update-note').classList.add('update-note--visible')
        note.setAttribute('data-status', 'editable')
    }

    makeReadOnly(note) {
       note.querySelector('.edit-note').innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i> Edit`
        note.querySelector('.note-title-field').setAttribute('readonly', 'true')
        note.querySelector('.note-body-field').setAttribute('readonly', 'true')
        note.querySelector('.note-title-field').classList.remove('note-active-field')
        note.querySelector('.note-body-field').classList.remove('note-active-field')
        note.querySelector('.update-note').classList.remove('update-note--visible')
        note.setAttribute('data-status', 'cancel')
    }

    async updateNote(e) {
        const note = e.target.closest('li')
        //saves new values for current note
        const title = note.querySelector('.note-title-field').value
        const body = note.querySelector('textarea').value
        this.noteValues[note.dataset.noteId] = {
            title: title,
            content: body
        };
        try {
            const url = `${bcodingData.root_url}/wp-json/wp/v2/note/${note.dataset.noteId}`
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    "X-WP-Nonce": bcodingData.nonce,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(this.noteValues[note.dataset.noteId])
            })
            this.makeReadOnly(note)
            console.log(response)
            return response
        } catch (err) {
            console.log(err)
        }
    }

    async createNote() {
        let newNote = {
            "title": document.querySelector('.new-note-title').value,
            "content": document.querySelector('.new-note-body').value,
            "status": "publish"
        }
        const limitMessage = document.querySelector('.note-limit-message')
        try {
            const response = await axios.post(`${bcodingData.root_url}/wp-json/wp/v2/note/`, newNote)
            console.log(response.data)
            if (response.data !== 'You have reached your note limit!') {
                document.querySelector('.new-note-title').value = ``
                document.querySelector('.new-note-body').value = ``
                document.querySelector('#my-notes').insertAdjacentHTML("afterbegin",
                `<li data-note-id="${response.data.id}" class="fade-in-calc">
                    <textarea readonly class="note-title-field" value="${response.data.title.raw}"></textarea>
                    <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
                    <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
                    <textarea readonly class="note-body-field">${response.data.content.raw}</textarea>
                    <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right" aria-hidden="true"></i> Update</span>
                </li>`)
                // notice in the above HTML for the new <li> I gave it a class of fade-in-calc which will make it invisible temporarily so we can count its natural height

                let finalHeight // browser needs a specific height to transition to, you can't transition to 'auto' height
                let newlyCreated = document.querySelector('#my-notes li')

                // give the browser 30 milliseconds to have the invisible element added to the DOM before moving on
                setTimeout(function () {
                finalHeight = `${newlyCreated.offsetHeight}px`
                newlyCreated.style.height = '0px'
                }, 30)

                // give the browser another 20 milliseconds to count the height of the invisible element before moving on
                setTimeout(function () {
                newlyCreated.classList.remove('fade-in-calc')
                newlyCreated.style.height = finalHeight
                }, 50)

                // wait the duration of the CSS transition before removing the hardcoded calculated height from the element so that our design is responsive once again
                setTimeout(function () {
                newlyCreated.style.removeProperty('height')
                }, 450)
            } else {
                limitMessage.classList.add('active')
                document.querySelector('.new-note-title').value = ``
                document.querySelector('.new-note-body').value = ``
            }
        } catch (e) {
            console.error(e)
        }
    }
}

export default MyNotes