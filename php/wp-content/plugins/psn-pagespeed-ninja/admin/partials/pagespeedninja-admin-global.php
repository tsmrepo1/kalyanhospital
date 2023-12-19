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

foreach ($options as $section) {
    /** @var array {$section->items} */
    if (!isset($section->items) || count($section->items) === 0) {
        continue;
    }
    $items = array();
    foreach ($section->items as $item) {
        if (!empty($item->global)) {
            $items[] = $item;
        }
    }
    $section->items = $items;
}

?><script>
    var pagespeedninja_version='<?php echo $this->admin->get_version(); ?>';
</script>
<div class="pagespeedninja pagespeedninja-global">
<div id="psnwrap">
    <div id="pagespeedninja-content">
        <div class="headerbar">
            <a href="#" class="button save disabled" title="<?php esc_attr_e('Save changes'); ?>"><?php _e('Save'); ?></a>
            <div class="logo"></div>
        </div>
        <div class="tabs">
            <a href="#" class="active"><?php _e('Global'); ?></a>
        </div>

        <div class="main column-wide tooltip-container">
            <form id="pagespeedninja_form" action="<?php echo esc_html(network_admin_url('admin.php?page=pagespeedninja_global')); ?>" method="post">
                <input type="hidden" name="action" value="update" />
                <?php wp_nonce_field('pagespeedninja_config'); ?>

                <?php
                /** @var stdClass $section */
                /** @var array {$section->items} */
                foreach ($options as $section) :
                    if (isset($section->items) && count($section->items) === 0) {
                        continue;
                    }
                    ?>
                    <div>
                        <div class="header">
                            <div class="expando open"></div>
                            <div class="title"><?php echo $section->title; ?></div>
                        </div>
                        <div class="content show">
                        <?php
                            foreach ($section->items as $item) {
                                switch ($item->type) {
                                    case 'hidden':
                                    case 'subsection':
                                        break;
                                    default:
                                        $class = 'line';
                                        if (isset($item->pro)) {
                                            $class .= ' pro';
                                        }
                                        ?><div class="<?php echo $class; ?>"><?php
                                        $this->title($item->title, isset($item->tooltip) ? $item->tooltip : '');
                                        $this->render($item->type, isset($item->name) ? $item->name : '', $config, $item);
                                        ?></div><?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>

</div>
</div>