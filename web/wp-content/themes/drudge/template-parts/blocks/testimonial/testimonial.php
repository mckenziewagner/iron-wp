<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('name') ?: 'Author Name';
$author = get_field('testimonial') ?: 'Testimonial ... ';
$image = get_field('image') ?: 295;

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> testimonial">
    <blockquote class="testimonial-blockquote">
        <span class="testimonial-text"><?php echo $text; ?></span>
        <span class="testimonial-author"><?php echo $author; ?></span>
        <span class="testimonial-role"><?php echo $role; ?></span>
    </blockquote>
    <div class="testimonial-image">
        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>
</div>
