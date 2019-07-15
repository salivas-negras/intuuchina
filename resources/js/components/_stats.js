


let stats = {
    init: () => {
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    }
}

if (document.querySelector('.sensationalism-stats') !== null) {
    stats.init();
}

