import axios from "axios"
class MyNotes {
    constructor() {
        this.deleteBtns = document.querySelectorAll('.delete-note')
        this.editBtns = document.querySelectorAll('.edit-note')
        this.updateBtns = document.querySelectorAll('.update-note')
        this.noteValues = {}
        this.submitNote = document.querySelector('.submit-note')
        if (this.submitNote) {
            axios.defaults.headers.common["X-WP-Nonce"] = bcodingData.nonce
            this.submitNote = document.querySelector('.submit-note')
        }
        this.events()
    }
    events() {
        this.deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', (e) => this.deleteNote(e))
        })
        this.editBtns.forEach((editBtn) => {
            editBtn.addEventListener('click', (e) => this.editNote(e))
        })
        this.updateBtns.forEach((updateBtn) => {
            updateBtn.addEventListener('click', (e) => this.updateNote(e))
        })
        this.submitNote.addEventListener("click", () => {
            this.createNote()
        })
    }

    // custom methods
    async deleteNote(e) {
        const note = e.target.closest('li');
        try {
            // const noteId = e.target.parentNode.dataset.noteId
            const url = `${bcodingData.root_url}/wp-json/wp/v2/note/${note.dataset.noteId}`
            const deleteResponse = await fetch(url, {
                method: "DELETE",
                headers: {
                    "X-WP-Nonce": bcodingData.nonce,
                },
            })
            this.fadeOut(note)
            return deleteResponse.json()
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
        if (note.dataset.status === 'editable') {
            this.makeReadOnly(note)
        } else {
            this.makeEditable(note)
        }
    }

    makeEditable(target) {
        //changes note status to editable
        target.dataset.status = 'editable'
        const inputs = target.querySelectorAll('input, textarea')
        // make inputs editable
        inputs.forEach(input => {
            input.readOnly = false
            input.classList.add('note-active-field')
        })
        //saves old values for current note
        const title = target.querySelector('input').value;
        const body = target.querySelector('textarea').value;
        this.noteValues[target.dataset.noteId] = {
            title: title,
            content: body
        }
        //transform edit button
        target.querySelector('.update-note').classList.add('update-note--visible')
        target.querySelector('.edit-note').innerHTML = '<i class="fa fa-times" aria-hidden="true">Cancel</i>'
    }

    makeReadOnly(target) {
        //changes note status to not editable
        target.dataset.status = false

        // make inputs readonly
        const inputs = target.querySelectorAll('input, textarea')
        inputs.forEach(input => {
            input.readOnly = true
            input.classList.remove('note-active-field')
        })
        //Restore old values for current note
        target.querySelector('input').value = this.noteValues[target.dataset.noteId].title
        target.querySelector('textarea').value = this.noteValues[target.dataset.noteId].content
        //transform cancel button
        target.querySelector('.update-note').classList.remove('update-note--visible')
        target.querySelector('.edit-note').innerHTML = '<i class="fa fa-pencil" aria-hidden="true">Edit</i>'
    }

    async updateNote(e) {
        const note = e.target.closest('li');
        //saves new values for current note
        const title = note.querySelector('input').value
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
        } catch (err) {
            console.log(err)
        }
    }

    async createNote() {
        let newNote = {
            "title": document.querySelector(".new-note-title").value,
            "content": document.querySelector(".new-note-body").value,
            "status": "private"
        }
        try {
            const response = await axios.post(`${bcodingData.root_url}/wp-json/wp/v2/note/`, newNote)
            console.log(response.data)
            if (response.data !== "You have reached your note limit.") {
                console.log(`note created!`)
                document.querySelector(".new-note-title").value = ``
                document.querySelector(".new-note-body").value = ``
                document.querySelector('#my-notes').insertAdjacentHTML("afterbegin",
                `<li data-note-id="${response.data.id}" class="fade-in-calc">
                    <input readonly class="note-title-field" value="${response.data.title.raw}">
                    <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
                    <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
                    <textarea readonly class="note-body-field">${response.data.content.raw}</textarea>
                    <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right" aria-hidden="true"></i> Save</span>
                </li>`)
                // notice in the above HTML for the new <li> I gave it a class of fade-in-calc which will make it invisible temporarily so we can count its natural height

                let finalHeight // browser needs a specific height to transition to, you can't transition to 'auto' height
                let newlyCreated = document.querySelector("#my-notes li")

                // give the browser 30 milliseconds to have the invisible element added to the DOM before moving on
                setTimeout(function () {
                finalHeight = `${newlyCreated.offsetHeight}px`
                newlyCreated.style.height = "0px"
                }, 30)

                // give the browser another 20 milliseconds to count the height of the invisible element before moving on
                setTimeout(function () {
                newlyCreated.classList.remove("fade-in-calc")
                newlyCreated.style.height = finalHeight
                }, 50)

                // wait the duration of the CSS transition before removing the hardcoded calculated height from the element so that our design is responsive once again
                setTimeout(function () {
                newlyCreated.style.removeProperty("height")
                }, 450)

            } else {
                document.querySelector(".note-limit-message").classList.add("active")
            }
        } catch (err) {
            console.log(err)
        }
    }
}

export default MyNotes