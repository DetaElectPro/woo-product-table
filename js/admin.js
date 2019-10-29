(function($) {
    'use strict';
    $(document).ready(function() {
        if(! $('body').hasClass('post-type-wpt_product_table')){
            return false;
        }
        //For select, used select2 addons of jquery
        //$('.wpt_wrap select,.wpt_shortcode_gen_panel select, select#wpt_product_ids,select#product_tag_ids').select2();
        
        function wptSelectItem(target, id) { // refactored this a bit, don't pay attention to this being a function
            var option = $(target).children('[value='+id+']');
            option.detach();
            $(target).append(option).change();
        }
        $('select#wpt_product_ids,select#product_tag_ids,select.wpt_select2').select2();
        $('select#wpt_product_ids,select#product_tag_ids,select.wpt_select2').on('select2:select', function(e){
          wptSelectItem(e.target, e.params.data.id);
        });

        
        //code for Sortable
        $( "#wpt_column_sortable" ).sortable({handle:'.handle'});
        $( "#wpt_column_sortable" ).disableSelection();
        
        $('.wpt_auto_select_n_copy').toggle(function() {
                $(this).select();
            },
            function() {
                //$(this).unselect();
            }
        );
        
        
        $('.wpt_copy_button_metabox').click(function(){
            var ID_SELECTOR = $(this).data('target_id');
            copyMySelectedITem(ID_SELECTOR);
        });
        //wpt_metabox_copy_content
        function copyMySelectedITem(ID_SELECTOR) {
          var copyText = document.getElementById(ID_SELECTOR);
          copyText.select();
          document.execCommand("copy");
          $('.' + ID_SELECTOR).html("Copied");
          $('.' + ID_SELECTOR).fadeIn();
          
          var myInterVal = setInterval(function(){
              $('.' + ID_SELECTOR).html("");
              $('.' + ID_SELECTOR).fadeOut();
              clearInterval(myInterVal);
          },1000);
        }
        
        /**************Admin Panel's Setting Tab Start Here For Tab****************/
        var selectLinkTabSelector = "body.post-type-wpt_product_table #wpt_configuration_form a.wpt_nav_tab";
        var selectTabContentSelector = "body.post-type-wpt_product_table #wpt_configuration_form .wpt_tab_content";
        var selectLinkTab = $(selectLinkTabSelector);
        var selectTabContent = $(selectTabContentSelector);
        var tabName = window.location.hash.substr(1);
        if (tabName) {
            removingActiveClass();
            $('body.post-type-wpt_product_table #wpt_configuration_form #' + tabName).addClass('tab-content-active');
            $('body.post-type-wpt_product_table #wpt_configuration_form .nav-tab-wrapper a.wpt_nav_tab.wpt_nav_for_' + tabName).addClass('nav-tab-active');
            console.log(tabName);
        }
        
        $('body.post-type-wpt_product_table').on('click',' #wpt_configuration_form a.wpt_nav_tab',function(e){
            var targetTabContent = $(this).data('tab');//getting data value from data-tab attribute
            window.location.hash = targetTabContent; //Set hash keywork in Address Bar 
            removingActiveClass();

            $(this).addClass('nav-tab-active');
            $('body.post-type-wpt_product_table  #wpt_configuration_form #' + targetTabContent).addClass('tab-content-active');
            
            e.preventDefault(); //Than prevent for click action of hash keyword
        });

        /**
         * Removing current active nav_tab and tab_content element
         * 
         * @returns {nothing}
         */
        function removingActiveClass() {
            selectLinkTab.removeClass('nav-tab-active');
            selectTabContent.removeClass('tab-content-active');
            return false;
        }

        /**************Admin Panel's Setting Tab End Here****************/
        
        /*********Columns , meta sorting orders and mobile checkbox controlling start here************/
        /**
         * If chose Custom Meta value than
         * Custom meta value's input field will be visible
         * Otherise, By default, It stay hidden
         */
        $('body.post-type-wpt_product_table').on('change','#wpt_table_sort_order_by',function(){
            var current_val = $(this).val();
            if(current_val === 'meta_value' || current_val === 'meta_value_num'){
                $("#wpt_meta_value_wrapper").fadeIn();
                //$("#wpt_product_meta_value_sort").val('_sku');
            }else{
                $("#wpt_meta_value_wrapper").fadeOut();
                //$("#wpt_product_meta_value_sort").val('');
            }
        });
        var wpt_table_sort_order_by = $('#wpt_table_sort_order_by').val();
        if(wpt_table_sort_order_by === 'meta_value' || wpt_table_sort_order_by === 'meta_value_num'){
            $("#wpt_meta_value_wrapper").fadeIn();
        }
        /**
         * Column Section Managing
         */
        $('body.post-type-wpt_product_table').on('click','#wpt_column_sortable li.wpt_sortable_peritem input.checkbox_handle_input',function(){
            var keyword = $(this).data('column_keyword');
            var targetLiSelector = $('#wpt_column_sortable li.wpt_sortable_peritem.column_keyword_' + keyword);
            
            if ($(this).prop('checked')) {
                $(this).addClass('enabled');
                targetLiSelector.addClass('enabled');
            } else {
                //Counting Column//
                var column_keyword;
                column_keyword = [];
                $('#wpt_column_sortable li.wpt_sortable_peritem.enabled .wpt_shortable_data input.colum_data_input').each(function(Index) {
                    column_keyword[Index] = $(this).data('keyword');
                });
                if (column_keyword.length < 2) {
                    alert('Minimum 1 column is required!');
                    return false;
                }
                //Counting colum End here
                
                $(this).removeClass('enabled');
                targetLiSelector.removeClass('enabled');
            }
        });

        /**
         * For Hide on Mobile
         * 
         * @param {type} param
         */
        $('body.post-type-wpt_product_table').on('click','#wpt_keyword_hide_mobile li.hide_on_mobile_permits input.checkbox_handle_input',function(){
            var keyword = $(this).data('column_keyword');
            var targetLiSelector = $('#wpt_keyword_hide_mobile li.hide_on_mobile_permits.column_keyword_' + keyword);
            if ($(this).prop('checked')) {
                $(this).addClass('enabled');
                targetLiSelector.addClass('enabled');
            } else {
                $(this).removeClass('enabled');
                targetLiSelector.removeClass('enabled');
            }
        });

        /*********Columns , meta sorting orders and mobile checkbox controlling end here************/
        
        //Adding Texonomy or Custom Field Button
        $('body.post-type-wpt_product_table').on('click','#tax_cf_adding_button',function(){
            var taxt_cf_type,taxt_cf_input,taxt_cf_title,keyword,html;
            taxt_cf_type = $('.taxt_cf_type').val();
            taxt_cf_input = $('.taxt_cf_input').val();
            taxt_cf_title = $('.taxt_cf_title').val();
            
            if(taxt_cf_input === '' || taxt_cf_title === ''){
                alert("Keyword or Column Name can't be empty");
                return false;
            }
            keyword = taxt_cf_type + taxt_cf_input;
            console.log(taxt_cf_input);
            
            html = '<li class="wpt_sortable_peritem  column_keyword_' + keyword + ' enabled">';
                html += '<span title="Move Handle" class="handle ui-sortable-handle"></span>';
                html += '<div class="wpt_shortable_data">';
                    html += '<input name="column_array[' + keyword + ']" data-column_title="' + taxt_cf_title + '" data-keyword="' + keyword + '" class="colum_data_input product_id" type="text" value="' + taxt_cf_title + '">';
                    html += "<span class='wpt_column_cross'>X</span>";
                html += '</div>';
                html += '<span title="Move Handle" class="handle checkbox_handle ui-sortable-handle">';
                    html += '<input name="enabled_column_array[' + keyword + ']" value="' + taxt_cf_title + '" title="Active Inactive Column" class="checkbox_handle_input  enabled" type="checkbox" data-column_keyword="' + keyword + '" checked="checked">';
                html += '</span>';
            html += '</li>';
            $('#wpt_column_sortable').append(html);
            
        });
        
        //Design Style part JS
        $('.wpt_color_picker').wpColorPicker();
        
        $('body.post-type-wpt_product_table').on('change','select#wpt_style_file_selection',function(){
            var template = $(this).val();
            var elementWrapper = $('div.wpt_customized_style_box_wrapper');
            if('custom' === template){
                elementWrapper.fadeIn('medium');
            }else{
                elementWrapper.fadeOut('medium');
            }
        });

        $('select#wpt_style_file_selection,select#wpt_table_mobile_responsive').trigger('change');
        
        
        //span.wpt_column_cross
        $('body.post-type-wpt_product_table').on('click','span.wpt_column_cross',function(){
            $(this).parents('.wpt_sortable_peritem').fadeOut().remove();
        });
    });
})(jQuery);