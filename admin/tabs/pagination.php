<?php
$pagination =  get_post_meta( $post->ID, 'pagination', true );
?>
<div class="wpt_column">
    <label class="wpt_label" for="wpt_table_shorting"><?php esc_html_e( 'Pagination on/of', 'wpt_pro' ); ?></label>
    <select name="pagination[start]" data-name='sort' id="wpt_table_shorting" class="wpt_fullwidth wpt_data_filed_atts" >
        
        <option value="1" <?php echo isset( $pagination['start'] ) && $pagination['start'] == '1' ? 'selected' : ''; ?>><?php esc_html_e( 'Enable (Default)', 'wpt_pro' ); ?></option>
        <option value="0" <?php echo isset( $pagination['start'] ) && $pagination['start'] == '0' ? 'selected' : ''; ?>><?php esc_html_e( 'Disable', 'wpt_pro' ); ?></option>
    </select>
</div>
<b><?php esc_html_e( 'To change style, go to Design tab', 'wpt_pro' ); ?></b>