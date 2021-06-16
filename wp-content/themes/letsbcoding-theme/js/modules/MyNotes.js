class MyNotes {
    constructor() {
        this.deleteNotes = document.querySelectorAll('.delete-note')
        this.events()
    }
    events() {
        this.deleteNotes.forEach((note) => {
            note.addEventListener('click', (e) => this.deleteNote(e))
        })
    }

    // custom methods
    async deleteNote(e) {
        try {
            console.log(e.target)
            const url = `${bcodingData.root_url}/wp-json/wp/v2/note/270`
            const deleteResponse = await fetch(url, {
                method: "DELETE",
                    headers: {
                        "X-WP-Nonce": bcodingData.nonce,
                    },
            })
            return deleteResponse.json();
        } catch (err) {
            console.log(err);
        }
    }
}

export default MyNotes