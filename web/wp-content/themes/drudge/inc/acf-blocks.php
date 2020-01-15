<?php
/*
 * register acf blocks
 */
function register_acf_block_types() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'testimonial',
        'title'             => __('Testimonial'),
        'description'       => __('A custom testimonial block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/testimonial/testimonial.php',
        'enqueue_style'		=> get_template_directory_uri() . '/template-parts/blocks/testimonial/testimonial.css',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'testimonial', 'quote' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}
