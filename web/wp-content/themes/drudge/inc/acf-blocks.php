<?php
/*
 * register acf blocks
 */
function register_acf_block_types() {

	$blocks_base = get_template_directory_uri() . '/template-parts/blocks/';

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'testimonial',
        'title'             => __('Testimonial'),
        'description'       => __('A custom testimonial block.'),
        'render_template'   => $blocks_base . 'testimonial/testimonial.php',
        'enqueue_style'   => $blocks_base . 'testimonial/testimonial.css',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'testimonial', 'quote' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}
