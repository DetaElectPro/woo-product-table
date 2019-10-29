<div class="wpt_rightside">
    <div class="wpt_right_side_in_wrapper" style="padding: 10px;">
        <div class="social_title_wrapper">
            <h2 class="social_title"><img src="<?php echo WOO_Product_Table::getPath('BASE_URL'); ?>images/social/social.png"> Share on Social Network</h2>
            <p>Your one share can be best GIFT for me.</p>
            <div class="social_links">
                <?php
                $url_for_share = urlencode('https://github.com/DetaElectPro/woo-product-table');
                ?>
                <a href="http://www.facebook.com/sharer.php?u=<?php echo esc_attr($url_for_share); ?>" title="Your Share, My best Gift" target="_blank">
                    <img src="<?php echo WOO_Product_Table::getPath('BASE_URL'); ?>images/social/facebook.png">
                </a>

                <a href="http://twitter.com/share?text=<?php echo urlencode("Best #Quick_Order Plugin for #WooCommerce #Product #Table Pro - #WPTpro | #" . rand(88, 2934)); ?>&url=<?php echo esc_attr($url_for_share); ?>&via=CodeAstrology" title="Your Share, My best Gift" target="_blank">
                    <img src="<?php echo WOO_Product_Table::getPath('BASE_URL'); ?>images/social/twitter.png">
                </a>

                <a href="https://plus.google.com/share?url=<?php echo esc_attr($url_for_share); ?>&t=<?php echo urlencode("Best Quick Order Plugin for WooCommerce Product Table Pro"); ?>" title="Your Share, My best Gift" target="_blank">
                    <img src="<?php echo WOO_Product_Table::getPath('BASE_URL'); ?>images/social/google.png">
                </a>

                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_attr($url_for_share); ?>&title=<?php echo urlencode("Best Quick Order Plugin for WooCommerce Product Table Pro"); ?>" title="Your Share, My best Gift" target="_blank">
                    <img src="<?php echo WOO_Product_Table::getPath('BASE_URL'); ?>images/social/linkedin.png">
                </a>

                <a href="http://www.reddit.com/submit?url=<?php echo esc_attr($url_for_share); ?>&title=<?php echo urlencode("Best Quick Order Plugin for WooCommerce Product Table Pro"); ?>" title="Your Share, My best Gift" target="_blank">
                    <img src="<?php echo WOO_Product_Table::getPath('BASE_URL'); ?>images/social/reddit.png">
                </a>

                <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&su=<?php echo urlencode("Best Quick Order Plugin for WooCommerce Product Table Pro"); ?>&body=<?php echo esc_attr($url_for_share); ?>&ui=2&tf=1" title="Your Share, My best Gift" target="_blank">
                    <img src="<?php echo WOO_Product_Table::getPath('BASE_URL'); ?>images/social/gmail.png">
                </a>


            </div>
            <small>Feel free to knock me Any time.</small>
        </div>
    </div>

    <div class="wpt_right_side_in_wrapper" style="padding: 10px;">
        <div class="need_help_wrapper">
            <h1>Need Help?</h1>
            <a style="display: block;text-align: left;" target="_blank" href="https://github.com/DetaElectPro/woo-product-table">
                <img style="max-width: 100px" src="<?php echo WPT_BASE_URL; ?>images/customer_support.png">
                <h3>Customer Support</h3>
            </a>
        </div>
    </div>
</div>