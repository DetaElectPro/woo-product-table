<?php
/**
 * Plugin Name: WOO Product Table
 * Description: WooCommerce all products display as a table in one page by shortcode. Fully responsive and mobile friendly. Easily customizable - color,background,title,text color etc.
 * Author: DetaTech
 * Author URI: https://detatech.xyz
 * Tags: woocommerce product,woocommerce product table, product table
 * 
 * Version: 1.0
 * Requires at least:    4.0.0
 * Tested up to:         5.2.3
 * WC requires at least: 3.0.0
 * WC tested up to: 	 3.7.0
 * 
 * Text Domain: wpt_pro
 * Domain Path: /languages/
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Defining constant
 */
define( 'WPT_PLUGIN_BASE_FOLDER', plugin_basename( dirname( __FILE__ ) ) );
define( 'WPT_PLUGIN_BASE_FILE', plugin_basename( __FILE__ ) );
define( "WPT_BASE_URL", plugins_url() . '/'. plugin_basename( dirname( __FILE__ ) ) . '/' );
define( "WPT_DIR_BASE", dirname( __FILE__ ) . '/' );
define( "WPT_BASE_DIR", str_replace( '\\', '/', WPT_DIR_BASE ) );

define( "WPT_PLUGIN_FOLDER_NAME",plugin_basename( dirname( __FILE__ ) ) ); //aDDED TO NEW VERSION
define( "WPT_PLUGIN_FILE_NAME", __FILE__ ); //aDDED TO NEW VERSION

/**
 * Default Configuration for WOO Product Table Pro
 * 
 * @since 1.0.0 -5
 */
$shortCodeText = 'Product_Table';
/**
* Including Plugin file for security
* Include_once
* 
* @since 1.0.0
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
WOO_Product_Table::getInstance();

/**
 * @since 1.7
 */
WOO_Product_Table::$columns_array =  array(
    'product_id'    => __( 'ID', 'wpt_pro' ),
    'serial_number' => __( 'SL', 'wpt_pro' ),
    'thumbnails'    => __( 'Thumbnails', 'wpt_pro' ),
    'product_title' => __( 'Products', 'wpt_pro' ),
    //'description'   =>  __( 'Description', 'wpt_pro' ), //has been removed at V5.2
    'category'      => __( 'Category', 'wpt_pro' ),
    'tags'          => __( 'Tagss', 'wpt_pro' ),
    'sku'           => __( 'SKU', 'wpt_pro' ),
    'weight'        => __( 'Weight(kg)', 'wpt_pro' ),
    'length'        => __( 'Length(cm)', 'wpt_pro' ),
    'width'         => __( 'Width(cm)', 'wpt_pro' ),
    'height'        => __( 'Height(cm)', 'wpt_pro' ),
    'rating'        => __( 'Rating', 'wpt_pro' ),
    'stock'         => __( 'Stock', 'wpt_pro' ),
    'price'         => __( 'Price', 'wpt_pro' ),
    'wishlist'      => __( 'Wish List', 'wpt_pro' ),
    'quantity'      => __( 'Quantity', 'wpt_pro' ),
    'total'         => __( 'Total Price', 'wpt_pro' ),
    'Message'       => __( 'Short Message', 'wpt_pro' ),
    'quick'         => __( 'Quick View', 'wpt_pro' ),
    'date'          =>  __( 'Date', 'wpt_pro' ),
    'modified_date' =>  __( 'Modified Date', 'wpt_pro' ),
    'attribute' =>  __( 'Attributes', 'wpt_pro' ),
    'variations' =>  __( 'Variations', 'wpt_pro' ),
    'action'        => __( 'Action', 'wpt_pro' ),
    'check'         => __( 'Check', 'wpt_pro' ),
    'quoterequest'  => __( 'Quote Request', 'wpt_pro' ),
);

/**
 * @since 1.7
 */
WOO_Product_Table::$colums_disable_array = array(
    'product_id',
    'serial_number',
    //'description',  //has been removed at V5.2
    'tags',
    'weight',
    'length',
    'width',
    'height',
    'total',
    'quick',
    'date',
    'modified_date',
    'wishlist',
    'quoterequest',
    'attribute',
    'variations',
    'Message',
);

