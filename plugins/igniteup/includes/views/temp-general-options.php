<form action="options.php" method="post">
    <?php
    settings_fields('cscs_gener_options');
    do_settings_sections('cscs_gener_options');
    wp_enqueue_media();

    function check_checkboxes($isTrue) {
        echo $isTrue ? 'checked="checked"' : '';
    }
    ?>
    <div class="main-row">
        <div class="igniteup-options">
            <table class="form-table">
                <tr>
                    <th>
                        <label><?php _e('Enable / Disable', CSCS_TEXT_DOMAIN); ?></label>
                    </th>
                    <td>
                        <?php $cs_enable_name = CSCS_GENEROPTION_PREFIX . 'enable'; ?>
                        <label><input class="igniteup-checkbox-switch" type="checkbox" data-on-text="Enable" data-off-text="Disable" name="<?php echo $cs_enable_name; ?>" value="1" <?php check_checkboxes(get_option($cs_enable_name) == '1'); ?>> <?php _e('Enable Coming Soon or Site Offline', CSCS_TEXT_DOMAIN); ?></label>
                    </td>
                </tr>        

                <tr>
                    <th><label><?php _e('Skip Page For', CSCS_TEXT_DOMAIN); ?></label></th>
                    <td>
                        <?php
                        $skipfor = get_option(CSCS_GENEROPTION_PREFIX . 'skipfor');
                        $skip_for_array = empty($skipfor) ? array() : json_decode($skipfor, TRUE);
                        ?>
                        <label><input type="checkbox" class="skip_checkbox skip-switch" value="administrator" <?php check_checkboxes(in_array('administrator', $skip_for_array)); ?>><?php _e('Administrators', CSCS_TEXT_DOMAIN); ?></label>
                        <div class="clearfix"></div>
                        <label><input type="checkbox" class="skip_checkbox skip-switch" value="editor" <?php check_checkboxes(in_array('editor', $skip_for_array)); ?>><?php _e('Editors', CSCS_TEXT_DOMAIN); ?></label>
                        <div class="clearfix"></div>
                        <label><input type="checkbox" class="skip_checkbox skip-switch" value="subscriber" <?php check_checkboxes(in_array('subscriber', $skip_for_array)); ?>><?php _e('Subscribers', CSCS_TEXT_DOMAIN); ?></label>
                        <input type="hidden"  name="<?php echo CSCS_GENEROPTION_PREFIX . 'skipfor'; ?>" id="skip_for_value" value='<?php echo $skipfor; ?>'>
                        <p class="description"><?php _e('Select user roles to skip maintenance mode page.', CSCS_TEXT_DOMAIN); ?></p>
                    </td>
                </tr>

                <tr>
                    <th>
                        <label><?php _e('Enable 503 Status', CSCS_TEXT_DOMAIN); ?></label>
                    </th>
                    <td>
                        <?php $cs_status_name = CSCS_GENEROPTION_PREFIX . 'send_status'; ?>
                        <label><input type="checkbox" class="igniteup-checkbox-switch" name="<?php echo $cs_status_name; ?>" value="1" <?php check_checkboxes(get_option($cs_status_name, '1') == '1'); ?>> <?php _e('Enable 503 header response', CSCS_TEXT_DOMAIN); ?></label>
                        <p class="description"><?php _e('Enable status 503 header response in the page to notify search engines that your site is down for maintenance.', CSCS_TEXT_DOMAIN); ?></p>
                    </td>
                </tr>


                <tr>
                    <th><label><?php _e('Page Title', CSCS_TEXT_DOMAIN); ?></label></th>
                    <td>
                        <?php $pg_title_name = CSCS_GENEROPTION_PREFIX . 'cs_page_title'; ?>
                        <input type="text" class="regular-text" placeholder="<?php _e('Page Title', CSCS_TEXT_DOMAIN); ?>" name='<?php echo $pg_title_name; ?>' value='<?php echo get_option($pg_title_name); ?>'>
                        <p><?php _e('This will be the title of the coming soon page.', CSCS_TEXT_DOMAIN); ?></p>
                    </td>
                </tr>

                <tr>
                    <th><label><?php _e('Favicon', CSCS_TEXT_DOMAIN); ?></label></th>
                    <td>
                        <div class="uploader">
                            <?php $favicon_option_name = CSCS_GENEROPTION_PREFIX . 'favicon_url'; ?>
                            <input id="<?php echo $favicon_option_name; ?>" class="regular-text" name="<?php echo $favicon_option_name; ?>" type="text" value="<?php echo get_option($favicon_option_name, ''); ?>" />
                            <input id="<?php echo $favicon_option_name; ?>_button" class="button cscs_uploadbutton" data-input="<?php echo $favicon_option_name; ?>" type="submit" value="<?php _e('Upload', CSCS_TEXT_DOMAIN); ?>" />
                            <p class="description"><?php _e('Recommended size is 16x16 or 32x32. Use only ICO or PNG file.<br>May not be working if your theme or any other plugin is setting a favicon.', CSCS_TEXT_DOMAIN); ?></p>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th><label><?php _e('Custom CSS', CSCS_TEXT_DOMAIN); ?></label></th>
                    <td>
                        <textarea name="<?php echo CSCS_GENEROPTION_PREFIX . 'customcss'; ?>" cols="50" rows="7"><?php echo get_option(CSCS_GENEROPTION_PREFIX . 'customcss', ''); ?></textarea>
                        <p class="description"><?php _e('Use custom css to customize front end templates.', CSCS_TEXT_DOMAIN); ?></p>
                    </td>
                </tr>

                <tr>
                    <th><label><?php _e('Powered by IgniteUp', CSCS_TEXT_DOMAIN); ?></label></th>
                    <td>
                        <?php $cs_powered_by = CSCS_GENEROPTION_PREFIX . 'powered_by'; ?>
                        <label><input type="checkbox" class="igniteup-checkbox-switch" data-on-text="Show" data-off-text="Hide" name="<?php echo $cs_powered_by; ?>" value="1" <?php check_checkboxes(get_option($cs_powered_by) == '1'); ?>> <?php _e('Show "Powered by IgniteUp" in the page', CSCS_TEXT_DOMAIN); ?></label>
                    </td>
                </tr>

            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', CSCS_TEXT_DOMAIN); ?>">
            </p>
        </div>
        <?php include 'temp-siderbar-ad.php' ?>
    </div>
</form>

<script>
    jQuery(document).on('change', '.skip_checkbox', function () {
        skip_arr = new Array();
        jQuery('.skip_checkbox').each(function () {
            if (jQuery(this).is(':checked')) {
                skip_arr.push(jQuery(this).val());
            }
        });
        jQuery('#skip_for_value').val(JSON.stringify(skip_arr));
    });
</script>