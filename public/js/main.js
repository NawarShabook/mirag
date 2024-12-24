/* start button to top*/

(function() {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }



    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
            let header = select('#header')
            let offset = header.offsetHeight

            let elementPos = select(el).offsetTop
            window.scrollTo({
                top: elementPos - offset,
                behavior: 'smooth'
            })
        }
        /**
         * Preloader
         */
    let preloader = select('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.remove()
        });
    }


    /**
     *Start Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('actived')
            } else {
                backtotop.classList.remove('actived')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }
/* End button to top*/

// Strat Callwhatsapp
    let callwhatsapp = select('.call-whatsapp')
    if (callwhatsapp) {
        const toggleCallwhatsap = () => {
            if (window.scrollY > 100) {
                callwhatsapp.classList.add('actived')
            } else {
                callwhatsapp.classList.remove('actived')
            }
        }
        window.addEventListener('load', toggleCallwhatsap)
        onscroll(document, toggleCallwhatsap)
    }
// End Callwhatsapp

})();
