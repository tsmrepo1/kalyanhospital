(function (document) {
    'use strict';

    function check() {
        if (document.querySelector('link[rel=stylesheet][media=print][onload]')) {
            setTimeout(check, 100);
        } else {
            document.dispatchEvent(new Event('resize', {bubbles: true, cancelable: false}));
        }
    }

    setTimeout(check, 100);
}(document));
