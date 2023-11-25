<?php

// Add filter: Modify archive title for selected categories
add_filter('get_the_archive_title', 'modify_archive_title', 10, 1);

// Function for add filter: Modify archive title for selected categories
function modify_archive_title($title = '') 
{
    
    $parent_cat_id = '';
    $parent_category_title = '';
    $archive_title = '';
    $title = sanitize_text_field($title); 
    $current_cat_info = get_category(get_query_var('cat'));
    $parent_cat_id = $current_cat_info->category_parent;
    if (744 == $parent_cat_id) {
        $parent_category_title = 'Makeup';
    }
    if (781 == $parent_cat_id) {
        $parent_category_title = 'Hairstyling';
    }
    if (797 == $parent_cat_id) {
        $parent_category_title = 'Nail Styling';
    }
    if (2315 == $parent_cat_id) {
        $parent_category_title = 'Clothes & Accessories Styling';
    }
    if (856 == $parent_cat_id) {
        $parent_category_title = 'Fashion News';
    }
    if($title && !$parent_category_title) {
        $title = str_ireplace('Category:', '', $title);
        return $title;
    }
    if($title && $parent_category_title) {
       $archive_title = $title . ' ' . $parent_category_title;
       return $archive_title;
    }
}
