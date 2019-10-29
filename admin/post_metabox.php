<?php
/**
 * All metabox will control from here
 * This page added at 4.1.1 date: 19.1.2019
 * 
 * @since 4.1.1
 * @author Saiful Islam<wo-info-detatech.xyz>
 */

/**
 * Our total metabox or register_meta_box_cb will controll from here. 
 * 
 * @since 4.1.1
 */
function wpt_shortcode_metabox(){
    add_meta_box( 'wpt_shortcode_metabox_id', 'Shortcode', 'wpt_shortcode_metabox_render', 'wpt_product_table', 'normal' );
    add_meta_box( 'wpt_shortcode_configuration_metabox_id', 'Table Configuration', 'wpt_shortcode_configuration_metabox_render', 'wpt_product_table', 'normal' ); //Added at 4.1.4
    
}

function wpt_shortcode_metabox_render(){
    global $post;
    $curent_post_id = $post->ID;
    $post_title = preg_replace( '/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',"$1", $post->post_title );
    echo '<input type="text" value="[Product_Table id=\'' . $curent_post_id . '\' name=\'' . $post_title . '\']" class="wpt_auto_select_n_copy wpt_meta_box_shortcode mb-text-input mb-field" id="wpt_metabox_copy_content" readonly>'; // class='wpt_auto_select_n_copy'
    echo '<a style="display:none;"  class="button button-primary wpt_copy_button_metabox" data-target_id="wpt_metabox_copy_content">Copy</a>';
    echo '<p style="color: green;font-weight:bold;display:none; padding-left: 12px;" class="wpt_metabox_copy_content"></p>';
  
}


//Now start metabox for shortcode Generator
function wpt_shortcode_configuration_metabox_render(){
    global $post;
    echo '<input type="hidden" name="wpt_shortcode_nonce_value" value="' . wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />'; //We have to remove it later
    include __DIR__ . '/post_metabox_form.php';
    ?> 
    <br style="clear: both;">
    <?php
}


function wpt_shortcode_configuration_metabox_save_meta( $post_id, $post ) { // save the data
    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    if ( ! isset( $_POST['wpt_shortcode_nonce_value'] ) ) { // Check if our nonce is set.
            return;
    }

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if( !wp_verify_nonce( $_POST['wpt_shortcode_nonce_value'], plugin_basename(__FILE__) ) ) {
            return;
    }
    //Column Tab Update part
    update_post_meta( $post_id, 'column_array', $_POST['column_array'] );
    update_post_meta( $post_id, 'enabled_column_array', $_POST['enabled_column_array'] );
    update_post_meta( $post_id, 'column_settings', $_POST['column_settings'] );
    
    //Basic Part Update
    update_post_meta( $post_id, 'basics', $_POST['basics'] );
    //Table Style/Design part
    update_post_meta( $post_id, 'table_style', $_POST['table_style'] );
    //Conditions part conditions
    update_post_meta( $post_id, 'conditions', $_POST['conditions'] );
    
    //Conditions part conditions
    update_post_meta( $post_id, 'mobile', $_POST['mobile'] );
    
    //Conditions part conditions
    update_post_meta( $post_id, 'search_n_filter', $_POST['search_n_filter'] );
    
    
    //Pagination
    update_post_meta( $post_id, 'pagination', $_POST['pagination'] );
    
    //Pagination
    update_post_meta( $post_id, 'config', $_POST['config'] );
    
    
    
}
add_action( 'save_post', 'wpt_shortcode_configuration_metabox_save_meta', 1, 2 ); // 