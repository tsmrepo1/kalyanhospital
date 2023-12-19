=== PageSpeed Ninja ===

Stable tag: 1.1.1
Requires at least: 4.6
Tested up to: 6.4.1
Requires PHP: 5.6
Contributors: pagespeed
Tags: critical css, minify css, minify javascript, convert webp, defer css javascript, core web vitals, convert avif, optimize images, lazy load, caching, pagespeed, performance
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Unleash lightning fast page speed performance in a single click: Image, CSS, JS optimization, Lazy Loading, Compression, Caching, and more!


== Description ==

**PageSpeed Ninja** is the ultimate WordPress performance plugin, dedicated to improving the loading speed of your website on both desktop and mobile platforms. This plugin effortlessly addresses Google PageSpeed Insights issues and significantly improves Core Web Vitals — all with a single click.

This tool offers a range of features designed to optimize your website's speed:

- **Enabling Compression:** Implement Gzip and Brotli compression for faster load times.
- **Resolve Render-Blocking Issues:** Address render-blocking CSS and JavaScript issues to streamline loading.
- **Enhancing Critical Rendering Path:** Automatically generate critical CSS for above-the-fold content to improve the critical rendering path.
- **Minification:** Reduce load size by minifying HTML, JavaScript, and CSS files.
- **Resource Bundling:** Combine and inline resources for JavaScript and CSS to reduce server requests.
- **Deferred Loading:** Prioritize content rendering by deferring CSS and JavaScript loading.
- **Image Optimization:** Improve loading speed with optimized image formats.
- **Efficient Image Formats:** Convert images to WebP format for faster performance.
- **Lazy Loading:** Optimize initial load with image lazy loading and optional low-quality placeholders.
- **Optimized Google Fonts:** Streamline Google Fonts loading for quicker rendering.
- **Cache Leveraging:** Utilize browser and server-side caching for improved performance.
- Benefit from 10+ years of experience optimizing 200,000+ mobile-friendly websites to offer even more enhancements, including next-generation image formats, caching, and a suite of front-end and back-end performance improvements.

This plugin is your go-to solution for reducing load times, improving SERP optimization, and boosting overall website speed, making it an essential tool for performance optimization and SEO.

### Why Choose PageSpeed Ninja?

