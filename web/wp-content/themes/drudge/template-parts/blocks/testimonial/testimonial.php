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
$author = get_field('name') ?: 'Author Name';
$text = get_field('testimonial') ?: 'Testimonial';
$image = get_field('image')['ID'] ?: '19';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> testimonial">
    <blockquote class="testimonial-blockquote">
        <div class="testimonial-text"><?php echo $text; ?></div>
        <footer class="testimonial-author"><?php echo $author; ?></footer>
    </blockquote>
    <div class="testimonial-image">
        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>
</div>
