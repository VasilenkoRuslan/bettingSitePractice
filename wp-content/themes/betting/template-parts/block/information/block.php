<?php
/**
 * Block Name: Information
 * Description: This block information have question and answer to that question.
 * Category: common
 * Icon: list-view
 * Keywords: sample acf block example
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
$url_info_icon = THEME_DIR_URI . '/assets/images/info-icon.png';
$html_info_icon = '<img src="'.$url_info_icon.'" class="info-icon" alt="info-icon">';
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
		style="background: #fff"
>
	<div class="container block-info">
		<div class="row info-title"><h2><?php the_field( 'information_title' ); ?></h2></div>
		<?php if (have_rows('information_block_info')) : ?>
		<div class="row">
		<?php while (have_rows('information_block_info')) : the_row(); ?>
			<div class="col-12"><h5 class="info-qn"><?= $html_info_icon.get_sub_field('question'); ?></h5></div>
			<div class="col-12"><p class="info-ar"><?= get_sub_field('text'); ?></p></div>
<?php endwhile; ?>
	</div>
		<?php endif; ?>
</section>
