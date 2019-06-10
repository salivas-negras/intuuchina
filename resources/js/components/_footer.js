let footer = {
    init: function() {
        window.addEventListener('load', footer.setup);
    },
    form: document.querySelector('.footer_contact_form'),
    setup: () => {
        if (footer.hasErrorsMessages()) {
            footer.setViewport();
        }
    },
    hasErrorsMessages: function() {
        let errors = false;
        let fields = footer.form.querySelectorAll('.col-xs-10');
        for (let i = 0; i < fields.length && errors === false; i++) {
            if (fields[i].querySelector('.is-invalid') !== null) {
                errors = true;
            }
        }

        if (errors) {
            return true;
        }
        return false;
    },
    setViewport: () => {
        /*
         * Obtiene la diferencia de scroll entre la del usuario y la del formulario
         * del pie de página.
         */
        let scrollToForm = footer.form.offsetTop - window.scrollY;

        /*
         * Realiza el scroll hasta el formulario de pie de página.
         */
        window.scrollBy(0, scrollToForm);
    },
};

if (document.querySelector('.footer') !== null) {
    footer.init();
}