//Set Style Selection Options.
WOO_Product_Table::$style_form_options = array(
    'custom'       =>  __( 'Customized Design', 'wpt_pro' ),
    //'default'       =>  __( 'Default Style', 'wpt_pro' ),
    //'blacky'        =>  __( 'Beautifull Blacky', 'wpt_pro' ),
    //'smart'         =>  __( 'Smart Thin', 'wpt_pro' ),
    //'none'          =>  __( 'Select None', 'wpt_pro' ),
    //'green'         =>  __( 'Green Style', 'wpt_pro' ),
    //'blue'          =>  __( 'Blue Style', 'wpt_pro' ),
);
/**
 * Set ShortCode text as Static Properties
 * 
 * @since 1.0.0 -5
 */
WOO_Product_Table::$shortCode = $shortCodeText;

/**
 * Set Default Value For Every where, 
 * 
 * @since 1.9
 */
WOO_Product_Table::$default = array(
    'custom_message_on_single_page'=>  true, //Set true to get form in Single Product page for Custom Message
    'plugin_name'           =>  WOO_Product_Table::getName(),
    'plugin_version'        =>  WOO_Product_Table::getVersion(),
    'footer_cart'           =>  'always_show', //hide_for_zerro
    'footer_cart_size'           =>  '74',
    'footer_bg_color'           =>  '#0a7f9c',
    'footer_possition'           =>  'footer_possition',
    'sku_search'           =>  '0',
    'sort_mini_filter'      =>  'ASC',
    'sort_searchbox_filter' =>  'ASC',
    'custom_add_to_cart'    =>  'add_cart_left_icon',
    'thumbs_image_size'     =>  60,
    'thumbs_lightbox'       => '1',
    'popup_notice'          => '1',
    'disable_product_link'  =>  '0',
    'disable_cat_tag_link'  =>  '0',
    'product_link_target'   =>  '_blank',
    'product_not_founded'   =>  __( 'Products Not founded!', 'wpt_pro' ),
    'load_more_text'        =>  __( 'Load more', 'wpt_pro' ),
    'quick_view_btn_text'   =>  __( 'Quick View', 'wpt_pro' ), 
    'loading_more_text'     =>  __( 'Loading..', 'wpt_pro' ),
    'search_button_text'    =>  __( 'Search', 'wpt_pro' ),
    'search_keyword_text'   =>  __( 'Search Keyword', 'wpt_pro' ),
    'disable_loading_more'  =>  'load_more_hidden',//'normal',//Load More
    'instant_search_filter' =>  '0',
    'filter_text'           =>  __( 'Filter:', 'wpt_pro' ),
    'filter_reset_button'   =>  __( 'Reset', 'wpt_pro' ),
    'instant_search_text'   =>  __( 'Instant Search..', 'wpt_pro' ),
    'yith_browse_list'      =>  __( 'Browse the list', 'wpt_pro' ),
    'yith_add_to_quote_text'=>  __( 'Add to Quote', 'wpt_pro' ),
    'yith_add_to_quote_adding'=>  __( 'Adding..', 'wpt_pro' ),
    'yith_add_to_quote_added' =>  __( 'Quoted', 'wpt_pro' ),
    'item'                  =>  __( 'Item', 'wpt_pro' ), //It will use at custom.js file for Chinging
    'items'                 =>  __( 'Items', 'wpt_pro' ), //It will use at custom.js file for Chinging
    'add2cart_all_added_text'=>  __( 'Added', 'wpt_pro' ), //It will use at custom.js file for Chinging
    'right_combination_message' => __( 'Not available', 'wpt_pro' ),
    'right_combination_message_alt' => __( 'Product variations is not set Properly. May be: price is not inputted. may be: Out of Stock.', 'wpt_pro' ),
    'no_more_query_message' => __( 'There is no more products based on current Query.', 'wpt_pro' ),
    'select_all_items_message' => __( 'Please select all items.', 'wpt_pro' ),
    'out_of_stock_message'  => __( 'Out of Stock', 'wpt_pro' ),
    'adding_in_progress'    =>  __( 'Adding in Progress', 'wpt_pro' ),
    'no_right_combination'  =>  __( 'No Right Combination', 'wpt_pro' ),
    'sorry_out_of_stock'    =>  __( 'Sorry! Out of Stock!', 'wpt_pro' ),
    'type_your_message'     =>  __( 'Type your Message.', 'wpt_pro' ),
    'sorry_plz_right_combination' =>    __( 'Sorry, Please choose right combination.', 'wpt_pro' ),
    
    'all_selected_direct_checkout' => 'no',
    'product_direct_checkout' => 'no',
    
    //Added Search Box Features @Since 3.3
    'search_box_title' => sprintf( __( 'Search Box (%sAll Fields Optional%s)', 'wpt_pro' ),'<small>', '</small>'),
    'search_box_searchkeyword' => __( 'Search Keyword', 'wpt_pro' ),
    'search_box_orderby'    => __( 'Order By', 'wpt_pro' ),
    'search_box_order'      => __( 'Order', 'wpt_pro' ),
    //For Default Table's Content
    'table_in_stock'        =>  __( 'In Stock', 'wpt_pro' ),//'In Stock',
    'table_out_of_stock'    =>  __( 'Out of Stock', 'wpt_pro' ),//'Out of Stock',
    'table_on_back_order'   =>  __( 'On Back Order', 'wpt_pro' ),//'On Back Order',
 
    
);

