import React from 'react'
import ReactDOM from 'react-dom'
import './frontend.scss'

const divsToUpdate = document.querySelectorAll('.paying-attention-update-me')

divsToUpdate.forEach(function (div) {
    ReactDOM.render(<FrontEndQuiz />, div)
    div.classList.remove('paying-attention-update-me')
})

function FrontEndQuiz() {
    return (
        <div className="paying-attention-frontend">
            Hello from React
        </div>
    )
}