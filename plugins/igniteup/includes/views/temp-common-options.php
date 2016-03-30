<form action="options.php" method="post">
    <?php
    settings_fields('cscs_common_options');
    do_settings_sections('cscs_common_options');
    wp_enqueue_media();
    ?>
    <div class="main-row">
        <div class="igniteup-options">
            <div class="igniteup-accordian">
                <h2><?php _e('Subscribe Area', CSCS_TEXT_DOMAIN); ?></h2>
                <div>
                    <table class="form-table">            
                        <tr>
                            <th><label><?php _e('Subscribe Button Text', CSCS_TEXT_DOMAIN); ?></label></th>
                            <td>
                                <?php
                                $cs_subscribe_text = CSCS_GENEROPTION_PREFIX . 'subscribe_text';
                                ?>
                                <input type="text" class="regular-text" placeholder="" name='<?php echo $cs_subscribe_text; ?>' value='<?php echo CSAdminOptions::getDefaultStrings('subscribe_text'); ?>'>
                                <p class="description"><?php _e('Subscribe Button Text', CSCS_TEXT_DOMAIN); ?></p>
                            </td>
                        </tr> 
                        <tr>
                            <th><label><?php _e('Thank you message', CSCS_TEXT_DOMAIN); ?></label></th>
                            <td>
                                <?php
                                $cs_thank_msg = CSCS_GENEROPTION_PREFIX . 'alert_thankyou';
                                ?>
                                <input type="text" class="regular-text" placeholder="" name='<?php echo $cs_thank_msg; ?>' value='<?php echo CSAdminOptions::getDefaultStrings('alert_thankyou'); ?>'>
                                <p class="description"><?php _e('Thank you message after a successful subscription.', CSCS_TEXT_DOMAIN); ?></p>
                            </td>
                        </tr> 
                        <tr>
                            <th><label><?php _e('Invalid Email Error', CSCS_TEXT_DOMAIN); ?></label></th>
                            <td>
                                <?php $cs_invalid_email_msg = CSCS_GENEROPTION_PREFIX . 'alert_error_invalid_email';
                                ?>
                                <input type="text" class="regular-text" placeholder="" name='<?php echo $cs_invalid_email_msg; ?>' value='<?php echo CSAdminOptions::getDefaultStrings('alert_error_invalid_email'); ?>'>
                                <p class="description"><?php _e('Error message for invalid email addresses.', CSCS_TEXT_DOMAIN); ?></p>
                            </td>
                        </tr> 
                        <tr>
                            <th><label><?php _e('Email Already Exists Error', CSCS_TEXT_DOMAIN); ?></label></th>
                            <td>
                                <?php
                                $cs_already_exists_email_msg = CSCS_GENEROPTION_PREFIX . 'alert_error_already_exists';
                                ?>
                                <input type="text" class="regular-text" placeholder="" name='<?php echo $cs_already_exists_email_msg; ?>' value='<?php echo CSAdminOptions::getDefaultStrings('alert_error_already_exists'); ?>'>
                                <p class="description"><?php _e('Message to display if the user has already subscribed.', CSCS_TEXT_DOMAIN); ?></p>
                            </td>
                        </tr> 

                    </table>
                </div>
                <h2><?php _e('Social Icons', CSCS_TEXT_DOMAIN); ?></h2>
                <div>
                    <table class="form-table">

                        <?php
                        $social = array('twitter', 'facebook', 'pinterest', 'googleplus', 'youtube', 'behance', 'linkedin', 'instagram');
                        $socialCount = 0;
                        foreach ($social as $icon) {
                            ?>
                            <tr>
                                <th><label class="text-capitalize"><?php echo $social[$socialCount]; ?></label></th>
                                <td>
                                    <?php
                                    ?>
                                    <input type="text" class="regular-text" placeholder="http://<?php echo $social[$socialCount]; ?>.com/igniteup" name='<?php echo CSCS_GENEROPTION_PREFIX . 'social_' . $social[$socialCount]; ?>' value='<?php echo get_option(CSCS_GENEROPTION_PREFIX . 'social_' . $social[$socialCount]); ?>'>
                                    <p class="description"><?php printf(__('Enter your %s URL here.', CSCS_TEXT_DOMAIN), ucfirst($social[$socialCount])); ?></p>
                                </td>
                            </tr>
                            <?php
                            $socialCount++;
                        }
                        ?>
                    </table>
                </div>
                <h2><?php _e('Contact Form', CSCS_TEXT_DOMAIN); ?></h2>
                <div>
                    <table class="form-table">            
                        <tr>
                            <th><label><?php _e('Receive email address', CSCS_TEXT_DOMAIN); ?></label></th>
                            <td>
                                <?php
                                $cs_receive_email_addr = CSCS_GENEROPTION_PREFIX . 'receive_email_addr';
                                $admin_email = get_bloginfo('admin_email');
                                ?>
                                <input type="text" class="regular-text" placeholder="" name='<?php echo $cs_receive_email_addr; ?>' value='<?php echo get_option($cs_receive_email_addr, $admin_email) ?>'>
                                <p class="description"><?php _e('Receive contact form submits on this email.', CSCS_TEXT_DOMAIN); ?></p>
                            </td>
                        </tr> 
                    </table>
                </div>
            </div>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', CSCS_TEXT_DOMAIN); ?>">
            </p>
        </div>
        <?php include 'temp-siderbar-ad.php' ?>
    </div>
</form>