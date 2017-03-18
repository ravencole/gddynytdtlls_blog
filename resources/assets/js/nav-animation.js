function NavAnimation() {
    const NAV = document.querySelector('.navbar-fixed-top')

    let lastScrollPosition = 0

    const animationCallback = e => {
        if (window.scrollY < lastScrollPosition) {
            NAV.style.top = 0
        } else {
            NAV.style.top = '-30%'
        }
        lastScrollPosition = window.scrollY
    }

    const addAnimation = _ => {
        window.addEventListener('scroll', animationCallback)
    }

    const destroyAnimation = _ => {
        window.removeEventListener('scroll', animationCallback)
        NAV.style.top = 0
    }

    return {
        init() {
            if (window.innerWidth < 767) {
                addAnimation()
            }
        },
        reload() {
            if (window.innerWidth < 767) {
                addAnimation()
            } else {
                destroyAnimation()
            }
        }
    }
}

const NAV = NavAnimation();

NAV.init()

window.addEventListener('resize', _ => {
    NAV.reload()
})