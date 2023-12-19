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

if (apply_filters('psn_is_pro', false)) {
    return;
}

?>
<style>
    #psn-pro-banner {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        column-gap: 2rem;
        padding: 1rem 2rem;
        background-color: #fff8f0;
        border: 2px solid #fbe9dd;
        border-radius: 0.25rem;
        margin-bottom: 2rem;
        font-weight: 400;
        position: sticky;
        top: 40px;
        z-index: 4;
        text-align: center;
        line-height: 1.75;
    }
    #psn-pro-banner a {
        display: inline-block;
        padding: 0.65rem 2rem;
        color: #fff;
        background-color: #E24B5D;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        cursor: pointer;
        border: 1px solid #DCDCDE;
        font-weight: 600;
        -webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.15);
        box-shadow: 0 2px 4px rgba(0,0,0,0.15);
        text-transform: uppercase;
        text-decoration: none;
        line-height: 1;
    }
</style>
<div id="psn-pro-banner">
    <span><?php printf(__('Upgrade to %s and Unlock Exclusive Features'), '<b style="color:#E24B5D">PageSpeed Ninja Pro</b>'); ?></span>
    <a href="https://pagespeed.ninja/download/?utm_source=psnbackend&utm_medium=Pro-Banner&utm_campaign=pro-banner-upgrade" target="_blank"><?php _e('UPGRADE'); ?></a>
</div>