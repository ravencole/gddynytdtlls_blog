document.getElementById('tagSearch')
    .addEventListener('keydown', e => {
        if (e.keyCode === 13) {
            window.location = `/tag/${e.target.value}`
        }
    })