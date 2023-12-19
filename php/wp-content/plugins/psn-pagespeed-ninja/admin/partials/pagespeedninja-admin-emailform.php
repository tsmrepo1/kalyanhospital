<?php
/**
 * PageSpeed Ninja
 * https://pagespeed.ninja/
 *
 * @version    1.1.1
 * @license    GNU/GPL v2 - http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright  (C) 2016-2023 PageSpeed Ninja Team
 * @date       December 2023
 */
defined('ABSPATH') || die();

/** @var array $config */
/** @var PagespeedNinja_View $this */

if (!empty($config['email'])) {
    return;
}

global $current_user;
?>
<div class="pagespeedninja pagespeedninja-emailform">
<div id="pagespeedninja_emailform_popup">
    <div id="pagespeedninja_emailform">
        <form action="<?php echo esc_html(admin_url('options.php')); ?>" method="post">
            <?php settings_fields('pagespeedninja_config'); ?>
            <span>🚨 <?php _e('Please register to receive timely security and performance updates!'); ?></span>
            <span><input type="email" name="pagespeedninja_config[email]" value="<?php echo esc_attr($current_user->user_email); ?>" placeholder="<?php _e('Email address'); ?>" /></span>
            <span><input type="submit" value="<?php _e('Register'); ?>" /></span>
        </form>
    </div>
</div>
<div id="pagespeedninja_emailform_popup_filler"></div>
</div>