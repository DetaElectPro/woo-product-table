<?php

/**
 * Default messeage showing, When not found WooCommerce
 */
function wpt_if_no_woocommerce(){
    echo '<a title="' . esc_attr__( 'Tell us: if need Help', 'wpt_pro' ) . '" href="mailto:codersaiful@gmail.com" style="color: #d00;padding: 10px;">' . esc_html__( '[WOO Product Table] WooCommerce not Active/Installed', 'wpt_pro' ) . '</a>';
}
add_shortcode( 'Product_Table', 'wpt_if_no_woocommerce' );