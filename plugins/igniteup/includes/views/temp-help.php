<div class="update-page">
    <h1 class="title"><?php _e('Welcome to IgniteUp', CSCS_TEXT_DOMAIN); ?> <?php echo CSCS_CURRENT_VERSION; ?>!</h1>
    <h2 class="sub-title"><?php _e('Even more improved to serve you better.', CSCS_TEXT_DOMAIN); ?></h2>
    <div class="widget-wrapper">
        <div class="help-page-col">
            <div class="changelog help-page-widget">
                <h2><?php _e("What's New?", CSCS_TEXT_DOMAIN); ?></h2>
                <ul class="changelog-main-list">
                    <li class="main-item">
                        3.1 <span><?php _e('NEW!', CSCS_TEXT_DOMAIN); ?></span><a class="blog_read" target="_blank" href="https://getigniteup.com/blog/igniteup-3-1-is-here/?utm_source=help_page&utm_medium=changelog&utm_campaign=plugin"><?php _e('Read more >>', CSCS_TEXT_DOMAIN); ?></a>
                        <ul class="changelog-sub-list">
                            <li>Used jQuery accordions to organize option page fields.</li>
                            <li>Added more features to support external templates.</li>
                            <li>Moved social media link options to Common Options page.</li>
                            <li>Used bootstrap-switch to replace option checkboxes.</li>
                            <li>Improved social icons of Believe template.</li>
                            <li>Added feature to define minimum IgniteUp version required for each template.</li>
                            <li>Improved translation support. You can <a href="https://translate.wordpress.org/projects/wp-plugins/igniteup" target="_blank">contribute here</a>, with your language.</li>
                        </ul>

                    </li>

                    <li class="main-item">
                        3.0
                        <ul class="changelog-sub-list">
                            <li>Added external template support.</li>
                            <li>Added feature to set a 503 status response. This will be enabled by default.</li>
                            <li>Added options to customize subscribe form alerts and the thank you message.</li>
                            <li>Fixed export to BCC and CSV buttons not working issue.</li>
                            <li>Added Common Options tab to avoid getting common settings in every template.</li>
                        </ul>
                    </li>
                </ul>        
            </div>
        </div>

        <div class="help-page-col">

            <?php
            $curr_user = get_current_user_id();
            $subscription_u_meta = get_user_meta($curr_user, 'igniteup_admin_subscribed', TRUE);
            if ($subscription_u_meta != '1'):
                ?>
                <div id="igniteup-subscription-form" class="support-box help-page-widget row-last-widget">
                    <h2><?php _e('Subscribe for Updates', CSCS_TEXT_DOMAIN); ?></h2>
                    <p></p>
                    <span id="ign-hide-after-success">
                        <input type="text" placeholder="<?php _e('Enter your email address' ,CSCS_TEXT_DOMAIN); ?>" id="igniteup_admin_subscribe_email">
                        <div class="clearfix"></div>                
                        <button class="button button-primary" id="igniteup_admin_subscribe"><?php _e('Send me updates', CSCS_TEXT_DOMAIN); ?></button>
                    </span>
                    <div class="clearfix"></div>
                    <span class="thank-you-text"><?php _e('Thank you for subscribing!', CSCS_TEXT_DOMAIN); ?></span>
                    <p class="description"><?php _e('Your email address is secure with us and will never be shared with any other party. We only using it to send you important news and feature updates.', CSCS_TEXT_DOMAIN); ?></p>
                    <div class="clearfix"></div>
                </div>
<?php endif; ?>


            <div class="rating-box help-page-widget">
                <h2><?php _e('Loving IgniteUp?', CSCS_TEXT_DOMAIN); ?></h2>
                <p><?php _e('Thank you for using IgniteUp in your WordPress installation.', CSCS_TEXT_DOMAIN); ?></p>
                <p><?php _e('Do you mind taking a minute to support us by adding a review? Your feedback is very important to us.', CSCS_TEXT_DOMAIN); ?></p>
                <a href="https://wordpress.org/support/view/plugin-reviews/igniteup" target="_blank" class="button button-primary"><?php _e('Add a Review on WordPress', CSCS_TEXT_DOMAIN); ?></a>
            </div>

            <div class="support-box help-page-widget">
                <h2><?php _e('Need Help?', CSCS_TEXT_DOMAIN); ?></h2>
                <p><?php _e('We have an acting fast support for you. Post your question in WordPress support forums for IgniteUp', CSCS_TEXT_DOMAIN); ?></p>
                <a href="https://wordpress.org/support/plugin/igniteup" target="_blank" class="button button-primary"><?php _e('Visit Support Forum', CSCS_TEXT_DOMAIN); ?></a>
            </div>

            <div class="support-box help-page-widget row-last-widget">
                <h2><?php _e('Watch Tutorial', CSCS_TEXT_DOMAIN); ?></h2>
                <p></p>
                <iframe style="width:100%; height: 205px;" src="https://www.youtube.com/embed/59KSFWCF0Rw?list=PL1W6Z2r2qAK1_VtjZkk32rU5I0AUl6xZc" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="help-page-col help-page-col-last">
            <div class="support-box help-page-widget row-last-widget special">
                <h2><?php _e('Need more templates?', CSCS_TEXT_DOMAIN); ?></h2>
                <p><?php _e('We have more templates for you with improved features like adding YouTube video background, contact forms and location maps.', CSCS_TEXT_DOMAIN); ?></p>

                <a href="http://getigniteup.com/templates/?utm_source=help_page&utm_medium=promo_box&utm_campaign=plugin" target="_blank">
                    <div>
                        <img style="width:100%;margin-bottom: 20px;border: 1px solid #eee;" src="<?php echo plugins_url('includes/images/help-get-templates.jpg', CSCS_FILE); ?>">
                    </div>
                </a>

                <a href="http://getigniteup.com/templates/?utm_source=help_page&utm_medium=promo_box&utm_campaign=plugin" target="_blank" class="button button-primary"><?php _e('Get more templates', CSCS_TEXT_DOMAIN); ?></a>
            </div>

            <div class="support-box help-page-widget row-last-widget">
                <h2><?php _e('About IgniteUp', CSCS_TEXT_DOMAIN); ?></h2>
                <p><?php printf(__('IgniteUp is an in-house product from Ceylon Systems. Want to know more about us? %sVisit our website%s.', CSCS_TEXT_DOMAIN), '<a target="_blank" href="http://www.getigniteup.com">', '</a>'); ?></p>


                <p><?php _e('If you appreciate our effort, please make a donation with PayPal. In this way we can serve you better and IgniteUp will improve. Thank you in advance!', CSCS_TEXT_DOMAIN); ?></p>
                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=E6MY6RKB8DAEL" target="_blank" class="button button-primary"><?php _e('Donate with PayPal', CSCS_TEXT_DOMAIN); ?></a>
            </div>
        </div>
    </div>
</div>