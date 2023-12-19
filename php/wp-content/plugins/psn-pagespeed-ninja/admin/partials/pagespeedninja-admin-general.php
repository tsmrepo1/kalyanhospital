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

$plugin_dir = dirname(dirname(__DIR__));
$options = $this->loadJsonPhp($plugin_dir . '/includes/options.json.php');
$options = apply_filters('psn_options_loaded', $options);

global $current_user;
?><script>
    var pagespeedninja_version='<?php echo $this->admin->get_version(); ?>';
</script>
<div class="pagespeedninja pagespeedninja-general">
<div id="psnwrap">
    <form action="<?php echo esc_html(admin_url('options.php')); ?>" method="post" id="pagespeedninja_form">
        <?php settings_fields('pagespeedninja_config'); ?>
        <?php $this->hidden($config, 'apikey'); ?>
        <?php $this->hidden($config, 'css_abovethefoldlocal'); ?>
        <?php $this->hidden($config, 'css_abovethefoldstyle'); ?>
        <?php /* @TODO ATF-CSS should be updated automatically after homepage content is changed */ ?>
        <?php
            foreach ($options as $section) {
                if (isset($section->id, $section->items) && count($section->items)) {
                    $this->hidden($config, 'psi_' . $section->id);
                }
            }
        ?>
    </form>

    <div id="pagespeedninja-content">
        <div class="headerbar">
            <a href="#" class="button save disabled" title="<?php esc_attr_e('Save changes'); ?>"><?php _e('Save'); ?></a>
            <div class="logo"></div>
        </div>
        <div class="tabs">
            <a href="#" class="active general"><?php _e('General'); ?></a><?php /* @todo Why not direct links??? */ ?>
            <a href="#" class="advanced"><?php _e('Advanced'); ?></a>
        </div>
        <!--div class="preview">
            <div class="iframe">
                <iframe src="about:blank" sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts"></iframe>
            </div>
            <a class="dragger closed">preview</a>
            <div class="overlay_fix"></div>
        </div!-->
        <div class="main tooltip-container">
            <?php $this->load('admin-probanner', $config); ?>
            <?php foreach (array('desktop' => __('Desktop'), 'mobile' => __('Mobile')) as $mode => $title) : ?>
            <div class="column" id="<?php echo $mode; ?>">
                <h2>
                    <?php echo $title; ?>
                    <div class="gps_result_orig"><span class="gps_loading" id="pagespeed_<?php echo $mode; ?>_orig" title="<?php esc_attr_e('Original score'); ?>">&nbsp;</span></div>
                    <div class="gps_result"><span class="gps_loading" id="pagespeed_<?php echo $mode; ?>" title="<?php esc_attr_e('Current score'); ?>">&nbsp;</span></div>
                    <div class="gps_result_new hide"><a href="#" class="thickbox"><span id="pagespeed_<?php echo $mode; ?>_new" title="<?php esc_attr_e('Estimated new score (click to test website in popup)'); ?>">&nbsp;</span></a></div>
                </h2>
                <div id="<?php echo $mode; ?>-should-fix" class="hide">
                    <h3><?php _e('Should Fix'); ?></h3>
                </div>
                <div id="<?php echo $mode; ?>-consider-fixing" class="hide">
                    <h3><?php _e('Consider Fixing'); ?></h3>
                </div>
                <div id="<?php echo $mode; ?>-passed" class="hide">
                    <h3><?php _e('Passed'); ?></h3>
                </div>
                <div id="<?php echo $mode; ?>-waiting">
                    <?php
                    foreach ($options as $section) :
                        if (isset($section->id, $section->type, $section->items) && $section->type === 'speed' && count($section->items) > 0) :
                            $id = $mode . '_' . $section->id;
                            $is_pro = false;
                            foreach ($section->items as $item) {
                                if (isset($item->pro)) {
                                    $is_pro = true;
                                    break;
                                }
                            }
                            ?>
                            <div id="<?php echo $id; ?>">
                        <div class="header"<?php echo $is_pro ? ' data-html-tooltip-ref="psnprobanner"' : ''; ?>>
                            <div class="title"><?php echo $section->title; ?></div>
                            <div class="field" data-html-tooltip-ref="psncolordesctooltip"><?php $this->checkbox('pagespeedninja_config_' . $id, $id); ?></div>
                        </div>
                    </div>
                            <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
            <?php endforeach; ?>
            <div id="psnprobanner" data-html-tooltip>
                🚨 <?php printf(__('Some features in this settings group are only available in %s'),
                    '<a href="https://pagespeed.ninja/download/?utm_source=psnbackend-popupbanner&amp;utm_medium=General-tab-upgrade&amp;utm_campaign=Admin-upgrade" target="_blank">PageSpeed Ninja Pro</a>'
                ); ?>
            </div>
            <div id="psncolordesctooltip" data-html-tooltip data-html-tooltip-pos="top">
                <?php _e("Color of the enabled switch depends on how it affects PageSpeed Insights score."); ?><br>
                <b><span style="color:#7ed321"><?php _e("Green:"); ?></span></b>
                <?php _e("improves the score."); ?><br>
                <b><span style="color:#fda100"><?php _e("Orange:"); ?></span></b>
                <?php _e("a minor or no effect on the score."); ?><br>
                <b><span style="color:#d0021b"><?php _e("Red:"); ?></span></b>
                <?php _e("negatively affects the score."); ?><br>
                <?php _e("Note that some settings have interrelated effects, so other switches may also change color."); ?>
            </div>
        </div>
    </div>
</div>
</div>