<?php

require_once 'includes/works_setup.php';
require_once 'includes/speed_up.php';
//wp setup
remove_action('welcome_panel', 'wp_welcome_panel');
add_theme_support('post-thumbnails');
add_theme_support('menus');
show_admin_bar(false);
//if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php")
//wp_redirect('admin.php?page=theme-general-settings');
//register css|js
function registerThemeStyles()
{
    wp_register_style('main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('main');
    wp_register_style('fullpage', get_template_directory_uri() . '/css/jquery.fullpage.css');
    wp_enqueue_style('fullpage');
    wp_register_style('jscrollpane', get_template_directory_uri() . '/css/jquery.jscrollpane.css');
    wp_enqueue_style('jscrollpane');
}

add_action('wp_print_styles', 'registerThemeStyles');
function registerThemeJs()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js');
    wp_enqueue_script('jquery');
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
    wp_enqueue_script('popper');
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap');
    wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js');
    wp_enqueue_script('easing');
    wp_register_script('fullpage', get_template_directory_uri() . '/js/jquery.fullpage.min.js');
    wp_enqueue_script('fullpage');
    wp_register_script('jscrollpane', get_template_directory_uri() . '/js/jquery.jscrollpane.min.js');
    wp_enqueue_script('jscrollpane');
    wp_register_script('mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js');
    wp_enqueue_script('mousewheel');
    wp_register_script('circle-progress', get_template_directory_uri() . '/js/circle-progress.js');
    wp_enqueue_script('circle-progress');
    wp_register_script('parallax', get_template_directory_uri() . '/js/jquery.parallax.js');
    wp_enqueue_script('parallax');
    wp_register_script('transit', get_template_directory_uri() . '/js/jquery.transit.js');
    wp_enqueue_script('transit');
    wp_register_script('maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput.min.js');
    wp_enqueue_script('maskedinput');
    /*wp_register_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js' );
    wp_enqueue_script( 'fancybox' );*/
    wp_register_script('main', get_template_directory_uri() . '/es6/main.js');
    wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'registerThemeJs');
// remove admin-menu links
function remove_menus()
{
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'remove_menus');

function getMouse($secondText = null)
{
    if ($secondText) {
        global $secondText;
        $secondText = true;
    }
    get_template_part('template-parts/scroll-mouse');
}

//cool functions for development
function path()
{
    return get_template_directory_uri() . '/';
}

function phoneLink($phone)
{
    return 'tel:' . preg_replace('/[^0-9]/', '', $phone);
}

function the_image($name, $id)
{
    echo 'src="' . get_field($name, $id)['url'] . '" ';
    echo 'alt="' . get_field($name, $id)['alt'] . '" ';
}

function the_checkbox($field, $print, $post = null)
{
    if ($post == null) {
        global $post;
    }
    echo get_field($field, $post) ? $print : null;
}

function the_table($field, $post = null)
{
    if ($post == null) {
        global $post;
    }
    $table = get_field($field, $post);
    if ($table) {
        echo '<table>';
        if ($table['header']) {
            echo '<thead>';
            echo '<tr>';
            foreach ($table['header'] as $th) {
                echo '<th>';
                echo $th['c'];
                echo '</th>';
            }
            echo '</tr>';
            echo '</thead>';
        }
        echo '<tbody>';
        foreach ($table['body'] as $tr) {
            echo '<tr>';
            foreach ($tr as $td) {
                echo '<td>';
                echo $td['c'];
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}

function the_link($field, $post = null, $classes = "")
{
    if ($post == null) {
        global $post;
    }
    $link = get_field($field, $post);
    if ($link) {
        echo "<a ";
        echo "href='{$link['url']}'";
        echo "class='$classes'";
        echo "target='{$link['target']}'>";
        echo $link['title'];
        echo "</a>";
    }
}

function the_repeater_image($name)
{
    echo 'src="' . get_sub_field($name)['url'] . '" ';
    echo 'alt="' . get_sub_field($name)['alt'] . '" ';
}

function pre($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function get_recent_posts() {
    //No cache
    if(!wp_cache_get('my_complex_query_result')) {
        //This is the super slow query.
        $query = new WP_Query(array(
            'posts_per_page' => 3
        ));
        //Grab the ID:s so we can make a much more lightweight query later
        $post_ids = wp_list_pluck( $query->posts, 'ID' );
        //Cache it!
        wp_cache_set('my_complex_query_result', $post_ids);
        echo 'nocache';
        $posts = $query->posts;
    }
    //Cache!
    else {
        //Lightweight query using post__in
        $query = new WP_Query(array(
            'post__in' => wp_cache_get('my_complex_query_result'),
            'posts_per_page' => -1
        ));
        $posts = $query->posts;
    }
    return $posts;
}
/**
 * Invalidation function. When posts get saved or published we delete the saved post list
 * because it may have changed.
 */
add_action('save_post', function() {
    wp_cache_delete('my_complex_query_result');
});
/**
 * Run this function anywhere. First run will do the heavy WP_Query and
 * the others will do a fast one
 */
get_recent_posts(); // 8 query overhead
get_recent_posts(); //Only 1 query overhead
get_recent_posts(); //Only 1 query overhead