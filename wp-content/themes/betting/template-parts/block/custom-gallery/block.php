<?php
/**
 * Block Name: Custom gallery
 * Description: Custom gallery block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: custom_gallery
 * Supports: { "align":false, "anchor":true }
 *
 * @package betting
 *
 * @var array $block
 */

$slug         = str_replace( 'acf/', '', $block['name'] );
$block_id     = $slug . '-' . $block['id'];
$align_class  = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset( $block['className'] ) ? $block['className'] : '';
?>
<section
	id="<?php echo $block_id; ?>"
	class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
	style="background: #eee"
>
	<div class="caption"><h1>Hello my friend!!!</h1><?php the_field( 'gallery' ); ?></div>
</section>
