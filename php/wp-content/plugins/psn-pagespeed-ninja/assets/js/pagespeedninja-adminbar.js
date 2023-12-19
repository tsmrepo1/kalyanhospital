/* PageSpeed Ninja 1.0.beta.1.pro | pagespeed.ninja/license.html */
(function () {
    'use strict';

    jQuery(document).ready(function () {
        jQuery('#wp-admin-bar-pagespeed-ninja-purge-pagecache a').on('click', function (e) {
            e.preventDefault();
            jQuery.post(ajaxurl, {action: 'pagespeedninja_clear_pagecache_all'});
            jQuery('#wp-admin-bar-pagespeed-ninja').removeClass('hover');
        });

        jQuery('#wp-admin-bar-pagespeed-ninja-update-atfcss a').on('click', function (e) {
            e.preventDefault();
            jQuery.post(ajaxurl, {action: 'pagespeedninja_update_atfcss'});
            jQuery('#wp-admin-bar-pagespeed-ninja').removeClass('hover');
        });
    });
})();
