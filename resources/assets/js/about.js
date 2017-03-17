Array.prototype.slice.call(document.querySelectorAll(`#about--main a`))
    .map(elm => {
        elm.setAttribute('target', '_blank')
        elm.setAttribute(
            'href', 
            `https://www.google.com/#q=` +
            elm.innerText.split(' ').join('+') +
            `&*`
        )
    })

Array.prototype.slice.call(document.querySelectorAll(`[data-id="about--skills"] a`))
    .map(elm => {
        elm.setAttribute(
            'href',
            `/tag/` + elm.innerHTML.toLowerCase()
        )
    })