/**
 * Main Manager Class for WOO Product Table Plugin.
 * All Important file included here.
 * Set Path and Constant also set WOO_Product_Table Class
 * Already set $_instance, So no need again call
 */
class WOO_Product_Table{
    
    /**
     * It's need for Varification purchase code of CodeCanyon
     *
     * @var type int
     */
    public static $item_id = 20676867;
    
    public static $options_name = 'wpt_codecanyon_purchase_code';

    /**
     * To set Default Value for Woo Product Table, So that, we can set Default Value in Plugin Start and 
     * can get Any were
     *
     * @var Array 
     */
    public static $default = array();
    
    /*
     * List of Path
     * 
     * @since 1.0.0
     * @var array
     */
    protected $paths = array();
    
    /**
     * Set like Constant static array
     * Get this by getPath() method
     * Set this by setConstant() method
     *  
     * @var type array
     */
    private static $constant = array();
    
    public static $shortCode;

    
    /**
     * Only for Admin Section, Collumn Array
     * 
     * @since 1.7
     * @var Array
     */
    public static $columns_array = array();

    
    /**
     * Only for Admin Section, Disable Collumn Array
     * 
     * @since 1.7
     * @var Array
     */
    public static $colums_disable_array = array();

    /**
     * Set Array for Style Form Section Options
     *
     * @var type 
     */
    public static $style_form_options = array();
    
    /**
    * Core singleton class
    * @var self - pattern realization
    */
   private static $_instance;
   
   /**
    * Set Plugin Mode as 1 for Giving Data to UPdate Options
    *
    * @var type Int
    */
   protected static $mode = 1;
   
