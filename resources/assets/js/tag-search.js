document.getElementById('tagSearch')
    .addEventListener('keydown',e=>e.keyCode===13&&(window.location=`/tag/${e.target.value}`))