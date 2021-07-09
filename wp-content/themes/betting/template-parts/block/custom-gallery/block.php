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

$slug = str_replace('acf/', '', $block['name']);
$block_id = $slug . '-' . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset($block['className']) ? $block['className'] : '';
$array_gallery = get_field('custom_gallery');
$zaglushka_img = THEME_DIR_URI . '/assets/images/aposta-online-futebol-384x200.png';
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
>
	<div class="container block-gallery">
		<h1 class="title-gallery">
			<?php echo $array_gallery['title_gallery']; ?>
		</h1>
		<?php if (have_rows('custom_gallery_gallery_post')) : ?>
			<div class="wrapper">
				<div class="multiple-items">
					<?php while (have_rows('custom_gallery_gallery_post')) : the_row();
						$img_item = get_sub_field('img');
						$url_img_item = (!empty($img_item['sizes']['medium'])) ? $img_item['sizes']['medium'] : $zaglushka_img;
						$title_item = get_sub_field('title');
						$date_item = get_sub_field('date');
						$date_item_format = date("d W Y", strtotime($date_item));
						$link_item = get_sub_field('link');
						?>

						<div class="slider-item">
							<img src="<?php echo $url_img_item; ?>" class="img-gallery" alt="">
							<h5 class="date"><?php echo $date_item; ?></h5>
							<h3 class="title"><?php echo $title_item; ?></h3>
							<a href="<?php echo $link_item; ?>" class="btn-item-gallery"><?php _e('Ler mais', 'betting'); ?> ></a>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>

	</div>
</section>