    /**
    * Get the instane of WOO_Product_Table
    *
    * @return self
    */
   public static function getInstance() {
           if ( ! ( self::$_instance instanceof self ) ) {
                   self::$_instance = new self();
           }

           return self::$_instance;
   }
   
   
   public function __construct() {

       $dir = dirname( __FILE__ ); //dirname( __FILE__ )
       
       /**
        * See $path_args for Set Path and set Constant
        * 
        * @since 1.0.0
        */
       $path_args = array(
           'PLUGIN_BASE_FOLDER' =>  plugin_basename( $dir ),
           'PLUGIN_BASE_FILE' =>  plugin_basename( __FILE__ ),
           'BASE_URL' =>  plugins_url() . '/'. plugin_basename( $dir ) . '/', //using plugins_url() instead of WP_PLUGIN_URL
           'BASE_DIR' =>  str_replace( '\\', '/', $dir . '/' ),
       );
       /**
        * Set Path Full with Constant as Array
        * 
        * @since 1.0.0
        */
       $this->setPath($path_args);

       /**
        * Set Constant
        * 
        * @since 1.0.0
        */
       $this->setConstant($path_args);
       //Load File
       if( is_admin() ){
            require_once $this->path('BASE_DIR','admin/wpt_product_table_post.php');
            require_once $this->path('BASE_DIR','admin/post_metabox.php');
            
            require_once $this->path('BASE_DIR','admin/menu_plugin_setting_link.php');
            require_once $this->path('BASE_DIR','admin/style_js_adding_admin.php');
            require_once $this->path('BASE_DIR','admin/fac_support_page.php');
            require_once $this->path('BASE_DIR','admin/configuration_page.php');
            require_once $this->path('BASE_DIR','admin/updater.php');
       }
       
       //Load these bellow file, Only woocommerce installed as well as Only for Front-End
       if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
           require_once $this->path('BASE_DIR','includes/style_js_adding.php');
           require_once $this->path('BASE_DIR','includes/functions.php');
           require_once $this->path('BASE_DIR','includes/ajax_add_to_cart.php'); 
           require_once $this->path('BASE_DIR','includes/shortcode.php');
       }else{
           require_once $this->path('BASE_DIR','includes/no_woocommerce.php');
       }
       
   }
   /**
    * Set Path
    * 
    * @param type $path_array
    * 
    * @since 1.0.0
    */
   public function setPath( $path_array ) {
       $this->paths = $path_array;
   }
   
   private function setConstant( $contanst_array ) {
       self::$constant = $this->paths;
   }
   /**
    * Set Path as like Constant Will Return Full Path
    * Name should like Constant and full Capitalize
    * 
    * @param type $name
    * @return string
    */
   public function path( $name, $_complete_full_file_path = false ) {
       $path = $this->paths[$name] . $_complete_full_file_path;
       return $path;
   }
   
   /**
    * To Get Full path to Anywhere based on Constant
    * 
    * @param type $constant_name
    * @return type String
    */
   public static function getPath( $constant_name = false ) {
       $path = self::$constant[$constant_name];
       return $path;
   }
   /**
    * Update Options when Installing
    * This method has update at Version 3.6
    * 
    * @since 1.0.0
    * @updated since 3.6_29.10.2018 d/m/y
    */
   public static function install() {
       ob_start();
       //check current value
       $current_value = get_option('wpt_configure_options');
       $default_value = self::$default;
       $changed_value = false;
       //Set default value in Options
       if($current_value){
           foreach( $default_value as $key=>$value ){
              if( isset($current_value[$key]) && $key != 'plugin_version' ){
                 $changed_value[$key] = $current_value[$key];
              }else{
                  $changed_value[$key] = $value;
              }
           }
           update_option( 'wpt_configure_options', $changed_value );
       }else{
           update_option( 'wpt_configure_options', $default_value );
       }
       
   }
   
   /**
    * Plugin Uninsall Activation Hook 
    * Static Method
    * 
    * @since 1.0.0
    */
   public function uninstall() {
       //Nothing for now
   }
   
   /**
    * Getting full Plugin data. We have used __FILE__ for the main plugin file.
    * 
    * @since V 1.5
    * @return Array Returnning Array of full Plugin's data for This Woo Product Table plugin
    */
   public static function getPluginData(){
       return get_plugin_data( __FILE__ );
   }
   
   /**
    * Getting Version by this Function/Method
    * 
    * @return type static String
    */
   public static function getVersion() {
       $data = self::getPluginData();
       return $data['Version'];
   }
   
   /**
    * Getting Version by this Function/Method
    * 
    * @return type static String
    */
   public static function getName() {
       $data = self::getPluginData();
       return $data['Name'];
   }
   public static function getDefault( $indexKey = false ){
       $default = self::$default;
       if( $indexKey && isset( $default[$indexKey] ) ){
           return $default[$indexKey];
       }
       return $default;
   }

}

/**
* Plugin Install and Uninstall
*/
register_activation_hook(__FILE__, array( 'WOO_Product_Table','install' ) );
register_deactivation_hook( __FILE__, array( 'WOO_Product_Table','uninstall' ) );
