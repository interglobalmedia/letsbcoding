class MyNotes {
    constructor() {
        this.deleteBtns = document.querySelectorAll('.delete-note')
        this.editBtns = document.querySelectorAll('.edit-note')
        this.updateBtns = document.querySelectorAll('.update-note')
        this.noteValues = {}
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
}

export default MyNotes