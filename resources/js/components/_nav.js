import MediaQueries from '../main/breakpoints';
import DOM from '../main/dom.js';

let nav = {
    init: () => {
        nav.setup();
    },
    setup: () => {
        /*
         * Loads the login modal when there is some error coming
         * from the form inside.
         */
        window.addEventListener('load', function() {
            if (nav.hasErrorsMessages(nav.modalForm)) {
                nav.showModal();
            };
        });

        for (let i=0; i < nav.navbar.querySelectorAll('.dropdown').length; i++) {
            let dropdown = nav.navbar.querySelectorAll('.dropdown')[i];
            dropdown.addEventListener('mouseover', (e) => {
                if (MediaQueries.isNavbarBreakpoint()) {
                    let targetId = dropdown.querySelector('.nav-item').getAttribute('data-target');
                    $(targetId).dropdown('show');
                }
            });

            dropdown.addEventListener('click', (e) => {
                /*if (!MediaQueries.isNavbarBreakpoint()) {
                    let targetId = dropdown.querySelector('.nav-item').getAttribute('data-target');
                    if ($(targetId.querySelector('ul')).hasClass('show')) {
                        console.log("hola");
                        $(targetId).dropdown('hide');
                    } else {
                        $(targetId).dropdown('show');
                    }
                }*/
            });

            dropdown.addEventListener('mouseout', function(e) {
                if (MediaQueries.isNavbarBreakpoint()) {
                    let targetId = dropdown.querySelector('.nav-item').getAttribute('data-target');
                    $(targetId).dropdown('hide');
                }
            });
        }

        for (let i=0; i < nav.accordionSubmenus.length; i++) {
            nav.accordionSubmenus[i].addEventListener('mouseover', nav.highlightItem, true);
            nav.accordionSubmenus[i].addEventListener('mouseout', nav.highlightItem, true);
        }
    },
    navbar: document.querySelector('.navbar') ? document.querySelector('.navbar') : null,
    modalForm: document.querySelector('.modal__form') !== null ?  document.querySelector('.modal__form') : null,
    accordionSubmenus:  document.querySelectorAll('.accordion_submenu') !== null ?  document.querySelectorAll('.accordion_submenu') : null,
    highlightItem: function(event) {
        if (!MediaQueries.isLargeDevice()) {
            let pattern = /\s?show\s?/;
            if (this.getAttribute('class').match(pattern)) {
                DOM.toggleSingleClass(this.parentElement, 'reverse-colours');
            }
        }
    },
    hasErrorsMessages: (parent) => {
        if ($(parent).find('.is-invalid').length > 0) {
            return true;
        }

        return false;
    },
    showModal: () => {
        $('#loginModal').modal();
    }
}

if (document.getElementsByTagName('nav') !== null) {
    nav.init();
}