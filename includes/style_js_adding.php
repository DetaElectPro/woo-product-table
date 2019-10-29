<?php

/**
 * CSS or Style file add for FrontEnd Section. 
 * 
 * @since 1.0.0
 */
function wpt_style_js_adding(){
    //Custom CSS Style for Woo Product Table's Table (Universal-for all table) and (template-for defien-table)
    wp_enqueue_style( 'wpt-universal', WOO_Product_Table::getPath('BASE_URL') . 'css/universal.css', array(), WOO_Product_Table::getVersion(), 'all' );
    wp_enqueue_style( 'wpt-template-table', WOO_Product_Table::getPath('BASE_URL') . 'css/template.css', array(), WOO_Product_Table::getVersion(), 'all' );
    
    
    //jQuery file including. jQuery is a already registerd to WordPress
    wp_enqueue_script( 'jquery' );
    
    ///custom JavaScript for Woo Product Table pro plugin
    wp_enqueue_script( 'wpt-custom-js', WOO_Product_Table::getPath('BASE_URL') . 'js/custom.js', array( 'jquery' ), WOO_Product_Table::getVersion(), true );
    
    
    /**
     * Select2 CSS file including. 
     * 
     * @since 1.0.3
     */    
    wp_enqueue_style( 'select2', WOO_Product_Table::getPath('BASE_URL') . 'css/select2.min.css', array( 'jquery' ), '1.8.2' );
    
    /**
     * Select2 jQuery Plugin file including. 
     * Here added min version. But also available regular version in same directory
     * 
     * @since 1.9
     */
    wp_enqueue_script( 'select2', WOO_Product_Table::getPath('BASE_URL') . 'js/select2.min.js', array( 'jquery' ), '4.0.5', true );
}
add_action( 'wp_enqueue_scripts', 'wpt_style_js_adding', 99 );
