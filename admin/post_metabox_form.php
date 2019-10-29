<div id="wpt_configuration_form" class="wpt_shortcode_gen_panel">
    <h3 style="margin: 0">
        <a target="_blank" href="https://github.com/DetaElectPro/woo-product-table/wiki">Documentation</a> | 
        <a target="_blank" href="https://github.com/DetaElectPro/woo-product-table/issues">Get Support</a> | 
        <a target="_blank" href="https://github.com/DetaElectPro/woo-product-table/issues">Forum</a> | 
        <a target="_blank" href="https://detatech.xyz/blog/">CodeAstrology Blog</a>
        
    </h3>
    <!-- New Version's Warning. We will remove it from 5.00 | End -->
    <?php
    /**
     * Tab Maintenance. Table will be come from [tabs] folder based on $tab_array
     * this $tab_arry will define, how much tab and tab content
     */
    $tab_array = array(
        'column_settings'   => __( "Column", 'wpt_pro' ),
        'basics'            => __( 'Basics', 'wpt_pro' ),
        'table_style'       => __( 'Design', 'wpt_pro' ),
        'conditions'        => __( 'Conditions', 'wpt_pro' ),
        'search_n_filter'   => __( 'Search Box And Filter','wpt_pro' ),
        'pagination'        => __( 'Pagination', 'wpt_pro' ),
        'mobile'            => __( 'Mobile Issue', 'wpt_pro' ),
        'config'            => __( 'Configuration', 'wpt_pro' ),
    );

    echo '<nav class="nav-tab-wrapper">';
    $active_nav = 'nav-tab-active';
    foreach ($tab_array as $nav => $title) {
        echo "<a href='#{$nav}' data-tab='{$nav}' class='wpt_nav_for_{$nav} wpt_nav_tab nav-tab " . esc_attr( $active_nav ) . "'>" . esc_html__( $title ). "</a>";
        $active_nav = false;
    }
    echo '</nav>';


    //Now start for Tab Content
    $active_tab_content = 'tab-content-active';
    foreach ($tab_array as $tab => $title) {
        echo '<div class="wpt_tab_content tab-content ' . esc_attr( $active_tab_content ) . '" id="' . esc_attr( $tab ) . '">';
        echo '<div class="fieldwrap">';
        $tab_file_of_admin = WPT_BASE_DIR . 'admin/tabs/' . $tab . '.php';
        if ( is_file( $tab_file_of_admin ) ) {
            echo '<br>'; //Insert a break to each Tab's header
            include $tab_file_of_admin; //WPT_BASE_DIR . 'admin/tabs/' . $tab . '.php';
        } else {
            echo '<h2>' . $tab . '.php ' . esc_html__( 'file is not found in tabs folder','wpt_pro' ) . '</h2>';
        }
        echo '</div>'; //End of .fieldwrap
        echo '</div>'; //End of Tab content div
        $active_tab_content = false; //Active tab content only for First
    }
    ?>

</div>

<style>
/*****For Column Moveable Item*******/
ul#wpt_column_sortable li>span.handle{
    background-image: url('<?php echo WPT_BASE_URL . 'images/move.png'; ?>');
}
</style>
