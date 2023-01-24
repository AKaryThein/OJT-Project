<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testing-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text             = get_field( 'title' ) ?: 'Title here...';
$author           = get_field( 'description' ) ?: 'Description...';
$image            = get_field( 'image' ) ?: 'https://picsum.photos/id/1/5000/3333';
$background_color = get_field( 'background_color' );
$text_color       = get_field( 'text_color' );

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <blockquote class="testing-blockquote">
        <h2 class="testing-text"><?php echo esc_html( $text ); ?></h2>
        <span class="testing-author"><?php echo esc_html( $author ); ?></span><br>
        <small class="testing-role"><?php echo esc_html( $author_role ); ?></small>
    </blockquote>
    <div class="testing-image">
      <img src="<?php echo $image; ?>" alt="block img" width="auto" height="auto"> 
    </div>
</div>