Are you looking to improve your website's performance and Google search rankings? PageSpeed Ninja excels in core web vitals and SEO optimization. For over a decade, we've been at the forefront of mobile web optimization. You might be familiar with one of our popular projects, [Lazy Load XT](https://github.com/ressio/lazy-load-xt) on GitHub. PageSpeed Ninja for WordPress represents our extensive expertise gained from optimizing the performance of over 200,000 websites on mobile devices. We believe you won't find a similar, user-friendly, all-in-one solution for boosting the performance your website.

Benefit from our suite of unique features meticulously designed to turbocharge your site's loading speed. From innovative critical CSS generation for above-the-fold content to implementation of tagged page caching, we ensure lightning-fast load times that improve critical performance metrics such as Largest Contentful Paint (LCP), Cumulative Layout Shift (CLS), and more.

Your feedback matters! Share your questions, insights, and suggestions as we continue to prioritize website usability and performance improvements.

### Before You Install

Our statistics indicate that the plugin improves the speed of 4 out of 5 websites. However, certain theme and plugin combinations, especially those related to caching and optimization, may lead to compatibility issues. Therefore, our plugin might not suit every website. To preview how PageSpeed Ninja could benefit your site, we've developed a simple tool that allows you to test it before installing it. **We highly recommend** that you visit [PageSpeed.Ninja](http://pagespeed.ninja) and run a test of your website beforehand. Please note: To accurately test your site on PageSpeed.Ninja, it's crucial to temporarily disable any optimizing plugins. This test requires raw data to apply its own optimization.

### Installation

1. Upload the plugin files to the `/wp-content/plugins/psn-pagespeed-ninja` directory, or install the plugin directly from the WordPress plugins screen. We highly recommend creating a backup of your site beforehand, just as you would before installing any new plugin.
2. Activate the plugin through the "Plugins" screen in the WordPress dashboard.
3. Select the optimization preset in the post-install pop-up window and click Save.
4. After installing the plugin, navigate to PageSpeed Ninja and adjust the optimization levels suggested by Google's PageSpeed Insights (**note that all optimizations are disabled by default**). The plugin will then optimize your images, JS and CSS files, and update .htaccess files to fix the issues identified by Google PageSpeed Insights.

### Features

#### Presets

In the ever-evolving realm of website optimization, time is crucial. People who own, design, or develop websites are constantly looking gor efficient ways to boost performance without getting bogged down in tweaking every single setting. This is precisely where the "Presets" feature of the PageSpeed Ninja plugin for WordPress comes in.

PageSpeed Ninja offers five different presets, each tailored to specific optimization needs:
- **Optimal** Preset suitable for the majority of websites,
- **Safe** Preset prioritizes compatibility,
- **Compact** Preset focuses on saving disk space,
- **Ultra** Preset aims for maximum optimization,
- and **Experimental** Preset reserved for testing new, possibly less stable features.

#### PageSpeed Ninja Settings Groups

PageSpeed Ninja organizes its settings into groups aligned with the Google PageSpeed Insight categories (such as "Initial server response time was short", Serve static assets with an efficient cache policy", etc.). Using the data from the Google PageSpeed Insight speed analysis, the plugin categorizes the settings groups into three distinct classes: Should Fix, Consider Fixing, and Passed.

Within the General settings, users can easily enable or disable each settings group (specific settings depend on the preset selected), and the Advanced settings page offers the flexibility to fine-tune all settings according to specific preferences.

Each switch in the settings interface is color-coded to reflect its impact on your website's PageSpeed Insights score:
- **Green**: Improves the score.
- **Orange**: Has minimal effect on the score.
- **Red**: Negatively affects the score.

Note that adjusting certain settings may cause related switches to change color due to their interrelated effects on performance.

#### Initial Server Response Time was Short

The "Initial server response time was short" feature within the PageSpeed Ninja plugin optimizes server responses by implementing efficient caching mechanisms. By using advanced page caching strategies, it reduces the server's response time to incoming requests. This optimization directly translates into faster load times for visitors, contributing to an improved user experience and potentially boosting search engine rankings due to better site performance metrics.

#### Serve Static Assets with an Efficient Cache Policy

The "Serve static assets with an efficient cache policy" feature of the PageSpeed Ninja plugin optimizes website performance by implementing an effective caching strategy for static resources. This feature refines the cache policy to improve browser caching for elements such as images, CSS, and JavaScript files. It maximizes caching efficiency by instructing the browser on the optimal duration to retain these assets, reducing server requests and accelerating page load times for returning visitors. By managing caching directives, it ensures that static resources remain stored in the user's browser cache for an extended period of time, minimizing the need for frequent re-downloads, and subsequently improving overall site speed and performance.

#### Enable Text Compression

The "Enable text compression" setting in the PageSpeed Ninja plugin optimizes website performance by using two powerful compression techniques: Gzip and Brotli compression. Gzip compression, a widely supported method, reduces the size of text-based files such as HTML, CSS, and JavaScript by compressing them before transmission, thereby speeding up website load times. Brotli compression, a newer and more efficient algorithm, further reduces file sizes and improves performance for modern browsers that support this advanced compression method. Enabling these settings ensures that textual content on the website is efficiently compressed, increasing overall speed and improving the user experience.

#### Preconnect to Required Origins

The "Preconnect to required origins" feature in the PageSpeed Ninja plugin optimizes website performance by initiating early connections to third-party origins, reducing latency and improving load times. Using DNS prefetching, it proactively resolves domain names for faster connections. By pre-establishing connections to essential domains such as CDNs or external APIs, it reduces handshake time, accelerating resource retrieval, and improving overall page speed and user experience.

#### Preload Key Requests

The "Preload key requests" setting within the PageSpeed Ninja plugin focuses on optimizing website load times by proactively preloading critical resources. This feature strategically identifies and preloads essential assets, such as fonts, scripts, or CSS files that are required for the initial page rendering process. By anticipating and fetching these key requests ahead of time, it significantly improves page speed and enhances the user experience. This setting harnesses the power of preload techniques to ensure vital elements are swiftly available, ultimately optimizing overall website performance.

#### Minify CSS

The "Minify CSS" settings within the PageSpeed Ninja plugin offer a robust set of tools designed to boost website performance by minimizing CSS files. These settings use advanced CSS minification techniques by using a CSS minifier to compress and optimize CSS resources. By reducing CSS size through meticulous compression, the plugin significantly improves page load times, ensuring efficient content delivery while reducing bandwidth usage. Through its comprehensive approach to CSS size reduction and use of cutting-edge CSS compression methods, the "Minify CSS" settings efficiently reduce file sizes and improve overall website speed, in line with the core goals of CSS resource optimization.

#### Minify JavaScript

The "Minify JavaScript" setting in the PageSpeed Ninja plugin provides powerful tools to optimize website performance by reducing JavaScript file sizes. This feature uses advanced JavaScript minification techniques, employing a JavaScript minifier to compress and condense code, improving load times and overall site speed. By enabling JS compression, Minify JavaScript helps to reduce JavaScript size, optimize script delivery and boost web page efficiency through effective Minify JS strategies.

#### Eliminate Render-Blocking Resources

The "Eliminate render-blocking resources" feature of the PageSpeed Ninja plugin significantly improves page loading speed by focusing on critical aspects of optimization. This feature uses various strategies such as Above-the-fold Critical CSS and Non-blocking JavaScripts to streamline the critical path for fast rendering of essential content. The plugin provides options to inline critical CSS and defer (asynchronously lazy load) non-essential CSS for improved performance. In addition, the plugin manages JavaScript by deferring or asynchronously loading scripts to improve the critical rendering path for a smoother and faster user experience.

#### Ensure Text Remains Visible During Webfont Load

The "Ensure text remains visible during webfont load" feature within the PageSpeed Ninja plugin prioritizes the visibility of text while web fonts are loading. It uses the "swap" mode for web fonts to ensure that a fallback font is displayed immediately, preventing a flash of invisible text (FOIT) or a flash of unstyled text (FOUT). Additionally, it optimizes the loading of Google Fonts, ensuring that content remains visible during the font-loading process. This optimization significantly improves the user experience and page performance.

#### Avoids Enormous Network Payloads

The "Avoids enormous network payloads" setting within the PageSpeed Ninja plugin includes several optimization techniques aimed at reducing excessive data transfer. It includes features such as CSS optimization, minifying HTML, bundling/merging CSS and JavaScript files, async script loading, HTML minification, and optimizing emoji loading. Together, these settings work to reduce file sizes, streamline resource delivery, and improve page loading speed by minimizing unnecessary network payloads, ensuring a more efficient and faster browsing experience for users.

#### Efficiently Encode Images

The "Efficiently encode images" settings within the PageSpeed Ninja plugin provide a comprehensive suite of image optimization tools. This feature allows users to fine-tune the optimization process by adjusting JPEG, WebP, and AVIF qualities to ensure efficient compression without compromising image integrity. With its range of customizable settings, it allows users to optimize and compress images to varying degrees, serving as a powerful picture optimizer. From fine-tuning JPEG compression to maximizing WebP quality, this tool serves as a robust image optimization resource, ensuring that web pages load quickly without compromising visual content quality.

#### Serve Images in Next-Gen Formats

The "Serve images in next-gen formats" feature, a core component of the PageSpeed Ninja plugin, is a key tool for optimizing website images. This feature facilitates the conversion of images into modern formats such as WebP, a next-gen image format known for its superior compression and quality attributes. This setting acts as an image converter, seamlessly converting existing image files into the WebP format, thereby improving website loading speed and performance. By leveraging the capabilities of WebP, this image conversion setting ensures optimal image delivery, promoting a more efficient and faster browsing experience for site visitors.

#### Defer Offscreen Images

The "Defer offscreen images" feature within the PageSpeed Ninja plugin offers various optimizations aimed at improving page load times by implementing lazy loading techniques. This feature delays the loading of images, videos, and iframes that are not immediately visible on the user's screen, using image lazyload methods to prioritize content above the fold. The plugin allows users to choose from two types of Low-Quality Image Placeholders (LQIPs): gradient placeholders and blurred low-quality placeholders. These placeholders are displayed in place of the actual images, providing a smoother initial load while the full-quality images load in the background, improving overall page speed and user experience.

#### Image Elements Have Explicit Width and Height

The "Image elements have explicit width and height" setting in the PageSpeed Ninja plugin focuses on optimizing the rendering of web pages by ensuring that all images have explicit width and height attributes. This optimization strategy aims to prevent layout shifts during page loading by specifying the exact dimensions for each image element and ensures that browsers pre-allocate space for images based on the provided dimensions, eliminating the need for recalculations when images load and significantly improving the user experience by minimizing visual disruptions caused by sudden layout changes.

#### JavaScript Execution Time

The "JavaScript execution time" setting in the PageSpeed Ninja plugin provides robust control over optimizing JavaScript to improve site performance. It enables features like deferring critical JS to prioritize vital scripts for faster loading, optimizing integrations with platforms (like Facebook, Twitter, etc.) to streamline their scripts' loading mechanisms, and delaying the loading of all asynchronous JavaScripts to prevent potential bottlenecks. Additionally, it allows for the selective delay of loading of specific JavaScripts in Advanced settings, providing precise management of resource loading for improved overall website speed and efficiency.

#### Avoids an Excessive DOM Size

The "Avoids an excessive DOM size" setting within the PageSpeed Ninja plugin focuses on optimizing webpage performance by reducing the Document Object Model (DOM) size. Currently, this is accomplished by eliminating embedded plugins such as Flash, ActiveX, Silverlight. This process result in faster page rendering and a better user experience. In additional, ongoing development may introduce further optimization techniques to trim excess DOM elements and improve overall website speed and efficiency.

#### Has a Meta Viewport Tag with width or initial-scale

The "Has a meta viewport tag with width or initial-scale" feature within the PageSpeed Ninja plugin optimizes web pages by ensuring that they contain an important meta viewport tag. This tag is crucial for improving mobile responsiveness and overall user experience. Including this tag allows web content to properly scale and adapt to different devices and screen sizes, ultimately optimizing the page for seamless viewing across a range of devices.

#### Advanced Settings

The Advanced Settings page within the PageSpeed Ninja plugin serves as a central hub for users seeking more control over their website optimization. This feature-rich section not only allows users to fine-tune settings according to their preferences but also facilitates efficient cache management and provides troubleshooting capabilities. With the ability to delve into intricate configurations, users can adjust specific parameters to tailor the plugin's performance optimization precisely to their website's requirements. This comprehensive suite of advanced options exemplifies the plugin's commitment to providing users with granular control over their website's speed optimization while ensuring effortless cache management.

### Free License Key

Starting from November 2023, PageSpeed Ninja requires a free license key for connectivity to our servers. This important update promises improved server load balancing, a critical measure to prevent resource exhaustion and ensure uninterrupted performance. You can get your free license key by visiting https://pagespeed.ninja/download/.

### PageSpeed Ninja Pro

PageSpeed Ninja Pro is a powerful WordPress plugin designed to optimize website performance through a range of advanced features. It drastically reduces load times with its fast advanced page caching and multithreading background optimization, image optimization features that include properly sizing images and AVIF format support. The plugin excels in efficient CLI asset optimization through minification tools such as UglifyJS for JavaScripts, CSSO for stylesheets, JPEGOptim/OptiPNG/GIFsicle for images, and many others, ensuring reduced load times. Its DNS Prefetch and Preload Assistants fine-tune site responsiveness. Notably, it allows users to self-host and optimize external resources like Google Analytics and offers robust backup/restore capabilities, culminating in a comprehensive solution for turbocharging website performance.

**[Get PRO with PageSpeed.Ninja](https://pagespeed.ninja/download/)**

### Uninstallation

When you delete the plugin, it will automatically revert all settings on your site to the original state as they were before this plugin was installed. During this process, the "/s" directory containing optimized files will be removed any changes made to ".htaccess" files will be undone. Please note that uninstalling the plugin will remove all data associated with the plugin, including settings and logs.

### Feedback, Bug Reports, and Logging Possible Issues

We value your input! If you have any questions, suggestions, or encounter issues related to site speed optimization, we encourage you to contact us at hello@pagespeed.ninja. Whether you're a user, developer, or tester, your feedback is essential to improving our services.

To facilitate troubleshooting and improvements, PageSpeed Ninja offers error logging capabilities. You can enable this feature in the Advanced tab of the PageSpeed Ninja settings. If you encounter any problems, you can help us in resolving them by providing us with the relevant error log file. This error log can be found in `wp-content/plugins/psn-pagespeed-ninja/includes/error_log.php` (note: the generated error log is a text file, not a PHP file). If you encounter any issues or anomalies, please consider sending us this error log file for further analysis and resolution. Your assistance will help us improve your experience with PageSpeed Ninja.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/psn-pagespeed-ninja` directory, or install the plugin directly from the WordPress plugins screen. We highly recommend creating a backup of your site beforehand, just as you would before installing any new plugin.
2. Activate the plugin through the "Plugins" screen in the WordPress dashboard.
3. Select the optimization preset in the post-install pop-up window and click Save.
4. After installing the plugin, navigate to PageSpeed Ninja and adjust the optimization levels suggested by Google's PageSpeed Insights (**note that all optimizations are disabled by default**). The plugin will then optimize your images, JS and CSS files, and update .htaccess files to fix the issues identified by Google PageSpeed Insights.


== Frequently Asked Questions ==

= Does this plugin have any conflicts with Yoast or any of the other SEO plugins out there? =

The PageSpeed Ninja plugin should work pretty well with most other plugins without issues. However, if some SEO plugins try to do some of the same things as this plugin, then conflicts could be possible especially if gzip compression is enabled. However, that is pretty unlikely.

= Is PageSpeed Ninja compatible with all WordPress themes and plugins?

While PageSpeed Ninja strives to be compatible with a wide range of themes and plugins, there are rare cases where conflicts may occur. It's important to test the plugin in your specific setup and contact the plugin support for assistance.

= Can PageSpeed Ninja guarantee a perfect PageSpeed score?

PageSpeed Ninja offers powerful optimization features, but achieving a perfect PageSpeed score depends on many factors, including your website's structure, hosting environment, and content. The plugin significantly improves performance, but individual scores may vary.

= Can I revert optimizations made by PageSpeed Ninja?

Yes, PageSpeed Ninja allows you to undo optimizations through the plugin's settings. However, it's important to note that undoing optimizations can affect your website's performance and PageSpeed score. As a last resort, you can uninstall the plugin; this process will remove all files associated with the plugin.

= How often should I update the plugin?

It's recommended that you keep PageSpeed Ninja updated to the latest version to benefit from bug fixes, improvements, and compatibility updates. Regularly updating the plugin ensures optimal performance and compatibility with your WordPress installation.


== Screenshots ==

1. See improvement suggestions in one place and fix with single click
2. Fine tune to get the best performance using advanced settings


== Upgrade Notice ==

None


== Changelog ==

= 1.1.1 Stable Release [30 November 2023] =
- Added "Mobile Cache" feature [Pro]
- Fixed processing of "template" tag
- Fixed minor UI issues

= 1.1.0 Stable Release [28 November 2023] =
- Added support of converting CSS images to next-gen formats
- Added support of self-hosting webfonts [Pro]
- Added support of self-hosting CSS images [Pro]
- Updated UI
- Fixed minor UI issues
- Implemented performance optimizations

= 1.0.5 Stable Release [06 November 2023] =
- Fixed cleaning of .htaccess during plugin deactivation
- Fixed issue with images optimization [Free]

= 1.0.4 Stable Release [05 November 2023] =
- Fixed config regeneration during upgrade
- Fixed minor UI issues

= 1.0.3 Stable Release [01 November 2023] =
- Added Logging Level setting
- Fixed work of "Swap Webfonts" feature
- Fixed work of "Viewport Width" feature
- Improved merging of JS/CSS

= 1.0.2 Stable Release [25 October 2023] =
- Added processing of srcset attribute in URL loader [Pro]
- Fixed possible notice in srcset attribute optimization with PHP8

= 1.0.1 Stable Release [24 October 2023] =
- Fixed possible notice message in JsMin with PHP8
- Fixed issue empty script tags

= 1.0.0 Stable Release [22 October 2023] =
- Transition from RC to Stable
- Fixed possible warning "incorrect sRGB profile"

= 1.0.rc.7 Release Candidate [16 October 2023] =
- Fixed issue with saving of General settings
- Removed message "-1 days left" for Free license keys

= 1.0.rc.6 Release Candidate [08 October 2023] =
- Added different preview size in desktop and mobile columns
- Fixed display of estimated PageSpeed score

= 1.0.rc.5 Release Candidate [08 October 2023] =
- Fixed issue with saving settings on the General tab
- Fixed work of background processes during update [Pro]

= 1.0.rc.4 Release Candidate [05 October 2023] =
- Fixed working on servers with symlink disabled
- Fixed multisite global settings UI

= 1.0.rc.3 Release Candidate [04 October 2023] =
- Fixed update in multisite mode

= 1.0.rc.2 Release Candidate [03 October 2023] =
- Fixed processing of tagged cache updates with caching disabled

= 1.0.rc.1 Release Candidate [02 October 2023] =
- Added a notification message about the license key requirement for external Critical CSS generation
- Fixed API key validation
- Fixed aspect ratio of gradient LQIP images
- Fixed processing of noscript tags by DOM HTML parser
- Fixed chroma 4:2:0 support in PSN Pro
- Fixed minor UI issues

= 1.0.beta.2 Beta release [20 September 2023] =
- Added an admin bar menu with options to clear the page cache and update critical CSS
- Added new settings in the "Ensure text remains visible during webfont load" section: "Swap Web-fonts" and "Exclude Web-fonts"
- Added support for fonts.bunny.net in addition to fonts.google.com in the "Google Fonts Loading"
- Added new settings in the "JavaScript execution time" section: "Delay Async Scripts", "Delay Scripts", and "Delay Scripts List"
- Moved the cache directory to wp-content/uploads/psn-pagespeed-ninja to ensure cache preservation during updates
- Fixed UI issues
- Implemented performance optimizations

= 1.0.beta.1 Beta Release [28 July 2023] =
- Big code refactoring and bugfixes release
- Added API key support for external above-the-fold CSS generation
- Added tagged page cache support



= 0.9.45 Beta Release [22 February 2023] =
- Fixed anonymous statistics collection
- Updated AMDD database

= 0.9.44 Beta Release [17 November 2022] =
- Added "Global Above-the-fold CSS" option
- Updated AMDD database
- Fixed compatibility with PHP8
- Minor bugfixes

= 0.9.43 Beta Release [29 August 2020] =
- Fixed possible error during deactivation

= 0.9.42 Beta Release [29 August 2020] =
- Fixed conflict with AMP plugin
- Fixed issue with infinite loading animation for local websites

= 0.9.41 Beta Release [6 July 2020] =
- Fixed loading of PageSpeed Insights scores via API v5 (usability score is set to 100)
- Changed Google Fonts loading for "Flash of unstyled text" mode via display=swap

= 0.9.40 Beta Release [1 December 2019] =
- Fixed compatibility with PHP 7.4 in CSSTidy minifier

= 0.9.39 Beta Release [13 November 2019] =
- Fixed compatibility with WP 5.3
- Fixed URL parsing in "Optimize integrations"
- Fixed lazy image loading

= 0.9.38 Beta Release [30 April 2019] =
- Fixed issue with exclusion of JavaScript files
- Fixed issue with priority of template_redirect action handler (resulted in conflict with Smart Slider 3)
- Fixed issue with processing of AJAX requests
- Fixed issue with page caching for logged users
- Fixed issue with file cache cleaner in the case of large time-to-live value
- Fixed work of "Configure the viewport" setting
- Fixed work of libxml-based HTML optimizer
- Added new setting to enable/disable optimization for logged users
- Added file exclusion in "Non-blocking Javascript", "Optimize integrations", "Load external stylesheets", and "Load external scripts"
- Registering of new WP images sizes is applied to the "Fit" image rescaling method only

= 0.9.37 Beta Release [12 February 2019] =
- Fixed issue with Distribute Method: PHP

= 0.9.36 Beta Release [12 February 2019] =
- Fixed file permissions

= 0.9.35 Beta Release [12 February 2019] =
- Fixed issue with possible incorrect markup generation in DNS Prefetch and Google Fonts optimizations
- Fixed issue with WooCommerce caching
- Fixed issue with open_basedir enabled
- Updated AMDD device database for "Scale large images" feature
- Improved atomic file operations

= 0.9.34 Beta Release [21 December 2018] =
- Fixed version number in WordPress repository

= 0.9.33 Beta Release [21 December 2018] =
- Fixed issue in URL parser
- Fixed processing of inlined scripts in libxml-based HTML parser

= 0.9.32 Beta Release [29 November 2018] =
- Fixed processing of xml (e.g. in sitemap)
- Removed copyright headers from minified Lazy Load XT files
- Improvement of "Skip initialization scripts" setting

= 0.9.31 Beta Release [13 September 2018] =
- Fixed gzip compression for "headers sent" issue
- Fixed displaying of active preset name
- Fixed removing of empty directories in cache cleaner
- Fixed libxml HTML parser
- Added support of DONOTCACHEPAGE and DONOTMINIFY constants
- Improved performance of the Standard full HTML parser (Pharse library)
- Few minor fixes

= 0.9.30 Beta Release [16 July 2018] =
- Fixed conflict of "Manage CSS/Javascript URLs" and "Load external stylesheets/scripts" settings
- Fixed "Gzip compression" feature for cached pages
- Fixed internal caching TTL (detached from "Caching time-to-live" parameter)
- Automatic detection of gzip support during initial activation of the plugin

= 0.9.29 Beta Release [02 July 2018] =
- Fixed invalidation of expired page cache after clearing fragment cache
- Fixed invalidation of page cache after saving settings
- Fixed work with Beaver Builder and Massive Dynamic Builder
- Changed default cache time-to-live in presets
- "Generate srcset" feature is moved from experimental to stable

= 0.9.28 Beta Release [27 June 2018] =
- Fixed issue with image rescaling
- "Generate srcset" feature is moved from experimental to stable

= 0.9.27 Beta Release [25 June 2018] =
- Fixed external Above-the-fold CSS generation in backend
- Fixed issue with merging of non-existing files
- Fixed merging of JS/CSS URLs with hash-part in URL
- Fixed conflict with ob-handlers ordering
- Added experimental caching of optimized pages
- Added HTTPS support for all requests to pagespeed.ninja
- Added tooltips displaying for touch screens in Advanced tab
- Updated TidyCSS to ver. 1.5.7 from https://github.com/airyland/CSSTidy
- Updated presets
- Performance optimizations

= 0.9.26 Beta Release [14 June 2018] =
- Fixed "Flash of unstyled text" mode of Google Fonts loading
- Fixed position of the Support badge
- Fixed conflict with plugins that do ob_start() in 'template_redirect' action (by setting priority to 5)
- Fixed generation of absolute URLs in merged CSS files

= 0.9.25 Beta Release [09 May 2018] =
- Fixed javascript order with "Skip initialization scripts" option

= 0.9.24 Beta Release [08 May 2018] =
- Fixed URL quoting in CSS minification

= 0.9.23 Beta Release [07 May 2018] =
- Fixed Fast stream and libxml parsers
- Fixed work of Above-the-fold CSS with libxml parser

= 0.9.22 Beta Release [06 May 2018] =
- Fixed "Configure the viewport" feature
- Fixed "Load external files" feature
- Fixed clearing of Page Cache
- Fixed generation of above-the-fold CSS in the Advanced tab
- Fixed check for AMP pages
- Fixed processing of inlined <script> tags with CDATA wrapping
- Added new optimization feature: Skip initialization scripts
- Added support of Cache-Control:immutable header for generated files
- Updated AMDD database
- Default JPEG quality level is set to 85 (95 in Safe preset)
- Options to load external CSS and JS are moved to "Leverage browser caching" section

= 0.9.21 Beta Release [20 March 2018] =
- Fixed issue with editing of theme files
- Fixed loading and caching of external files
- Fixed backend rendering issues
- Fixed issue with onload/onerror attributes and async javascript loading
- Fixed issue with onload/onerror attributes and lazy image loading
- Fixed libxml HTML parser
- Fixed CSS parser
- Fixed URL minification in rel attribute of <link> tag (rel=stylesheet allowed only)
- Fixed gzip compression in the case of enabled ob_gzhandler
- Fixed uninstallation of advanced-cache.php
- Fixed issue with initialization of lazy image loading
- Fixed processing of "id" attribute in <script> tags
- Added select of preset in the after-install popup
- Added new settings preset: "Compact"
- Added descriptions for presets
- Improved compression of JPEG images
- Improved Troubleshooting section in Advanced settings
- Improved detection of the "Distribute method" after initial plugin activation
- Improved cleaning up of outdated cache files and directories
- Disabled optimization of AMP pages
- Disabled optimizations prior to apply profile preset

= 0.9.20 Beta Release [22 February 2018] =
- Fixed pre-check of free memory amount in GD image rescaling and optimizing
- Improved Imagick image compression
- Minor performance improvements
- Updated tooltips in Advanced settings

= 0.9.19 Beta Release [15 January 2018] =
- Fixed rebasing of CSS in the "Load external files" mode
- Fixed conflict of http and https caches
- Added option to merge embedded scripts and styles in <head> section only
- Added warning about conflict of advanced caching and WooCommerce

= 0.9.18 Beta Release [03 January 2018] =
- Fixed blank screen issue
- Fixed issue with incorrect URLs in optimized css files
- Improved Google Fonts loading

= 0.9.17 Beta Release [07 December 2017] =
- Fixed issue with Google Fonts loading

= 0.9.16 Beta Release [06 December 2017] =
- Caching of PageSpeed Insights scores
- Improved Google Fonts loading
- Fixed javascript processing in "Optimize integrations" feature
- Fixed lazy loading with some slider plugins
- Fixed issues with above-the-fold css and async css loading

= 0.9.15 Beta Release [15 November 2017] =
- Fixed issues with nonblocking CSS loader

= 0.9.14 Beta Release [14 November 2017] =
- Fixed merging of JavaScript
- Fixed merging of CSS
- Fixed CSS parser
- Fixed processing of @import in CSS optimizer
- Fixed parsing of <menu> tag in HTML5 parser
- Fixed nonblocking css and js in IE6-8
- Fixed lazy image loading in IE8
- Fixed conflict with few plugins that use lazy image loading
- Fixed issue with hidden switches in backend settings page
- Fixed conflict of the Masonry library and asynchronous css loading
- Added Autogeneration of srcset attribute for lazy image loading
- Added cache reset after post/page/attachment/theme changes
- Disabled optimization of comment feeds

= 0.9.13 Beta Release [10 October 2017] =
- Fixed backend interface
- Enabled optimizations by default
- Reset js/css cache after update

= 0.9.12 Beta Release [10 October 2017] =
- Fixed processing of @import rules in css files
- Fixed error in config reading
- Fixed Fatal error in libxml HTML parser
- Fixed Fatal error in loadATFCSS()

= 0.9.11 Beta Release [09 October 2017] =
- Fixed error message during uninstallation
- Fixed warning message in the case of disabled js and css minification
- Added lazy loading of iframes
- Updated presets
- Updated AMDD database
- Changed configuration file format to allow plugin to be translated to other languages

= 0.9.10 Beta Release [30 September 2017] =
- Fixed text domain slug
- Fixed issue with quoted keyframe name in css parser
- Fixed disabling of caching for logged-in users
- Fixed disabling of non-blocking js mode
- Improved estimation of required memory in image processing
- Reduced memory usage by css optimizer
- Switched remote connections to use download_url function

= 0.9.9 Beta Release [27 September 2017] =
- Marked as tested with WordPress 4.8.2
- Fixed undefined index in abovethefoldcss.php
- Removed unused jQLight option

= 0.9.8 Beta Release [27 September 2017] =
- Fixed render blocking issues
- Fixed image lazy loading with Fast simple HTML parser
- Fixed Google Fonts loading
- Added check of memory limit in image optimization and rescaling
- Added new lazy loading script (Lazy Load XT 2.0)
- Minor backend changes

= 0.9.7 Beta Release [06 September 2017] =
- Marked as tested with WordPress 4.8.1

= 0.9.6 Beta Release [05 September 2017] =
- Switched to native updating

= 0.9.5 Beta Release [27 August 2017] =
- Added optimization of srcset attribute in images
- Added support of HTTP/2 Server Push
- Fixed "Viewport width" feature
- Fixed "DNS prefetch" feature in the "Fast simple" HTML parser mode
- Fixed Google Font optimization

= 0.9.4 Beta Release [23 July 2017] =
- Added request to allow using of external pagespeed.ninja critical CSS service and to send usage data
- Removed update from versions prior to 0.8.23 (first public alpha release)
- Moved "Optimize Emoji loading" option to "Minify JavaScript" section

= 0.9.3 Beta Release [03 July 2017] =
- Fixed lazy image loading in the "stream" optimizer mode
- Improved settings page for small/medium screen width
- Colors of switches depend on diference between original and current scores
- Updated AMDD database

= 0.9.2 Beta Release [20 June 2017] =
- Added preview of results (without affecting website for other users)
- Added "Optimize Emoji Loading" feature
- Added "Google Fonts loading" feature
- Added "Skip first images" and "Noscript position" features to fine tune lazy image loading
- Added support of ImageMagick PHP extensions for image optimization
- Fixed processing of non-standard JPEG and PNG images
- Fixed CSS parser
- Fixed issue with merging of subsequent javascripts before </body>
- Fixed merging of Javascript and CSS in the "stream" optimizer mode
- Fixed merging of Javascript and CSS with "onload" attribute
- Fixed processing of <noscript> tags
- Fixed dnsprefetch generation
- Fixed timeout issue in the plugin activation
- Added set width and height attributes for lazy loading images
- Fixed loading of URLs starting with "//"
- Fixed settings page in older browsers
- Fixed several minor issues
- Improved performance of local above-the-fold css generation
- Google fonts are loaded synchronously by default
- Excluded Google Analytics from "Non-blocking Javascript" feature
- Default limits of inlined Javascript and CSS are set to 4096 bytes

= 0.9.1 Beta Release [07 April 2017] =
- Added "Clear Cache" and "Clear Database Cache" button to the Troubleshooting section
- Fixed Manage URLs feature in Troubleshooting section
- Fixed automatical cache clearing

= 0.9.0 Beta Release [04 April 2017] =
- New backend design
- "Troubleshooting" section in Advanced settings
- Fixed image lazy loading in "stream" html optimizer
- Fixed in-browser generation of above-the-fold css
- Fixed "Exclude files list" feature
- Added notification about unsaved changes
- Added notification about generated above-the-fold css
- Minor performance improvements
- Updated AMDD database

= 0.8.27 Alpha Release [01 December 2016] =
- Added server-side page caching implementation
- Fixed activation of image optimization and lazy loading settings
- Minor performance improvements
- Updated AMDD database

= 0.8.26 Alpha Release [08 November 2016] =
- Significant code refactoring
- Performance improvements
- Added "Experimental" preset
- Added loading animation for Google's Page Speed scores in backend
- Fixed PHP warnings in plugin activation/deactivation
- Fixed few Windows-related issues
- Removed "Avoid app install interstitials that hide content" section (removed by Google's Page Speed service)
- Moved image lazy loading settings to "Prioritize visible content" section

= 0.8.25 Alpha Release [07 October 2016] =
- Fixed few PHP warnings and notices
- Enabled logging for backend settings page and frontend pages only
- Added compatibility with caching plugins
- Added "Auto" option for "Load jQLight library" setting
- Other minor changes

= 0.8.24 Alpha Release [04 October 2016] =
- Added notice about compatibility with caching plugins
- Uninstall of the plugin deletes generated low-quality image placeholders and gzipped svg images

= 0.8.23 Alpha Release [21 September 2016] =
- Significant code refactoring
- Added error logging to includes/error_log.php
- Added "Low-quality image placeholders" setting
- Added "Vertical lazy loading threshold" setting
- Updated AMDD database
- Other minor changes

= 0.8.22 Alpha Release [14 July 2016] =
- First pre-public alpha release. Distributed privately.
