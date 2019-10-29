<?php
$meta_basics = get_post_meta( $post->ID, 'basics', true );
?>

<?php
    /**
     * To Get Category List of WooCommerce
     * @since 1.0.0 -10
     */
    $args = array(
        'hide_empty'    => false, 
        'orderby'       => 'count',
        'order'         => 'DESC',
    );

    //WooCommerce Product Category Object as Array
    $wpt_product_cat_object = get_terms('product_cat', $args);
?>


<div class="wpt_column">
    <label class="wpt_label" for="wpt_product_slugs"><?php echo sprintf( esc_html__('Category Includes %s (Click to choose Categories) %s','wpt_pro'),'<small>','</small>');?></label>
    <select name="basics[product_cat_ids][]" data-name="product_cat_ids" id="wpt_product_ids" class="wpt_fullwidth wpt_data_filed_atts" multiple>
        <?php
        foreach ( $wpt_product_cat_object as $category ) {
            echo "<option value='{$category->term_id}' " . ( is_array( $meta_basics['product_cat_ids'] ) && in_array( $category->term_id, $meta_basics['product_cat_ids'] ) ? 'selected' : false ) . ">{$category->name} - {$category->slug} ({$category->count})</option>";
        }
        ?>
    </select>
</div>


<div class="wpt_column">
    <label class="wpt_label"><?php esc_html_e( 'Product ID Include (Separate with comma)', 'wpt_pro' );?> <span style="color: #00B500;font-weight: normal;font-size: 80%; background-color: #ddd; padding: 0 5px;">New</span></label>
    <input name="basics[post_include]" data-name="post_include" value="<?php echo isset( $meta_basics['post_include'] ) ? $meta_basics['post_include'] : ''; ?>" class="wpt_data_filed_atts" type="text" placeholder="Example: 1,2,3,4">
    <p>To make table with specific product, Input product's ID - separate with comma.</p>
</div>
<div class="wpt_column">
    <label class="wpt_label"><?php esc_html_e( 'Product ID Exclude (Separate with comma)', 'wpt_pro' );?></label>
    <input name="basics[post_exclude]" data-name="post_exclude" value="<?php echo isset( $meta_basics['post_exclude'] ) ? $meta_basics['post_exclude'] : ''; ?>" class="wpt_data_filed_atts" type="text" placeholder="Example: 1,2,3,4">
</div>

<div class="wpt_column">
    <label class="wpt_label" for="wpt_product_slugs"><?php echo sprintf( esc_html__( 'Category Exclude %s (Click to choose Categories) %s', 'wpt_pro' ), '<small>', '</small>' );?></label>
    <select name="basics[cat_explude][]" data-name="cat_explude" id="wpt_product_ids" class="wpt_fullwidth wpt_data_filed_atts" multiple>
        <?php
        foreach ( $wpt_product_cat_object as $category ) {
            echo "<option value='{$category->term_id}' " . ( is_array( $meta_basics['cat_explude'] ) && in_array( $category->term_id, $meta_basics['cat_explude'] ) ? 'selected' : false ) . ">{$category->name} - {$category->slug} ({$category->count})</option>";
        }
        ?>
    </select>
</div>


<?php
    $wpt_product_ids_tag = false;
    /**
     * To Get Category List of WooCommerce
     * @since 1.0.0 -10
     */
    $args = array(
        'hide_empty' => true,
        'orderby' => 'count',
        'order' => 'DESC',
    );

    //WooCommerce Product Category Object as Array
    $wpt_product_tag_object = get_terms('product_tag', $args);
?>


<div class="wpt_column">
    <label class="wpt_label" for="product_tag_ids"><?php  echo sprintf( esc_html__( 'Tag Includes %s (Click to choose Tags) %s', 'wpt_pro' ), '<small>', '</small>' );?></label>
    <select name="basics[product_tag_ids][]" data-name="product_tag_ids" id="product_tag_ids" class="wpt_fullwidth wpt_data_filed_atts" multiple>
        <?php
        foreach ( $wpt_product_tag_object as $tags ) {
            echo "<option value='{$tags->term_id}' " . ( is_array( $meta_basics['product_tag_ids'] ) && in_array( $tags->term_id, $meta_basics['product_tag_ids'] ) ? 'selected' : false ) . ">{$tags->name} - {$tags->slug} ({$tags->count})</option>";
        }
        ?>
    </select>
</div>

<div class="wpt_column" style="border: 1px solid #5ccc7d;background: #ebffee;padding: 10px;">
    <label class="wpt_label wpt_table_ajax_action" for='wpt_table_minicart_position'><?php esc_html_e('Ajax Action (Enable/Disable)','wpt_pro');?></label>
    <select name="basics[ajax_action]" data-name='ajax_action' id="wpt_table_ajax_action" class="wpt_fullwidth wpt_data_filed_atts" >
        <option value="ajax_active" <?php echo isset( $meta_basics['ajax_action'] ) && $meta_basics['ajax_action'] == 'ajax_active' ? 'selected' : false; ?>><?php esc_html_e('Active Ajax (Default)','wpt_pro');?></option>
        <option value="no_ajax_action" <?php echo isset( $meta_basics['ajax_action'] ) && $meta_basics['ajax_action'] == 'no_ajax_action' ? 'selected' : false; ?>><?php esc_html_e('Disable Ajax Action','wpt_pro');?></option>
    </select>
</div>


