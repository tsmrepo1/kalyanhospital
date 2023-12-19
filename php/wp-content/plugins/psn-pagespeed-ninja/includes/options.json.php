[
  {
    "title": "<?php _e('General'); ?>",
    "items": [
      {
        "name": "email",
        "global": 1,
        "title": "<?php _e('Email'); ?>",
        "tooltip": "<?php _e('Your e-mail in order to keep in touch.'); ?>",
        "type": "text",
        "default": ""
      },
      {
        "name": "apikey",
        "global": 1,
        "title": "<?php _e('License Key'); ?>",
        "tooltip": "<?php _e('The License key is used for authentication on the pagespeed.ninja servers (to generate critical CSS styles, download updates, etc).'); ?>",
        "type": "apikey",
        "default": ""
      },
      {
        "global": 1,
        "title": "<?php _e('Subscription'); ?>",
        "tooltip": "<?php _e('Status of your subscription.'); ?>",
        "type": "do_subscription"
      },
      {
        "title": "<?php _e('Backup'); ?>",
        "tooltip": "<?php _e('You can back up your PageSpeed Ninja settings.'); ?>",
        "type": "do_backup",
        "pro": 1
      },
      {
        "title": "<?php _e('Restore'); ?>",
        "tooltip": "<?php _e('You can restore your PageSpeed Ninja settings.'); ?>",
        "type": "do_restore",
        "pro": 1
      },
      {
        "name": "subsection_general",
        "title": "<?php _e('General'); ?>",
        "tooltip": "",
        "type": "subsection"
      },
      {
        "name": "enablelogged",
        "title": "<?php _e('Enable for Logged Users'); ?>",
        "tooltip": "<?php _e('It\'s possible to enable optimization of pages for logged users too. Note that in this case page cache is disabled and other optimizations (HTML, styles, scripts, images) are enabled.'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "htmloptimizer",
        "title": "<?php _e('HTML Parser'); ?>",
        "tooltip": "<?php _e('Choose between performance and optimal HTML code: Switch to a new libxml HTML parser or fast page optimizer with full JavaScript, CSS, and images optimization, but with limited subset of HTML optimizations (only supporting the removal of HTML comments and IE conditional comments).'); ?>",
        "type": "select",
        "values": [
          {
            "dom": "<?php _e('Use DOM HTML parser'); ?>"
          },
          {
            "stream": "<?php _e('Use Fast simple HTML parser'); ?>"
          },
          {
            "streamfull": "<?php _e('Use Advanced simple HTML parser'); ?>"
          },
          {
            "pharse": "<?php _e('Use Standard full HTML parser'); ?>"
          }
        ],
        "class": "streamoptimizer",
        "default": "dom",
        "presets": {
          "safe": "stream"
        }
      },
      {
        "name": "distribmode",
        "global": 1,
        "title": "<?php _e('Distribute Method'); ?>",
        "tooltip": "<?php _e('Distribution method of the compressed JS and CSS files to the client device. Different methods perform better on different server setup: \'Direct\' method distributes them in the default method of the webserver (like any other files), but note that gzip compression and caching may be disabled (i.e. those are controlled by the webserver and PSN is not able to affect the settings nor to check is they are currently enabled or not.) \'Apache mod_rewrite + mod_headers\' is the fastest method, but requires Apache with both mod_rewrite and mod_headers modules enabled. \'Apache mod_rewrite\' and \'PHP\' are identical from the performance point of view; the only difference is that \'Apache mod_rewrite\' requires Apache webserver, while \'PHP\' generates not-so-beautiful URLs like /s/get.php?abcdef.js instead of just /s/abcdef.js.'); ?>",
        "type": "select",
        "values": [
          {
            "direct": "<?php _e('Direct'); ?>"
          },
          {
            "apache": "<?php _e('Apache mod_rewrite+mod_headers'); ?>"
          },
          {
            "rewrite": "<?php _e('Apache mod_rewrite'); ?>"
          },
          {
            "php": "<?php _e('PHP'); ?>"
          }
        ],
        "default": "direct"
      },
      {
        "name": "staticdir",
        "title": "<?php _e('Optimized Files Directory'); ?>",
        "tooltip": "<?php _e('Directory path for the stored combined JS and CSS files (relative to WordPress installation directory).'); ?>",
        "type": "text",
        "default": "/s"
      },
      {
        "name": "footer",
        "title": "<?php _e('Support Badge'); ?>",
        "tooltip": "<?php _e('Displays a small text link to the PageSpeed Ninja website in the footer (\'Optimized with PageSpeed Ninja\'). A BIG thank you if you use this! :).'); ?>",
        "type": "checkbox",
        "default": 1
      },
      {
        "name": "allow_ext_stats",
        "title": "<?php _e('Send Anonymous Statistics'); ?>",
        "tooltip": "<?php _e('Send anonymous usage data to PageSpeed Ninja to help us further optimize the plugin for best performance.'); ?>",
        "type": "checkbox",
        "default": 1
      },
      {
        "name": "dailyrun_time",
        "title": "<?php _e('Daily Run Time'); ?>",
        "tooltip": "<?php _e('The time to daily run scheduled maintenance tasks.'); ?>",
        "type": "time",
        "default": "00:00",
        "pro": 1
      },
      {
        "name": "exec_mode",
        "title": "<?php _e('Execute Commands'); ?>",
        "tooltip": "<?php _e('The method to run CLI tools.'); ?>",
        "type": "select",
        "values": [
          {
            "exec": "<?php _e('exec'); ?>"
          },
          {
            "popen": "<?php _e('popen'); ?>"
          },
          {
            "procopen": "<?php _e('proc_open'); ?>"
          }
        ],
        "default": "exec",
        "pro": 1
      },
      {
        "name": "subsection_operation",
        "title": "<?php _e('Operation'); ?>",
        "tooltip": "<?php _e('Settings related to optimization mode.'); ?>",
        "type": "subsection"
      },
      {
        "name": "ress_async",
        "global": 1,
        "title": "<?php _e('Operation'); ?>",
        "tooltip": "<?php _e('The type of server-side page optimization: Sync (in-request optimization), AJAX (browser-triggered off-request optimization), and Cron (cron-triggered off-request optimization). Off-request optimization generates page as fast as possible, schedules some heavy optimization tasks, and runs them later.'); ?>",
        "type": "select",
        "values": [
          {
            "sync": "<?php _e('Sync'); ?>"
          },
          {
            "ajax": "<?php _e('AJAX'); ?>"
          },
          {
            "cron": "<?php _e('Cron'); ?>"
          }
        ],
        "default": "sync",
        "pro": 1
      },
      {
        "name": "ress_async_max",
        "global": 1,
        "title": "<?php _e('Threads'); ?>",
        "tooltip": "<?php _e('Maximal number of optimizing threads.'); ?>",
        "type": "number",
        "default": 1,
        "pro": 1
      },
      {
        "name": "ress_async_maxtime",
        "global": 1,
        "title": "<?php _e('Execution Time'); ?>",
        "tooltip": "<?php _e('Execution time limit per thread.'); ?>",
        "type": "number",
        "units": "<?php _e('sec'); ?>",
        "default": 60,
        "pro": 1
      },
      {
        "name": "ress_async_memlimit",
        "global": 1,
        "title": "<?php _e('Memory Limit'); ?>",
        "tooltip": "<?php _e('Memory limit per thread (Mb).'); ?>",
        "type": "number",
        "units": "<?php _e('Mb'); ?>",
        "default": 0,
        "pro": 1
      },
      {
        "name": "worker_config_path",
        "global": 1,
        "title": "<?php _e('Path to Master WordPress'); ?>",
        "tooltip": "<?php _e('Path to the WordPress installation where the main optimization queue database is stored.'); ?>",
        "type": "text",
        "default": "",
        "pro": 1
      },
      {
        "name": "worker_group",
        "global": 1,
        "title": "<?php _e('User Group'); ?>",
        "tooltip": "<?php _e('Change file group of optimized files to this one.'); ?>",
        "type": "text",
        "default": "",
        "pro": 1
      }
    ]
  },
  {
    "title": "<?php _e('Troubleshooting'); ?>",
    "items": [
      {
        "name": "ress_logginglevel",
        "title": "<?php _e('Logging level'); ?>",
        "tooltip": "<?php _e('Specify the degree of detail/verbosity in log messages generated by the optimizing engine.'); ?>",
        "type": "selectlist",
        "values": [
          {
            "0": "<?php _e('None'); ?>"
          },
          {
            "1": "<?php _e('Emergency'); ?>"
          },
          {
            "2": "<?php _e('Alert'); ?>"
          },
          {
            "3": "<?php _e('Critical'); ?>"
          },
          {
            "4": "<?php _e('Error'); ?>"
          },
          {
            "5": "<?php _e('Warning'); ?>"
          },
          {
            "6": "<?php _e('Notice'); ?>"
          },
          {
            "7": "<?php _e('Info'); ?>"
          },
          {
            "8": "<?php _e('Debug'); ?>"
          }
        ],
        "default": "5",
        "presets": {
        }
      },
      {
        "name": "errorlogging",
        "title": "<?php _e('PHP Error Logging'); ?>",
        "tooltip": "<?php _e('Log all PHP\'s errors, exceptions, warnings, and notices. Please check the content of this file and send it to us if there are messages related to PageSpeed Ninja plugin.'); ?>",
        "type": "errorlogging",
        "default": 0,
        "presets": {
        }
      },
      {
        "global": 2,
        "title": "<?php _e('Images'); ?>",
        "tooltip": "<?php _e('Remove optimized images.'); ?>",
        "type": "do_clear_images"
      },
      {
        "global": 2,
        "title": "<?php _e('Downloads'); ?>",
        "tooltip": "<?php _e('Remove loaded files.'); ?>",
        "type": "do_clear_loaded",
        "pro": 1
      },
      {
        "global": 2,
        "title": "<?php _e('Optimized Files'); ?>",
        "tooltip": "<?php _e('View size of optimized files (JavaScript, CSS, and other generated files). To remove them, use Cache Clear Expired or Clear All buttons below.'); ?>",
        "type": "do_view_static"
      },
      {
        "global": 2,
        "title": "<?php _e('Cache'); ?>",
        "tooltip": "<?php _e('Clear the internal cache files.'); ?>",
        "type": "do_clear_cache"
      },
      {
        "global": 2,
        "title": "<?php _e('Page Cache'); ?>",
        "tooltip": "<?php _e('Clear the cache of optimized HTML pages.'); ?>",
        "type": "do_clear_pagecache"
      },
      {
        "name": "subsection_html_rules",
        "title": "<?php _e('HTML Exclude Rules'); ?>",
        "tooltip": "",
        "type": "subsection"
      },
      {
        "name": "html_rules_safe_exclude",
        "title": "<?php _e('Bypass'); ?>",
        "tooltip": "<?php _e('Exclude matched HTML elements from processing.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "subsection_css_rules",
        "title": "<?php _e('CSS Exclude Rules'); ?>",
        "tooltip": "",
        "type": "subsection"
      },
      {
        "name": "css_rules_minify_exclude",
        "title": "<?php _e('Minify Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched styles from minification.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "css_rules_merge_bypass",
        "title": "<?php _e('Merge Bypass'); ?>",
        "tooltip": "<?php _e('Bypass processing of matched styles.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "css_rules_merge_stop",
        "title": "<?php _e('Merge Stop'); ?>",
        "tooltip": "<?php _e('Exclude matched styles from merging.'); ?>",
        "type": "rules",
        "default": "onload*="
      },
      {
        "name": "css_rules_merge_exclude",
        "title": "<?php _e('Merge Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched styles from merging.'); ?>",
        "type": "rules",
        "default": "href*=#"
      },
      {
        "name": "css_rules_merge_include",
        "title": "<?php _e('Merge Include'); ?>",
        "tooltip": "<?php _e('Allow merging of matched styles.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "css_rules_merge_startgroup",
        "title": "<?php _e('Merge Start Group'); ?>",
        "tooltip": "<?php _e('Start new merging group on matched styles.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "css_rules_merge_stopgroup",
        "title": "<?php _e('Merge Stop Group'); ?>",
        "tooltip": "<?php _e('Stop merging group on matched styles.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "subsection_js_rules",
        "title": "<?php _e('JavaScript Exclude Rules'); ?>",
        "tooltip": "",
        "type": "subsection"
      },
      {
        "name": "js_rules_minify_exclude",
        "title": "<?php _e('Minify Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched JavaScripts from minification.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_merge_bypass",
        "title": "<?php _e('Merge Bypass'); ?>",
        "tooltip": "<?php _e('Bypass processing of matched JavaScripts.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_merge_stop",
        "title": "<?php _e('Merge Stop'); ?>",
        "tooltip": "<?php _e('Exclude matched JavaScripts from merging.'); ?>",
        "type": "rules",
        "default": "onload*="
      },
      {
        "name": "js_rules_merge_exclude",
        "title": "<?php _e('Merge Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched JavaScripts from merging.'); ?>",
        "type": "rules",
        "default": "src*=#"
      },
      {
        "name": "js_rules_merge_include",
        "title": "<?php _e('Merge Include'); ?>",
        "tooltip": "<?php _e('Allow merging of matched JavaScripts.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_merge_startgroup",
        "title": "<?php _e('Merge Start Group'); ?>",
        "tooltip": "<?php _e('Start new merging group on matched JavaScripts.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_merge_stopgroup",
        "title": "<?php _e('Merge Stop Group'); ?>",
        "tooltip": "<?php _e('Stop merging group on matched JavaScripts.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_move_exclude",
        "title": "<?php _e('Move Exclude'); ?>",
        "tooltip": "<?php _e('Disallow moving of matched JavaScripts.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_async_exclude",
        "title": "<?php _e('Async Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched JavaScripts from auto-async.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_async_include",
        "title": "<?php _e('Async Include'); ?>",
        "tooltip": "<?php _e('Set matched JavaScripts as async.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_defer_exclude",
        "title": "<?php _e('Defer Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched JavaScripts from auto-defer.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "js_rules_defer_include",
        "title": "<?php _e('Defer Include'); ?>",
        "tooltip": "<?php _e('Set matched JavaScripts as deferred.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "subsection_img_rules",
        "title": "<?php _e('Image Exclude Rules'); ?>",
        "tooltip": "",
        "type": "subsection"
      },
      {
        "name": "img_rules_minify_exclude",
        "title": "<?php _e('Minify Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched images from optimization.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "subsection_lazyload_rules",
        "title": "<?php _e('Lazyload Exclude Rules'); ?>",
        "tooltip": "",
        "type": "subsection"
      },
      {
        "name": "lazyload_rules_img_exclude",
        "title": "<?php _e('Image Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched images from lazy loading.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "lazyload_rules_video_exclude",
        "title": "<?php _e('Video Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched videos from lazy loading.'); ?>",
        "type": "rules",
        "default": ""
      },
      {
        "name": "lazyload_rules_iframe_exclude",
        "title": "<?php _e('Iframe Exclude'); ?>",
        "tooltip": "<?php _e('Exclude matched iframes from lazy loading.'); ?>",
        "type": "rules",
        "default": ""
      }
    ]
  },
  {
    "id": "server-response-time",
    "title": "<?php _e('Initial server response time was short'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "caching",
        "global": 1,
        "title": "<?php _e('Caching'); ?>",
        "tooltip": "<?php _e('Enable server-side page caching.'); ?>",
        "type": "cachingcheckbox",
        "default": 1,
        "presets": {
          "compact": 0
        }
      },
      {
        "name": "caching_fast",
        "global": 1,
        "title": "<?php _e('Fast Caching'); ?>",
        "tooltip": "<?php _e('Enable fast server-side page caching.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "caching_processed",
        "title": "<?php _e('Experimental Caching'); ?>",
        "tooltip": "<?php _e('Extra caching level for optimized pages (may require more disk space).'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "caching_ttl",
        "global": 1,
        "title": "<?php _e('Caching Time-to-live'); ?>",
        "tooltip": "<?php _e('Caching time-to-live in minutes. Cached data will be invalidated after specified time interval. PageSpeed Ninja automatically invalidates cache when a new comment is added, a new post is published, theme is changed, etc. (I.e., this affects how frequently comments should be updated for unauthorized users.) 15 minutes is a reasonable time in most cases, but if commenting is disabled, this could be increased to one day (1440 mins).'); ?>",
        "type": "number",
        "units": "<?php _e('min'); ?>",
        "default": 1440,
        "presets": {
          "safe": 15,
          "ultra": 10080,
          "experimental": 10080
        }
      },
      {
        "name": "pagecache_devicedependent",
        "title": "<?php _e('Mobile Cache'); ?>",
        "tooltip": "<?php _e('The Mobile Cache setting is used to separate mobile and desktop page caches on the server. Use this setting if you have an adaptive design approach (i.e. different content for mobile and desktop browsers).'); ?>",
        "type": "checkbox",
        "default": "0",
        "pro": 1
      },
      {
        "name": "pagecache_search",
        "title": "<?php _e('Cache Search Queries'); ?>",
        "tooltip": "<?php _e('Cache pages with search queries results (may result in larger cache size).'); ?>",
        "type": "checkbox",
        "default": "0"
      },
      {
        "name": "pagecache_autowarm",
        "title": "<?php _e('Auto-warm Cache'); ?>",
        "tooltip": "<?php _e('Update Page Cache daily.'); ?>",
        "type": "checkbox",
        "default": "0",
        "pro": 1
      },
      {
        "name": "pagecache_autowarm_urls",
        "title": "<?php _e('Auto-warm URLs'); ?>",
        "tooltip": "<?php _e('One-per-line list of URLs to auto-warm (relative to the website\'s root, e.g. /, /login, etc.).'); ?>",
        "type": "textarea",
        "default": "",
        "pro": 1
      },
      {
        "name": "pagecache_disable_queries",
        "title": "<?php _e('Disable for URLs with Query'); ?>",
        "tooltip": "<?php _e('Disable Page Cache for URL with query parameters (e.g. search requests).'); ?>",
        "type": "checkbox",
        "default": "0"
      },
      {
        "name": "pagecache_params_skip",
        "title": "<?php _e('Skip Queries'); ?>",
        "tooltip": "<?php _e('These query parameters does not affect the page content.'); ?>",
        "type": "textarea",
        "default": "utm_source\nutm_medium\nutm_campaign\nutm_content\nutm_term\ngclid\nfbclid\ndclid\nyclid"
      },
      {
        "name": "pagecache_exclude_urls",
        "title": "<?php _e('Exclude Pages'); ?>",
        "tooltip": "<?php _e('Disable Page Cache for specified URLs.'); ?>",
        "type": "textarea",
        "default": "/cart\n/checkout"
      },
      {
        "name": "pagecache_cookies_disable",
        "title": "<?php _e('Disable for Cookies'); ?>",
        "tooltip": "<?php _e('Disable Page Cache for visitors with any of the specified cookie set.'); ?>",
        "type": "textarea",
        "default": "woocommerce_items_in_cart"
      },
      {
        "name": "pagecache_cookies_depend",
        "title": "<?php _e('Depend on Cookies'); ?>",
        "tooltip": "<?php _e('Cache page depending on values of the specified cookies.'); ?>",
        "type": "textarea",
        "default": "wp_lang"
      }
    ]
  },
  {
    "id": "uses-long-cache-ttl",
    "title": "<?php _e('Serve static assets with an efficient cache policy'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "htaccess_caching",
        "global": 1,
        "title": "<?php _e('Caching in .htaccess'); ?>",
        "tooltip": "<?php _e('Update .htaccess files in wp-includes, wp-content, and uploads directories for better front-end performance (for Apache webserver).'); ?>",
        "type": "checkbox",
        "default": "auto",
        "presets": {
          "safe": 0,
          "compact": 1,
          "optimal": 1,
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "css_loadurl",
        "title": "<?php _e('Load External Stylesheets'); ?>",
        "tooltip": "<?php _e('Load external files for optimization and merging. Disable if you use external dynamically generated CSS files.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1,
        "presets": {
          "safe": 0,
          "compact": 0
        }
      },
      {
        "name": "js_loadurl",
        "title": "<?php _e('Load External Scripts'); ?>",
        "tooltip": "<?php _e('Load external files for optimization and merging. Disable if you use external dynamically generated JavaScript files.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1,
        "presets": {
          "safe": 0,
          "compact": 0
        }
      },
      {
        "name": "img_loadurl",
        "title": "<?php _e('Load External Images'); ?>",
        "tooltip": "<?php _e('Load external files for optimization. Disable if you use external dynamically generated image files.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1,
        "presets": {
          "safe": 0,
          "compact": 0
        }
      },
      {
        "name": "font_loadurl",
        "title": "<?php _e('Load External Fonts'); ?>",
        "tooltip": "<?php _e('Load external files for optimization. Disable if you use external dynamically generated font files.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1,
        "presets": {
          "safe": 0,
          "compact": 0
        }
      },
      {
        "name": "load_google_analytics",
        "title": "<?php _e('Load Google Analytics'); ?>",
        "tooltip": "<?php _e('Replace Google Analytics by loaded local copy.'); ?>",
        "type": "checkbox",
        "default": 0,
        "pro": 1,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "load_disable_queries",
        "title": "<?php _e('Exclude Queries'); ?>",
        "tooltip": "<?php _e('Don\'t load resources containing query parameters.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1
      },
      {
        "name": "load_disable_php",
        "title": "<?php _e('Exclude PHP Scripts'); ?>",
        "tooltip": "<?php _e('Don\'t load resources generated by PHP scripts.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1
      },
      {
        "name": "load_allowed_domains",
        "title": "<?php _e('Allowed Domains'); ?>",
        "tooltip": "<?php _e('Allow loading of external resources from this list of domains only.'); ?>",
        "type": "textarea",
        "default": "ajax.aspnetcdn.com\ncdn.bootcss.com\nmaxcdn.bootstrapcdn.com\ncdnjs.cloudflare.com\nssl.google-analytics.com\nwww.google-analytics.com\najax.googleapis.com\n0.gravatar.com\n1.gravatar.com\n2.gravatar.com\n3.gravatar.com\nwww.gravatar.com\ncode.ionicframework.com\ncdn.jsdelivr.net\ncode.jquery.com\ncdn.jquerytools.org\ncdn.materialdesignicons.com\noss.maxcdn.com\ntwemoji.maxcdn.com\najax.microsoft.com\ncdn.optimizely.com\nwww.parsecdn.com\nrawgit.com\ncdn.rawgit.com"
      },
      {
        "name": "load_method",
        "title": "<?php _e('Loading Method'); ?>",
        "tooltip": "<?php _e('Method to download resources: PHP stream (via file_get_contents), cURL (via curl extension), or sock (via fsockopen function).'); ?>",
        "type": "select",
        "values": [
          {
            "stream": "<?php _e('PHP stream'); ?>"
          },
          {
            "curl": "<?php _e('cURL'); ?>"
          },
          {
            "sock": "<?php _e('sock'); ?>"
          }
        ],
        "default": "stream",
        "pro": 1
      },
      {
        "name": "load_timeout",
        "title": "<?php _e('Loading Timeout'); ?>",
        "tooltip": "<?php _e('Break loading if remote server doesn\'t response in specified time.'); ?>",
        "type": "number",
        "units": "<?php _e('sec'); ?>",
        "default": 5,
        "pro": 1
      },
      {
        "name": "load_user_agent",
        "title": "<?php _e('User-Agent'); ?>",
        "tooltip": "<?php _e('Use this User-Agent header for resource loading.'); ?>",
        "type": "text",
        "default": "",
        "pro": 1
      }
    ]
  },
  {
    "id": "uses-text-compression",
    "title": "<?php _e('Enable text compression'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "html_gzip",
        "title": "<?php _e('Gzip Compression'); ?>",
        "tooltip": "<?php _e('Compress pages using Gzip for better performance. Recommended.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "htaccess_gzip",
        "global": 1,
        "title": "<?php _e('Gzip Compression in .htaccess'); ?>",
        "tooltip": "<?php _e('Update .htaccess files in wp-includes, wp-content, and uploads directories for better front-end performance (for Apache webserver).'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "compact": 1,
          "optimal": 1,
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "html_sortattr",
        "title": "<?php _e('Reorder Attributes'); ?>",
        "tooltip": "<?php _e('Reorder HTML attributes for better gzip compression. Recommended. Disable if there is a conflict with another extension that rely on an exact HTML attribute order.'); ?>",
        "type": "checkbox",
        "class": "streamdisabled",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      }
    ]
  },
  {
    "id": "uses-rel-preconnect",
    "title": "<?php _e('Preconnect to required origins'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "dnsprefetch",
        "title": "<?php _e('DNS Prefetch'); ?>",
        "tooltip": "<?php _e('Use DNS pre-fetching for external domain names. Disable if there is another plugin doing the same thing and there is a conflict with PageSpeed Ninja.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "title": "<?php _e('DNS Prefetch Assistant'); ?>",
        "tooltip": "<?php _e('Semi-automatical assistant for choosing of domains to prefetch.'); ?>",
        "type": "do_dnsprefetch_assistant",
        "pro": 1
      },
      {
        "name": "dnsprefetch_domain",
        "title": "<?php _e('Domains'); ?>",
        "tooltip": "<?php _e('List of Domains for DNS prefetch.'); ?>",
        "type": "textarea",
        "default": ""
      }
    ]
  },
  {
    "id": "uses-rel-preload",
    "title": "<?php _e('Preload key requests'); ?>",
    "type": "speed",
    "items": [
      {
        "title": "<?php _e('Preload Assistant'); ?>",
        "tooltip": "<?php _e('Semi-automatical assistant for choosing of files to preload.'); ?>",
        "type": "do_preload_assistant",
        "pro": 1
      },
      {
        "name": "preload_style",
        "title": "<?php _e('CSS Styles'); ?>",
        "tooltip": "<?php _e('List of stylesheet files to preload.'); ?>",
        "type": "textarea",
        "default": ""
      },
      {
        "name": "preload_font",
        "title": "<?php _e('Fonts'); ?>",
        "tooltip": "<?php _e('List of font files to preload.'); ?>",
        "type": "textarea",
        "default": ""
      },
      {
        "name": "preload_script",
        "title": "<?php _e('JavaScripts'); ?>",
        "tooltip": "<?php _e('List of JavaScript files to preload.'); ?>",
        "type": "textarea",
        "default": ""
      },
      {
        "name": "preload_image",
        "title": "<?php _e('Images'); ?>",
        "tooltip": "<?php _e('List of image files to preload.'); ?>",
        "type": "textarea",
        "default": ""
      }
    ]
  },
  {
    "id": "unminified-css",
    "title": "<?php _e('Minify CSS'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "css_di_cssMinify",
        "title": "<?php _e('Minify CSS Method'); ?>",
        "tooltip": "<?php _e('Optimizes CSS for better performance. This optimizes CSS correspondingly (removes unnecessary whitespaces, unused code etc.). If there are any CSS issues, disable the minification (and wait for a plugin update).'); ?>",
        "type": "select",
        "values": [
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "ress": "<?php _e('PageSpeed Ninja'); ?>"
          },
          {
            "$exec": "<?php _e('Command'); ?>"
          }
        ],
        "default": "ress",
        "presets": {
          "safe": "none"
        }
      },
      {
        "name": "css_minify_exec",
        "title": "<?php _e('Command'); ?>",
        "tooltip": "<?php _e('External (CLI) command to optimize CSS styles.'); ?>",
        "type": "text",
        "default": "csso {{TARGET}} -o {{TARGET}}",
        "pro": 1
      },
      {
        "name": "css_minifyattribute",
        "title": "<?php _e('Minify Style Attributes'); ?>",
        "tooltip": "<?php _e('Optimizes CSS styles within \'style\' attributes. (Usually these attributes are short, and as such have insignificant effect on the HTML size, however the processing takes time and that may affect the total page generation time.)'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "css_crossfileoptimization",
        "title": "<?php _e('Cross-files Optimization'); ?>",
        "tooltip": "<?php _e('Optimize the generated combined CSS file.'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      }
    ]
  },
  {
    "id": "unused-css-rules",
    "title": "<?php _e('Reduce unused CSS'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "unminified-javascript",
    "title": "<?php _e('Minify JavaScript'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "js_di_jsMinify",
        "title": "<?php _e('Minify JavaScript Method'); ?>",
        "tooltip": "<?php _e('Optimizes JavaScript for better performance. This optimizes JavaScript correspondingly (removes unnecessary whitespaces, unused code etc.).'); ?>",
        "type": "select",
        "values": [
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "jsmin": "<?php _e('JsMin'); ?>"
          },
          {
            "$exec": "<?php _e('Command'); ?>"
          }
        ],
        "default": "none",
        "presets": {
          "ultra": "jsmin",
          "experimental": "jsmin"
        }
      },
      {
        "name": "js_minify_exec",
        "title": "<?php _e('Command'); ?>",
        "tooltip": "<?php _e('External (CLI) command to optimize JavaScript styles.'); ?>",
        "type": "text",
        "default": "uglifyjs {{TARGET}} -o {{TARGET}}",
        "pro": 1
      },
      {
        "name": "js_minifyattribute",
        "title": "<?php _e('Minify Event Attributes'); ?>",
        "tooltip": "<?php _e('Optimizes JavaScript in event attributes (e.g. \'onclick\' or \'onsubmit\').'); ?>",
        "type": "checkbox",
        "class": "streamdisabled",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "js_crossfileoptimization",
        "title": "<?php _e('Cross-files Optimization'); ?>",
        "tooltip": "<?php _e('Optimize the generated combined JavaScript file. This option doubles the JavaScript optimization time (though the good news is that it is done only once) and should be enabled only if you really want to get the JS size down to as small as possible.'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      }
    ]
  },
  {
    "id": "render-blocking-resources",
    "title": "<?php _e('Eliminate render-blocking resources'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "css_abovethefold",
        "title": "<?php _e('Critical CSS'); ?>",
        "tooltip": "<?php _e('Use auto-generated critical (above-the-fold) CSS styles. Disable it if the above-the-fold CSS is generated incorrectly, or the page is rendered with the aid of a lot of JavaScript and above-the-fold CSS has no effect on the rendering.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "css_abovethefoldglobal",
        "title": "<?php _e('Use Globally'); ?>",
        "tooltip": "<?php _e('Use critical CSS styles on home page only, or on every page (globally).'); ?>",
        "type": "checkbox",
        "default": 0
      },
      {
        "name": "allow_ext_atfcss",
        "title": "<?php _e('Remote Critical CSS Generation'); ?>",
        "tooltip": "<?php _e('Allow the use of PageSpeed.Ninja critical CSS generation service on the PageSpeed Ninja server. When this setting is disabled, this plugin contains a simplified version of the generation tool that works directly in the browser, but using it requires you to manually visit the PageSpeed settings page to regenerate the critical CSS after each change to the website. Enabling this setting allows the use of the PageSpeed Ninja server to have the critical CSS regenerated automatically.'); ?>",
        "type": "checkbox",
        "default": 1
      },
      {
        "name": "css_abovethefoldcookie",
        "title": "<?php _e('Critical CSS Cookie'); ?>",
        "tooltip": "<?php _e('Use a cookie to embed critical CSS styles for first-time visitors only. Using this cookie allows not sending the critical CSS with every request (as all necessary CSS files will be cached by the browser), but the setting may be disabled if PageSpeed Ninja is used with a 3rd party caching plugin.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
        }
      },
      {
        "name": "css_abovethefoldlocal",
        "title": "<?php _e('Local Critical CSS Generation'); ?>",
        "tooltip": "<?php _e('Critical CSS styles may be generated either locally (directly in your browser), or externally using PageSpeed Ninja\'s service. \'Local\' uses the current browser to generate the CSS (in some cases the result may be different depending on browser: Chrome-based ones are recommended), \'External\' uses PageSpeed Ninja\'s unique service with extra improvements and minification.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
        }
      },
      {
        "name": "css_abovethefoldstyle",
        "title": "<?php _e('Critical CSS Styles'); ?>",
        "tooltip": "<?php _e('Critical (above-the-fold) CSS styles. It is generated automatically, but you may insert custom styling or edit the auto-generated version below.'); ?>",
        "type": "abovethefoldstyle",
        "default": ""
      },
      {
        "name": "css_abovethefoldautoupdate",
        "title": "<?php _e('Auto Update Critical CSS'); ?>",
        "tooltip": "<?php _e('Updatecritical CSS styles daily.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1,
        "presets": {
        }
      },
      {
        "name": "css_nonblockjs",
        "title": "<?php _e('Non-blocking JavaScript'); ?>",
        "tooltip": "<?php _e('Load JavaScript asynchronously with a few seconds\' delay after the webpage is displayed in the browser. This speeds up the page rendering by defrering the loading of all JS. May significantly improve the loading time (and the PageSpeed Insight score), but leads to a flash of unstyled text, may affect stats in Google Analytics, and some other side effects.'); ?>",
        "experimental": 1,
        "type": "checkbox",
        "default": 0,
        "presets": {
          "experimental": 1
        }
      }
    ]
  },
  {
    "id": "font-display",
    "title": "<?php _e('Ensure text remains visible during webfont load'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "css_googlefonts",
        "title": "<?php _e('Google Fonts Loading'); ?>",
        "tooltip": "<?php _e('Used to optimize the loading of Google Fonts. \'Flash of invisible text\': load fonts in a standard way at the beginning of a HTML page - most browsers do not display text until the font is loaded. \'Flash of unstyled text\': load fonts asynchronously and switch from default font to the loaded one when ready. \'WebFont Loader\': load fonts asynchronously using the webfont.js library. \'None\': disable optimization.'); ?>",
        "type": "select",
        "values": [
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "foit": "<?php _e('Flash of invisible text'); ?>"
          },
          {
            "fout": "<?php _e('Flash of unstyled text'); ?>"
          },
          {
            "async": "<?php _e('WebFont Loader'); ?>"
          }
        ],
        "default": "fout"
      },
      {
        "name": "css_fontdisplayswap",
        "title": "<?php _e('Swap Web-fonts'); ?>",
        "tooltip": "<?php _e('Use a fallback font while the Web font is being loading, and then swap the font after the Web font has been loaded.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "css_fontdisplayswap_exclude",
        "title": "<?php _e('Exclude Web-fonts'); ?>",
        "tooltip": "<?php _e('Do not affect loading of the following Web fonts.'); ?>",
        "type": "textarea",
        "default": "FontAwesome"
      }
    ]
  },
  {
    "id": "redirects",
    "title": "<?php _e('Avoid multiple page redirects'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "total-byte-weight",
    "title": "<?php _e('Avoids enormous network payloads'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "subsection_html",
        "title": "<?php _e('HTML'); ?>",
        "tooltip": "<?php _e('Settings related to HTML optimization.'); ?>",
        "type": "subsection"
      },
      {
        "name": "html_mergespace",
        "title": "<?php _e('Merge Whitespaces'); ?>",
        "tooltip": "<?php _e('Removes empty spaces from the HTML code for faster loading. Recommended. Disable if there is a conflict with the rule \'white-space: pre\' in CSS. (This is rarely needed, as usually the &lt;pre&gt; element is used for this behaviour, and PSN processes &lt;pre&gt; correctly by keeping all spaces in place.)'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "html_removecomments",
        "title": "<?php _e('Remove Comments'); ?>",
        "tooltip": "<?php _e('Removes comments from the HTML code for faster loading. Disable if there is a conflict with another plugin (e.g. a plugin which uses JavaScript to extract content of comments).'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
        }
      },
      {
        "name": "html_minifyurl",
        "title": "<?php _e('Minify URLs'); ?>",
        "tooltip": "<?php _e('Replaces absolute URLs (http://www.website.com/link) with relative URLs (/link) to reduce page size. Disable if there is a conflict with another plugin (e.g. plugin which uses JavaScript that depends on having the full URL in certain href attributes.).'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
        }
      },
      {
        "name": "html_removedefattr",
        "title": "<?php _e('Remove Default Attributes'); ?>",
        "tooltip": "<?php _e('Remove attributes with default values, e.g. type=\'text\' in &lt;input&gt; tag. It reduces total page size. Disable in the case of conflicts with CSS (e.g. \'input[type=text]\' selector doesn\'t match \'input\' element without \'type\' attribute).'); ?>",
        "type": "checkbox",
        "class": "streamdisabled",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "html_removeiecond",
        "title": "<?php _e('Remove IE Conditionals'); ?>",
        "tooltip": "<?php _e('Remove IE conditional commenting tags for non-IE browsers. Disable if there is a conflict with another plugin that relies on these tags.'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "subsection_css",
        "title": "<?php _e('CSS'); ?>",
        "tooltip": "<?php _e('Settings related to CSS optimization.'); ?>",
        "type": "subsection"
      },
      {
        "name": "css_merge",
        "title": "<?php _e('Merge CSS'); ?>",
        "tooltip": "<?php _e('Merge several CSS files into single one for faster loading. Disable different pages load different CSS files.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
        }
      },
      {
        "name": "css_mergeinline",
        "title": "<?php _e('Merge Embedded Styles'); ?>",
        "tooltip": "<?php _e('Merge embedded CSS styles in &lt;style&gt;...&lt;/style&gt; blocks. Disable for dynamically-generated embedded CSS styles - though if the dynamic CSS is the same on all pages, this feature may be kept enabled. But if different pages have different embedded CSS, this feature should be disabled.'); ?>",
        "type": "select",
        "values": [
          {
            "0": "<?php _e('Disable'); ?>"
          },
          {
            "head": "<?php _e('In &lt;head&gt; only'); ?>"
          },
          {
            "1": "<?php _e('Everywhere'); ?>"
          }
        ],
        "default": "head",
        "presets": {
          "safe": "0",
          "compact": "0",
          "ultra": "1",
          "experimental": "1"
        }
      },
      {
        "name": "css_inlinelimit",
        "title": "<?php _e('Inline Limit'); ?>",
        "tooltip": "<?php _e('Inline limit allows to inline small CSS (up to the specified limit) into the page directly in order to avoid sending additional requests to the server (i.e. speeds up loading). 1024 bytes is likely optimal for most cases, allowing inlining of small files while not inlining large ones.'); ?>",
        "type": "number",
        "units": "<?php _e('bytes'); ?>",
        "default": 4096,
        "presets": {
        }
      },
      {
        "name": "css_checklinkattributes",
        "title": "<?php _e('Keep Extra link Tag Attributes'); ?>",
        "tooltip": "<?php _e('Don\'t merge a stylesheet if its \'link\' tag contains extra attribute(s) (e.g. \'id\', in rare cases it might mean that JavaScript code may refer to this stylesheet HTML node).'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "safe": 1
        }
      },
      {
        "name": "css_checkstyleattributes",
        "title": "<?php _e('Keep Extra style Tag Attributes'); ?>",
        "tooltip": "<?php _e('Don\'t merge a stylesheet if its \'style\' tag contains extra attribute(s) (e.g. \'id\', in rare cases it might mean that javascript code may refer to this stylesheet HTML node)'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "safe": 1,
          "compact": 1,
          "optimal": 1
        }
      },
      {
        "name": "subsection_js",
        "title": "<?php _e('JavaScript'); ?>",
        "tooltip": "<?php _e('Settings related to JavaScript optimization.'); ?>",
        "type": "subsection"
      },
      {
        "name": "js_merge",
        "title": "<?php _e('Merge Scripts'); ?>",
        "tooltip": "<?php _e('Merge several JavaScript files into a single one for faster loading. Recommended.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
        }
      },
      {
        "name": "js_mergeinline",
        "title": "<?php _e('Merge Embedded Scripts'); ?>",
        "tooltip": "<?php _e('Merge embedded JavaScript code in &lt;script&gt;...&lt;/script&gt; code blocks. Disable for dynamically-generated embedded JavaScript code.'); ?>",
        "type": "select",
        "values": [
          {
            "0": "<?php _e('Disable'); ?>"
          },
          {
            "head": "<?php _e('In &lt;head&gt; only'); ?>"
          },
          {
            "1": "<?php _e('Everywhere'); ?>"
          }
        ],
        "default": "head",
        "presets": {
          "safe": "0",
          "compact": "0",
          "ultra": "1",
          "experimental": "1"
        }
      },
      {
        "name": "js_automove",
        "title": "<?php _e('Auto Move'); ?>",
        "tooltip": "<?php _e('Allows to relocate script tags for more effienct merging. Blocking scripts generates \'inplace\' HTML content and in general should not be relocated. Disable if you use blocking scripts, e.g. synchronous Google Adsense ad code.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "js_forcedefer",
        "title": "<?php _e('Force defer'); ?>",
        "tooltip": "<?php _e('Use deferred loading (via \'defer\' attribute) for all JavaScripts.'); ?>",
        "type": "checkbox",
        "default": 0
      },
      {
        "name": "js_forceasync",
        "title": "<?php _e('Force async'); ?>",
        "tooltip": "<?php _e('Use asynchronous loading (via \'async\' attribute) for all JavaScripts.'); ?>",
        "type": "checkbox",
        "default": 0
      },
      {
        "name": "js_skipinits",
        "title": "<?php _e('Skip Initialization Scripts'); ?>",
        "tooltip": "<?php _e('Allows to skip short inlined initialization-like scripts (e.g. &lt;script&gt;var x=&quot;zzz&quot;&lt;/script&gt;) from merging and optimization.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "js_inlinelimit",
        "title": "<?php _e('Inline Limit'); ?>",
        "tooltip": "<?php _e('Inline limit allows to inline small JavaScript (up to the specified limit) into the page directly in order to avoid sending additional requests to the server (i.e. speeds up loading)1024 bytes is likely optimal for most cases, allowing inlining of small JavaScript files while not inlining large files like jQuery.'); ?>",
        "type": "number",
        "units": "<?php _e('bytes'); ?>",
        "default": 4096,
        "presets": {
        }
      },
      {
        "name": "js_checkattributes",
        "title": "<?php _e('Keep Extra script Tag Attributes'); ?>",
        "tooltip": "<?php _e('Don\'t merge JavaScript if its \'script\' tag contains extra attributes (e.g. \'id\', in rare cases it might mean that JavaScript code may refer to this stylesheet HTML node).'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "safe": 1
        }
      },
      {
        "name": "js_wraptrycatch",
        "title": "<?php _e('Wrap to try/catch'); ?>",
        "tooltip": "<?php _e('Browsers stop the execution of JavaScript code if a parsing or execution error is found, meaning that merged JavaScript files may be stopped in the case of an error in one of the source files. This option enables the wrapping of each merged JavaScript files into a try/catch block to continue the execution after a possible error, but note that enabling this may reduce the performance in some browsers.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
        }
      },
      {
        "name": "wp_mergewpemoji",
        "title": "<?php _e('Optimize Emoji Loading'); ?>",
        "tooltip": "<?php _e('Change the way the WP Emoji script is loaded.'); ?>",
        "type": "select",
        "values": [
          {
            "default": "<?php _e('Default Wordpress behaviour'); ?>"
          },
          {
            "merge": "<?php _e('Merge with other scripts'); ?>"
          },
          {
            "disable": "<?php _e('Don\'t load'); ?>"
          }
        ],
        "default": "merge",
        "presets": {
        }
      }
    ]
  },
  {
    "id": "uses-optimized-images",
    "title": "<?php _e('Efficiently encode images'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "img_minify",
        "title": "<?php _e('Optimization'); ?>",
        "tooltip": "<?php _e('Reduce the size of the images for faster loading and less bandwidth needed using the selected rescaling quality.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0,
          "compact": 0
        }
      },
      {
        "name": "img_driver",
        "title": "<?php _e('Default Images Handler'); ?>",
        "tooltip": "<?php _e('Method to deal with images. By default PHP supports GD2 only, but may be configured to support ImageMagick API as well.'); ?>",
        "type": "imgdriver",
        "values": [
          {
            "gd2": "<?php _e('GD2'); ?>"
          },
          {
            "imagick": "<?php _e('ImageMagick'); ?>"
          }
        ],
        "default": "gd2",
        "pro": 1
      },
      {
        "name": "img_jpegquality",
        "title": "<?php _e('JPEG Quality'); ?>",
        "tooltip": "<?php _e('You can set the image rescaling quality between 0 (low) and 100 (high). Higher means better quality. The recommended level is 75%-95%.'); ?>",
        "type": "number",
        "units": "<?php _e('%'); ?>",
        "default": 85,
        "presets": {
          "safe": 95
        }
      },
      {
        "name": "img_driver_jpeg",
        "title": "<?php _e('JPEG Handler'); ?>",
        "tooltip": "<?php _e('Method to deal with images: None (don\'t optimize), GD2 (built-in PHP library), ImageMagick (additional PHP library), or Command (external CLI tool).'); ?>",
        "type": "imgdriver",
        "values": [
          {
            "": "<?php _e('Default'); ?>"
          },
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "gd2": "<?php _e('GD2'); ?>"
          },
          {
            "imagick": "<?php _e('ImageMagick'); ?>"
          },
          {
            "exec": "<?php _e('Command'); ?>"
          }
        ],
        "default": "",
        "pro": 1
      },
      {
        "name": "img_exec_jpeg",
        "title": "<?php _e('JPEG Command'); ?>",
        "tooltip": "<?php _e('External (CLI) command to optimize JPEG images.'); ?>",
        "type": "text",
        "default": "jpegoptim -f --strip-all --all-progressive --max={{Q}} {{TARGET}}",
        "pro": 1
      },
      {
        "name": "img_webpquality",
        "title": "<?php _e('WebP Quality'); ?>",
        "tooltip": "<?php _e('You can set the image rescaling quality between 0 (low) and 100 (high). Higher means better quality. The recommended level is 75%-95%.'); ?>",
        "type": "number",
        "units": "<?php _e('%'); ?>",
        "default": 85,
        "presets": {
          "safe": 95
        }
      },
      {
        "name": "img_driver_webp",
        "title": "<?php _e('WebP Handler'); ?>",
        "tooltip": "<?php _e('Method to deal with images: None (don\'t optimize), GD2 (built-in PHP library), ImageMagick (additional PHP library), or Command (external CLI tool).'); ?>",
        "type": "imgdriver",
        "values": [
          {
            "": "<?php _e('Default'); ?>"
          },
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "gd2": "<?php _e('GD2'); ?>"
          },
          {
            "imagick": "<?php _e('ImageMagick'); ?>"
          },
          {
            "exec": "<?php _e('Command'); ?>"
          }
        ],
        "default": "",
        "pro": 1
      },
      {
        "name": "img_exec_webp",
        "title": "<?php _e('WebP Command'); ?>",
        "tooltip": "<?php _e('External (CLI) command to optimize WebP images.'); ?>",
        "type": "text",
        "default": "",
        "pro": 1
      },
      {
        "name": "img_avifquality",
        "title": "<?php _e('AVIF Quality'); ?>",
        "tooltip": "<?php _e('You can set the image rescaling quality between 0 (low) and 100 (high). Higher means better quality. The recommended level is 60%-90%.'); ?>",
        "type": "number",
        "units": "<?php _e('%'); ?>",
        "default": 70,
        "presets": {
          "safe": 90
        }
      },
      {
        "name": "img_driver_avif",
        "title": "<?php _e('AVIF Handler'); ?>",
        "tooltip": "<?php _e('Method to deal with images: None (don\'t optimize), GD2 (built-in PHP library), ImageMagick (additional PHP library), or Command (external CLI tool).'); ?>",
        "type": "imgdriver",
        "values": [
          {
            "": "<?php _e('Default'); ?>"
          },
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "gd2": "<?php _e('GD2'); ?>"
          },
          {
            "imagick": "<?php _e('ImageMagick'); ?>"
          },
          {
            "exec": "<?php _e('Command'); ?>"
          }
        ],
        "default": "",
        "pro": 1
      },
      {
        "name": "img_exec_avif",
        "title": "<?php _e('AVIF Command'); ?>",
        "tooltip": "<?php _e('External (CLI) command to optimize AVIF images.'); ?>",
        "type": "text",
        "default": "",
        "pro": 1
      },
      {
        "name": "img_driver_png",
        "title": "<?php _e('PNG Handler'); ?>",
        "tooltip": "<?php _e('Method to deal with images: None (don\'t optimize), GD2 (built-in PHP library), ImageMagick (additional PHP library), or Command (external CLI tool).'); ?>",
        "type": "imgdriver",
        "values": [
          {
            "": "<?php _e('Default'); ?>"
          },
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "gd2": "<?php _e('GD2'); ?>"
          },
          {
            "imagick": "<?php _e('ImageMagick'); ?>"
          },
          {
            "exec": "<?php _e('Command'); ?>"
          }
        ],
        "default": "",
        "pro": 1
      },
      {
        "name": "img_exec_png",
        "title": "<?php _e('PNG Command'); ?>",
        "tooltip": "<?php _e('External (CLI) command to optimize PNG images.'); ?>",
        "type": "text",
        "default": "optipng -o7 {{TARGET}}",
        "pro": 1
      },
      {
        "name": "img_driver_gif",
        "title": "<?php _e('GIF Handler'); ?>",
        "tooltip": "<?php _e('Method to deal with images: None (don\'t optimize), GD2 (built-in PHP library), ImageMagick (additional PHP library), or Command (external CLI tool).'); ?>",
        "type": "imgdriver",
        "values": [
          {
            "": "<?php _e('Default'); ?>"
          },
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "gd2": "<?php _e('GD2'); ?>"
          },
          {
            "imagick": "<?php _e('ImageMagick'); ?>"
          },
          {
            "exec": "<?php _e('Command'); ?>"
          }
        ],
        "default": "",
        "pro": 1
      },
      {
        "name": "img_exec_gif",
        "title": "<?php _e('GIF Command'); ?>",
        "tooltip": "<?php _e('External (CLI) command to optimize GIF images.'); ?>",
        "type": "text",
        "default": "gifsicle --batch {{TARGET}}",
        "pro": 1
      },
      {
        "name": "img_driver_svg",
        "title": "<?php _e('SVG Handler'); ?>",
        "tooltip": "<?php _e('Method to deal with images: None (don\'t optimize), GD2 (built-in PHP library), ImageMagick (additional PHP library), or Command (external CLI tool).'); ?>",
        "type": "imgdriver",
        "values": [
          {
            "": "<?php _e('Default'); ?>"
          },
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "exec": "<?php _e('Command'); ?>"
          }
        ],
        "default": "none",
        "pro": 1
      },
      {
        "name": "img_exec_svg",
        "title": "<?php _e('SVG Command'); ?>",
        "tooltip": "<?php _e('External (CLI) command to optimize SVG images.'); ?>",
        "type": "text",
        "default": "svgo {{TARGET}} -o {{TARGET}}",
        "pro": 1
      }
    ]
  },
  {
    "id": "modern-image-format",
    "title": "<?php _e('Serve images in next-gen formats'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "img_webp",
        "title": "<?php _e('Convert to WebP'); ?>",
        "tooltip": "<?php _e('Automatically convert images to WebP format for browsers that support it.'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "optimal": 1,
          "ultra": 1,
          "experimental": 1
        }
      },
      {
        "name": "img_avif",
        "title": "<?php _e('Convert to AVIF'); ?>",
        "tooltip": "<?php _e('Automatically convert images to AVIF format for browsers that support it.'); ?>",
        "type": "checkbox",
        "default": 0,
        "pro": 1,
        "presets": {
          "optimal": 1,
          "ultra": 1,
          "experimental": 1
        }
      }
    ]
  },
  {
    "id": "uses-responsive-images",
    "title": "<?php _e('Properly size images'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "img_srcset",
        "title": "<?php _e('Generate srcset'); ?>",
        "tooltip": "<?php _e('Generate srcset attribute for images.'); ?>",
        "type": "checkbox",
        "default": 1,
        "pro": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "img_srcsetwidth",
        "title": "<?php _e('Srcset Widths'); ?>",
        "tooltip": "<?php _e('List of srcset widths to generate.'); ?>",
        "type": "text",
        "default": "360,720,1080,1284,1440,1920",
        "pro": 1
      }
    ]
  },
  {
    "id": "offscreen-images",
    "title": "<?php _e('Defer offscreen images'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "lazyload_method",
        "title": "<?php _e('Lazy Loading Method'); ?>",
        "tooltip": "<?php _e('You can disable lazy loading or choose between native browser\'s lazy loading and JavaScript-based advanced lazy loading.'); ?>",
        "type": "select",
        "values": [
          {
            "": "<?php _e('Disabled'); ?>"
          },
          {
            "native": "<?php _e('Native'); ?>"
          },
          {
            "js": "<?php _e('JavaScript'); ?>"
          }
        ],
        "default": "native"
      },
      {
        "name": "img_lazyload",
        "title": "<?php _e('Lazy Load Images'); ?>",
        "tooltip": "<?php _e('Lazy load images with the Lazy Load XT script. Significantly speeds up the loading of image and/or video-heavy webpages.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "img_lazyload_video",
        "title": "<?php _e('Lazy Load videos'); ?>",
        "tooltip": "<?php _e('Lazy load videos with the Lazy Load XT script.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "img_lazyload_iframe",
        "title": "<?php _e('Lazy Load Iframes'); ?>",
        "tooltip": "<?php _e('Lazy load iframes with the Lazy Load XT script.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "img_lazyload_lqip",
        "title": "<?php _e('Low-quality Image Placeholders'); ?>",
        "tooltip": "<?php _e('Use low-quality image placeholders instead of empty areas.'); ?>",
        "type": "select",
        "values": [
          {
            "none": "<?php _e('None'); ?>"
          },
          {
            "full": "<?php _e('Image'); ?>"
          },
          {
            "low": "<?php _e('Gradient'); ?>"
          }
        ],
        "default": "low"
      },
      {
        "name": "img_lazyload_embed",
        "title": "<?php _e('Inline Low-quality Images'); ?>",
        "tooltip": "<?php _e('Inline low-quality images to avoid extra network requests.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "img_lazyload_edgey",
        "title": "<?php _e('Vertical Lazy Loading Threshold'); ?>",
        "tooltip": "<?php _e('Expand the visible page area (viewport) in vertical direction by specified amount of pixels, so that images start to load even if they are not actually visible yet.'); ?>",
        "type": "number",
        "units": "<?php _e('px'); ?>",
        "default": 0,
        "presets": {
        }
      },
      {
        "name": "img_lazyload_skip",
        "title": "<?php _e('Skip First Images'); ?>",
        "tooltip": "<?php _e('Skip lazy loading of specified number of images from the beginning of an HTML page (useful for logos and other images that are always visible in the above-the-fold area).'); ?>",
        "type": "number",
        "default": 3,
        "presets": {
          "safe": 10,
          "ultra": 1,
          "experimental": 0
        }
      },
      {
        "name": "img_lazyload_noscript",
        "title": "<?php _e('Noscript Position'); ?>",
        "tooltip": "<?php _e('Position to insert the original image wrapped in a noscript tag for browsers with disabled JavaScript (may be useful if your image styles rely on CSS selectors :first or :last). To not generate noscript tags, set this option to \'None\'.'); ?>",
        "type": "select",
        "values": [
          {
            "after": "<?php _e('After'); ?>"
          },
          {
            "before": "<?php _e('Before'); ?>"
          },
          {
            "none": "<?php _e('None'); ?>"
          }
        ],
        "default": "after"
      }
    ]
  },
  {
    "id": "lcp-lazy-loaded",
    "title": "<?php _e('Largest Contentful Paint image was lazily loaded'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "prioritize-lcp-image",
    "title": "<?php _e('Preload Largest Contentful Paint image'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "unused-javascript",
    "title": "<?php _e('Reduce unused JavaScript'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "efficient-animated-content",
    "title": "<?php _e('Use video formats for animated content'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "unsized-images",
    "title": "<?php _e('Image elements have explicit width and height'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "img_size",
        "title": "<?php _e('Set width/height'); ?>",
        "tooltip": "<?php _e('Ensure all images have width and height attributes to avoid layout shift.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      }
    ]
  },
  {
    "id": "non-composited-animations",
    "title": "<?php _e('Avoid non-composited animations'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "bootup-time",
    "title": "<?php _e('JavaScript execution time'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "js_widgets",
        "title": "<?php _e('Optimize Integrations (Facebook, Twitter, etc.)'); ?>",
        "tooltip": "<?php _e('Optimize the loading of popular JavaScript widgets like integrations with Facebook, Twitter, Google Plus, Gravatar etc.'); ?>",
        "type": "checkbox",
        "default": 1,
        "presets": {
          "safe": 0
        }
      },
      {
        "name": "js_widgets_delay_async",
        "title": "<?php _e('Delay Async Scripts'); ?>",
        "tooltip": "<?php _e('Delay loading of all asynchronous JavaScripts.'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "experimental": 1
        }
      },
      {
        "name": "js_widgets_delay_scripts",
        "title": "<?php _e('Delay Scripts'); ?>",
        "tooltip": "<?php _e('Delay loading of specified JavaScripts.'); ?>",
        "type": "checkbox",
        "default": 0,
        "presets": {
          "experimental": 1
        }
      },
      {
        "name": "js_widgets_delay_scripts_list",
        "title": "<?php _e('Delay Scripts List'); ?>",
        "tooltip": "<?php _e('Delay loading of the following JavaScripts (specify URL without protocol).'); ?>",
        "type": "textarea",
        "default": "//connect.facebook.net/%LANG%/all.js\n//connect.facebook.net/%LANG%/sdk.js\n//platform.twitter.com/widgets.js\n//apis.google.com/js/api.js\n//apis.google.com/js/platform.js\n//apis.google.com/js/plusone.js\n//s.sharethis.com/loader.js\n//gravatar.com/js/gprofiles.js\n//s.gravatar.com/js/gprofiles.js\n//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\n//reactandshare.azureedge.net/plugin/rns.js"
      }
    ]
  },
  {
    "id": "dom-size",
    "title": "<?php _e('Avoids an excessive DOM size'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "remove_objects",
        "title": "<?php _e('Remove Embedded Plugins'); ?>",
        "tooltip": "<?php _e('Remove all embedded plugins like Flash, ActiveX, Silverlight, etc.'); ?>",
        "type": "checkbox",
        "default": 1
      }
    ]
  },
  {
    "id": "viewport",
    "title": "<?php _e('Has a meta viewport tag with width or initial-scale'); ?>",
    "type": "speed",
    "items": [
      {
        "name": "viewport_width",
        "title": "<?php _e('Viewport Width'); ?>",
        "tooltip": "<?php _e('Viewport width in pixels. Set to 0 (zero) to use the device screen width (default).'); ?>",
        "type": "number",
        "units": "<?php _e('px'); ?>",
        "default": 0,
        "presets": {
        }
      }
    ]
  },
  {
    "id": "legacy-javascript",
    "title": "<?php _e('Avoid serving legacy JavaScript to modern browsers'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "duplicated-javascript",
    "title": "<?php _e('Remove duplicate modules in JavaScript bundles'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "third-party-summary",
    "title": "<?php _e('Minimize third-party usage'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "third-party-facades",
    "title": "<?php _e('Lazy load third-party resources with facades'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "mainthread-work-breakdown",
    "title": "<?php _e('Minimize main-thread work'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "no-document-write",
    "title": "<?php _e('Avoids document.write()'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "interactive",
    "title": "<?php _e('Time to Interactive'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "max-potential-fid",
    "title": "<?php _e('Max Potential First Input Delay'); ?>",
    "type": "speed",
    "items": [
    ]
  },
  {
    "id": "uses-passive-event-listeners",
    "title": "<?php _e('Does not use passive listeners to improve scrolling performance'); ?>",
    "type": "speed",
    "items": [
    ]
  }
]