<?php
$colums_disable_array = WOO_Product_Table::$colums_disable_array; //For first time only


$meta_column_array = $columns_array = get_post_meta( $post->ID, 'column_array', true );
if( !$meta_column_array && empty( $meta_column_array ) ){
    $columns_array = WOO_Product_Table::$columns_array;
}
unset($columns_array['description']);
$meta_enable_column_array = get_post_meta( $post->ID, 'enabled_column_array', true );
$column_settings = get_post_meta( $post->ID, 'column_settings', true ); 

$additional_collumn = array_diff(array_keys($columns_array), array_keys( WOO_Product_Table::$columns_array ));

$description_off =  isset( $column_settings['description_off'] ) ? $column_settings['description_off'] : 'on';
$description_off = $description_off == 'off' ? 'checked="checked"' : '';
?>
<ul id="wpt_column_sortable">
    <?php
    foreach( $columns_array as $keyword => $title ){
        if( $meta_enable_column_array && !empty( $meta_enable_column_array ) && is_array( $meta_enable_column_array ) ){
            $enabled_class = $checked_attribute = '';
            if( in_array( $keyword, array_keys( $meta_enable_column_array ) ) ){
                $enabled_class = 'enabled';
                $checked_attribute = ' checked="checked"';
            }
        }else{
            $enabled_class = 'enabled';
            $checked_attribute = ' checked="checked"';
            if( in_array( $keyword, $colums_disable_array ) ){
                $enabled_class = $checked_attribute = '';
            }
        }
        $readOnly = ( $keyword == 'check' ? 'readonly' : false );
    ?>
    <li class="wpt_sortable_peritem <?php echo esc_attr( $enabled_class ); ?> column_keyword_<?php echo esc_attr( $keyword ); ?>">
        <span title="<?php esc_attr_e( 'Move Handle', 'wpt_pro' );?>" class="handle"></span>
        <div class="wpt_shortable_data">
            <input placeholder="<?php echo $keyword; ?>" name="column_array[<?php echo $keyword; ?>]"  data-column_title="<?php echo esc_attr__( $title,'wpt_pro' ); ?>" data-keyword="<?php echo esc_attr( $keyword ); ?>" class="colum_data_input <?php echo esc_attr( $keyword ); ?>" type="text" value="<?php echo $title; ?>" <?php echo $readOnly; ?>>
            <?php if( $keyword == 'product_title' ){ ?>
            <div class="description_off_wrapper">
                <label for="description_off"><input title="Disable Deactivate Description from Title Column" name="column_settings[description_off]" id="description_off" class="description_off" type="checkbox" value="off" <?php echo $description_off; ?>> Disable Description</label>
            </div>
            
            <?php } ?>
                
                <?php
                //var_dump($keyword,$additional_collumn);
            if( in_array($keyword,$additional_collumn) ){
                echo "<span class='wpt_column_cross'>X</span>";
            }
            ?>
        </div>
        <span title="<?php esc_attr_e( 'Move Handle', 'wpt_pro' );?>" class="handle checkbox_handle">
            <input name="enabled_column_array[<?php echo $keyword; ?>]" value="<?php echo esc_attr__( $title ); ?>" title="<?php echo esc_html__( 'Active Inactive Column', 'wpt_pro' );?>" class="checkbox_handle_input <?php echo esc_attr( $enabled_class ); ?>" type="checkbox" data-column_keyword="<?php echo esc_attr( $keyword ); ?>" <?php echo $checked_attribute; ?>>
        </span>
    </li>
    <?php
    
    }
    ?>

</ul>

<div class="tax_cf_handle_wrapper">
    <p class="tax_cf_message"><?php echo sprintf( esc_html__( 'To add %sTaxonomy%s or %sCustom_Field%s as Table Column for your Table, try from following bottom section before [Publish/Update] your post.', 'wpt_pro' ), '<strong>', '</strong>', '<strong>', '</strong>' );?></p>
    <div id="tax_cf_manager">
        <div class="tax_cf_manager_column tax_cf_manager_choose_column">
            <label class="wpt_label"><?php esc_html_e( 'Choose Type', 'wpt_pro' );?></label>
            <select class="taxt_cf_type">
                <option value="cf_"><?php esc_html_e( 'Custom Field', 'wpt_pro' );?></option>
                <option value="tax_"><?php esc_html_e( 'Custom Taxonomy', 'wpt_pro' );?></option>
            </select>
        </div>
        <div class="tax_cf_manager_column tax_cf_manager_keyword_column">
            <label class="wpt_label"><?php esc_html_e( 'Keyword (only keyword of you Taxonomy or CustomField', 'wpt_pro' );?></label>
            <input type="text" class="taxt_cf_input" placeholder="<?php esc_attr_e( 'eg: Color', 'wpt_pro' );?>">
        </div>
        
        <div class="tax_cf_manager_column tax_cf_manager_title_column">
            <label class="wpt_label"><?php esc_html_e( 'Table Column Title/Name', 'wpt_pro' );?></label>
            <input type="text" class="taxt_cf_title" placeholder="<?php esc_attr_e( 'eg: Product Color', 'wpt_pro' );?>">
        </div>
    </div>
    <div>
        <a id="tax_cf_adding_button" class="button button-primary tax_cf_add_button"><?php esc_html_e( 'Add as Column)', 'wpt_pro' );?></a>
    </div>
    <p class="tax_cf_suggesstion">
        <?php 
        echo sprintf(
                esc_html__( 'For custom field, you can use %sAdvanced Custom Fields%s plugin AND for Taxonomy, you can use %sCustom Post Types and Custom Fields creator – WCK%s plugin.%sBesides there are lot of plugin available at %s, Just search on WordPress archives.', 'wpt_pro' ),
               '<a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">',
               '</a>',
               '<a href="https://wordpress.org/plugins/wck-custom-fields-and-custom-post-types-creator/" target="_blank">',
               '</a>',
               '<br>',
               '<a href="https://wordpress.org/" target="_blank">wordpress.org</a>' 
                );
        ?>
    </p>
    <br style="clear: both;">
</div>
<br>
<div class="wpt_column">
    <label style="display: inline;width: inherit;" class="wpt_label wpt_column_hide_unhide_tab" for="wpt_column_hide_unhide"><?php esc_html_e( 'Hide Table Head', 'wpt_pro' );?></label>
    <input style="width: 20px;height:20px;" name="column_settings[table_head]" type="checkbox" id="wpt_column_hide_unhide" <?php echo isset( $column_settings['table_head'] ) ? 'checked="checked"' : ''; ?>>
</div>