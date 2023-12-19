<?php
$support_email = 'support@pagespeed.ninja';
$email_link = '<a href="mailto:' . $support_email . '">' . $support_email . '</a>';
?>
<div id="psn-deactivation-survey-form-wrapper" style="display:none">
<form id="psn-deactivation-survey-form" method="POST">
    <p><?php esc_html_e("We're sorry to see you go. Please help us improve the PageSpeed Ninja plugin by letting us know why you're deactivating it. All feedback is anonymous and used solely to improve our services.", 'psn-pagespeed-ninja'); ?></p>
    <div><label>
        <input type="radio" name="psn-survey-option" value="1"> <?php esc_html_e("I'm only deactivating temporarily", 'psn-pagespeed-ninja'); ?>
    </label></div>
    <div><label>
        <input type="radio" name="psn-survey-option" value="2"> <?php esc_html_e('I no longer need the plugin', 'psn-pagespeed-ninja'); ?>
    </label></div>
    <div><label>
        <input type="radio" name="psn-survey-option" value="3"> <?php esc_html_e('I found a better plugin', 'psn-pagespeed-ninja'); ?>
        <div>
            <p><?php esc_html_e('What is the name of the plugin?', 'psn-pagespeed-ninja'); ?></p>
            <input type="text" name="psn-reason3">
        </div>
    </label></div>
    <div><label>
        <input type="radio" name="psn-survey-option" value="4"> <?php esc_html_e('The plugin broke my site', 'psn-pagespeed-ninja'); ?>
        <div>
            <p><?php printf(esc_html__("We're truly sorry for any inconvenience caused. Please contact us at %s and describe the problem in detail.", 'psn-pagespeed-ninja'), $email_link); ?></p>
        </div>
    </label></div>
    <div><label>
        <input type="radio" name="psn-survey-option" value="5"> <?php esc_html_e('The plugin suddenly stopped working', 'psn-pagespeed-ninja'); ?>
        <div>
            <p><?php printf(esc_html__("We're truly sorry for any inconvenience caused. Please contact us at %s and describe the problem in detail.", 'psn-pagespeed-ninja'), $email_link); ?></p>
        </div>
    </label></div>
    <div><label>
        <input type="radio" name="psn-survey-option"
               value="6"> <?php esc_html_e('Other reason', 'psn-pagespeed-ninja'); ?>
        <div>
            <p><?php esc_html_e('Please share any additional details or comments to help us better understand your experience.', 'psn-pagespeed-ninja'); ?></p>
            <textarea name="psn-reason6" rows="5"></textarea>
        </div>
    </label></div>
    <div class="psn-buttons">
        <a href="#" id="psn-survey-form-submit" disabled><?php esc_html_e('Submit & Deactivate', 'psn-pagespeed-ninja'); ?></a>
        <a href="#" id="psn-survey-form-cancel"><?php esc_html_e('Cancel', 'psn-pagespeed-ninja'); ?></a>
    </div>
</form>
</div>
<style>
    #psn-deactivation-survey-form {
        line-height: 2;
    }
    #psn-deactivation-survey-form p {
        margin: 0;
    }
    #psn-deactivation-survey-form label {
        margin: 0 0 0 1em;
    }
    #psn-deactivation-survey-form input[type="text"],
    #psn-deactivation-survey-form textarea {
        width: 100%;
        margin-bottom: 1em;
    }
    #psn-deactivation-survey-form input[type="radio"] + div {
        display: none;
        margin-left: 2.8em;
    }
    #psn-deactivation-survey-form input[type="radio"]:checked + div {
        display: block;
    }
    #psn-deactivation-survey-form .psn-buttons {
        margin-top: 1em;
    }
    #psn-deactivation-survey-form .psn-buttons a {
        display: inline-block;
        font-weight: bold;
        padding: 0.5em 2em;
        background-color: #a8aaad;
        color: #fff;
        font-size: larger;
        text-decoration: none;
    }
    #psn-survey-form-submit:not([disabled]) {
        background-color: #258aff;
    }
</style>
<script>
    jQuery(document).ready(function ($) {
        var keyHideSurvey = 'psn_dismiss_deactivate_survey';
        $('tr[data-slug="psn-pagespeed-ninja"] .deactivate a')
            .attr('id', 'deactivate-psn-pagespeed-ninja')
            .click(function (e) {
                var next = 'localStorage' in window && localStorage.getItem(keyHideSurvey);
                if (!e.ctrlKey && (!next || next < Date.now())) {
                    e.preventDefault();
                    tb_show('<?php echo addcslashes(__('PageSpeed Ninja Deactivation', 'psn-pagespeed-ninja'), "'"); ?>', 'TB_inline?inlineId=psn-deactivation-survey-form-wrapper');
                    $('#TB_window').css({display: 'flex', 'flex-direction': 'column', 'max-height': '40em'});
                    $('#TB_ajaxContent').css({width: '100%', height: 'auto', 'box-sizing': 'border-box'});
                }
            })
            .on('psn_submit_survey_form', function (e, params) {
                'localStorage' in window && localStorage.setItem(keyHideSurvey, Date.now() + 7 * 24 * 60 * 60);
                tb_remove();
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    dataType: 'json',
                    data: {
                        action: 'pagespeedninja_send_survey',
                        data: params.form.serialize(),
                        _wpnonce: '<?php echo wp_create_nonce('psn_send_survey'); ?>'
                    },
                    complete: function () {
                        location.href = e.target.href;
                    }
                });
            });
        jQuery('#psn-deactivation-survey-form input[type=radio]').click(function () {
            jQuery('#psn-survey-form-submit').removeAttr('disabled');
        });
        jQuery('#psn-survey-form-submit').click(function (e) {
            e.preventDefault();
            jQuery('#deactivate-psn-pagespeed-ninja').trigger('psn_submit_survey_form', {'form': jQuery('form.psn-deactivation-survey-form')});
        });
        jQuery('#psn-survey-form-cancel').click(function (e) {
            e.preventDefault();
            tb_remove();
        });
    });
</script>