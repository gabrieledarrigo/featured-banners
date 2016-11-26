<?php
/*
  Plugin Name: Banners in evidenza
  Description: Plugin per la gestione dei banners in evidenza
  Author: Gabriele D'Arrigo - darrigo.g@gmail.com
  Version: 1.0
 */
require realpath(__DIR__) . '/vendor/autoload.php';

add_action('widgets_init', function () {
    register_sidebar([
        'id' => 'sidebar-featured-banners',
        'name' => 'Banner in evidenza',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ]);

    return register_widget('Darrigo\FeaturedBanners\WidgetManager');
});

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_media();
    wp_enqueue_script('uploader-js', plugin_dir_url( __FILE__ ) . 'resources/scripts/uploader.js', ['jquery'], '1.0', true);
});