<div class="wpt_column">
    <label class="wpt_label" for='wpt_table_minicart_position'><?php esc_html_e( 'Mini Cart Position', 'wpt_pro' );?></label>
    <select name="basics[minicart_position]" data-name='minicart_position' id="wpt_table_minicart_position" class="wpt_fullwidth wpt_data_filed_atts" >
        <option value="top" <?php echo isset( $meta_basics['minicart_position'] ) && $meta_basics['minicart_position'] == 'top' ? 'selected' : false; ?>><?php esc_html_e( 'Top (Default)', 'wpt_pro' );?></option>
        <option value="bottom" <?php echo isset( $meta_basics['minicart_position'] ) && $meta_basics['minicart_position'] == 'bottom' ? 'selected' : false; ?>><?php esc_html_e( 'Bottom', 'wpt_pro');?></option>
        <option value="none" <?php echo isset( $meta_basics['minicart_position'] ) && $meta_basics['minicart_position'] == 'none' ? 'selected' : false; ?>><?php esc_html_e( 'None', 'wpt_pro' );?></option>
    </select>
</div>



<div class="wpt_column">
    <label class="wpt_label" for='wpt_table_table_class'><?php esc_html_e( 'Set a Class name for Table', 'wpt_pro' );?></label>
    <input name="basics[table_class]" value="<?php echo isset( $meta_basics['table_class'] ) ? $meta_basics['table_class'] : ''; ?>" class="wpt_data_filed_atts" data-name="table_class" type="text" placeholder="<?php esc_attr_e( 'Product Table Class Name (Optional)', 'wpt_pro' ); ?>" id='wpt_table_table_class'>
</div>

<div class="wpt_column">
    <label class="wpt_label" for='wpt_table_temp_number'><?php esc_html_e( 'Temporary Number for Table', 'wpt_pro' );?></label>
    <input name="basics[temp_number]" class="wpt_data_filed_atts readonly" data-name="temp_number" type="text" placeholder="123" id='wpt_table_temp_number' value="<?php echo isset( $meta_basics['temp_number'] ) ? $meta_basics['temp_number'] : random_int( 10, 300 ); ?>" readonly="readonly">
    <p><?php esc_html_e( 'This is not very important, But should different number for different shortcode of your table. Mainly to identify each table.', 'wpt_pro' );?></p>
</div>


<div class="wpt_column">
    <label class="wpt_label" for="wpt_table_add_to_cart_text"><?php esc_html_e( '(Add to cart) Text', 'wpt_pro' );?></label>
    <input name="basics[add_to_cart_text]" class="wpt_data_filed_atts" data-name="add_to_cart_text" type="text" value="<?php echo isset( $meta_basics['add_to_cart_text'] ) ? $meta_basics['add_to_cart_text'] : __( 'Add to cart', 'wpt_pro' ); ?>" placeholder="<?php esc_attr_e( 'Example: Buy', 'wpt_pro' ); ?>" id="wpt_table_add_to_cart_text">
    <p><?php echo sprintf( esc_html__( 'Put a Space (" ") for getting default %s Add to Cart Text %s', 'wpt_pro' ), '<b>', '</b>' );?></p>
</div>

<div class="wpt_column">
    <label class="wpt_label" for="wpt_table_add_to_cart_selected_text"><?php esc_html_e( '(Add to cart(Selected]) Text', 'wpt_pro' );?></label>
    <input name="basics[add_to_cart_selected_text]"  class="wpt_data_filed_atts" data-name="add_to_cart_selected_text" type="text" value="<?php echo isset( $meta_basics['add_to_cart_selected_text'] ) ? $meta_basics['add_to_cart_selected_text'] : __( 'Add to Cart (Selected)', 'wpt_pro' ); ?>" placeholder="<?php esc_attr_e( 'Example: Add to cart Selected', 'wpt_pro' ); ?>" id="wpt_table_add_to_cart_selected_text">
</div>

<div class="wpt_column">
    <label class="wpt_label" for="wpt_table_check_uncheck_text"><?php esc_html_e( '(All Check/Uncheck) Text', 'wpt_pro' );?></label>
    <input name="basics[check_uncheck_text]"  class="wpt_data_filed_atts" data-name="check_uncheck_text" type="text" value="<?php echo isset( $meta_basics['check_uncheck_text'] ) ? $meta_basics['check_uncheck_text'] : __( 'All Check/Uncheck','wpt_pro' ); ?>" placeholder="<?php esc_attr_e( 'Example: All Check/Uncheck', 'wpt_pro' );?>" id="wpt_table_check_uncheck_text">
</div>
<hr> 
<div class="wpt_column">
    <label class="wpt_label" for="wpt_table_author"><?php esc_html_e( 'AuthorID/UserID/VendorID (Optional)', 'wpt_pro' );?></label>
    <input name="basics[author]"  class="wpt_data_filed_atts" data-name="author" type="number" value="<?php echo isset( $meta_basics['author'] ) ? $meta_basics['author'] : ''; ?>" placeholder="Author ID/Vendor ID" id="wpt_table_author">
    <p style="color: #006394;"><?php esc_html_e( 'Only AuthorID or AuthorName field for both [AuthorID/UserID/VendorID] or [author_name/username/VendorUserName]. Don\'t use both.', 'wpt_pro' );?></p>
</div>
<div class="wpt_column">
    <label class="wpt_label" for="wpt_table_author_name"><?php esc_html_e( 'author_name/username/VendorUserName (Optional)', 'wpt_pro' );?></label>
    <input name="basics[author_name]"  class="wpt_data_filed_atts" data-name="author_name" type="text" value="<?php echo isset( $meta_basics['author_name'] ) ? $meta_basics['author_name'] : ''; ?>" placeholder="Author username/ Vendor username" id="wpt_table_author_name">
    <p style="color: #006394;"><?php esc_html_e( 'Only AuthorID or AuthorName field for both [AuthorID/UserID/VendorID] or [author_name/username/VendorUserName]. Don\'t use both.', 'wpt_pro' );?></p>
</div>
