<?php
/**
 * Template part for displaying block archive betting cards content in front-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package betting
 */

?>
<div class="container custom-container">

	<?php
	// Define our WP Query Parameters
	$the_query = new WP_Query('posts_per_page=10'); ?>

	<?php
	$url_img_18_plus = THEME_DIR_URI . '/assets/images/element18plus.png';
	$url_img_sort = THEME_DIR_URI . '/assets/images/heart-fill.png';
	$url_img_time = THEME_DIR_URI . '/assets/images/time-fill.png';
	$url_img_rating = THEME_DIR_URI . '/assets/images/gift2-fill.png';
	?>
	<div class="row justify-content-between before-bet">
		<div class="col-6 before-bet-left">
			<img src="<?php echo $url_img_18_plus ?>" class="img-before-bet" alt="18+">
			<p class="before-bet-l-text"><?php _e('Jogue com responsabilidade', 'betting'); ?></p>
		</div>
		<div class="col-6 justify-content-end before-bet-right">
			<div class="sortby">
				<a href="#"><img src="<?php echo $url_img_sort ?>" class="img-before-bet-r" alt="sort"></a>
				<p class="before-bet-r-text"><?php _e('sort by:', 'betting'); ?></p>
			</div>
			<a href="#" class="date">
				<img src="<?php echo $url_img_time ?>" class="img-before-bet-r" alt="date">
				<p class="before-bet-r-text"><?php _e('date', 'betting'); ?></p>
			</a>
			<a href="#" class="rating">
				<img src="<?php echo $url_img_rating ?>" class="img-before-bet-r" alt="rating">
				<p class="before-bet-r-text"><?php _e('rating', 'betting'); ?></p>
			</a>
		</div>
	</div>
	<?php
	// Start our WP Query
	while ($the_query->have_posts()) :
		$the_query->the_post();
		// Display the Post Title with Hyperlink
		global $post;
		$post_id = get_the_ID();
		$link = get_the_permalink();

		$data_card = get_field('post_betting_card', $post_id);

		if (!empty($data_card)) :

			//get img card
			$url_img_card = $data_card['bet_img'];

			$title_card = $data_card['block_1']['bet_title'];

			$label = ($data_card['label']['text_label'] === '0' || empty($data_card['block_4']['0'])) ? NULL : $data_card['label']['text_label'];
			$html_label = "";
			if ($label !== NULL) {
				$color_label = $data_card['label']['color_label'];
				$html_label = <<<HTML
					<div class="bet-badge">
						<h5>
							<span class="top-casino" style="border-radius: 1px; background-color:{$color_label}; ">{$label}</span>
						</h5>
					</div>
HTML;
			}

			//get data Black 4
			$html_shtampik = '';
			$url_shtamp_true = THEME_DIR_URI . '/assets/images/shtampik_true.png';
			$url_shtamp_false = THEME_DIR_URI . '/assets/images/shtampik_false.png';

			$color_no_license = "";
			$class_no_license = "";
			if (!empty($data_card['block_4']['0'])) {
				$html_shtampik = '<img src="' . $url_shtamp_true . '" alt="">';
			} else {
				$html_shtampik = '<img src="' . $url_shtamp_false . '" alt="">';
				$color_no_license = "color: #bebec7";
				$class_no_license = "no_license";
			}

			// get data block 1
			$after_title_icons = (empty($data_card['block_1']['after_title_icons'])) ? '' : $data_card['block_1']['after_title_icons'];
			$after_title_icons_html = "";
			if (!empty($after_title_icons)) {
				$after_title_icons_html = "";
				foreach ($after_title_icons as $value) {
					$link_dice = THEME_DIR_URI . '/assets/images/11-dice.png';
					$link_ball = THEME_DIR_URI . '/assets/images/football.png';
					$link_icon = '';
					switch ($value) {
						case "dice":
							$link_icon = $link_dice;
							break;
						case "football":
							$link_icon = $link_ball;
							break;
					}
					$after_title_icons_html .= '<img src="' . $link_icon . '" alt="">';
				}
			}

			// display rating
			$avg_rating = intval($data_card['block_1']['bet_rating']);
			$avg_rating = (!empty($data_card['block_4']['0'])) ? $avg_rating : 0;

			if ($avg_rating >= 0) {
				$html_rating = $html_rating_1 = null;
				for ($i = 1; $i < 6; $i++) {
					$css_active = ($i <= $avg_rating) ? 'active' : null;
					$html_rating_1 .= '<span class="rating-item ' . $css_active . '"><i class="fa fa-star"></i></span>';
				}

				$html_rating .= '<div class="bet_rating">' . $html_rating_1 . '<span> ' . $avg_rating . '/5</span></div>';
			} else {
				$html_rating = '<div class="no_rating">Error rating</div>';
			}

			// Checkbox Comparar
			$comparar = (!empty($data_card['block_1']['comparar'])) ? ' checked' : '';

			//get data Block 2
			$url_img_galochka = THEME_DIR_URI . '/assets/images/galochka.png';
			$url_img_galochka_no_license = THEME_DIR_URI . '/assets/images/galochkafalse.png';
			$url_img_galochka = (!empty($data_card['block_4']['0'])) ? $url_img_galochka : $url_img_galochka_no_license;
			$html_achievements = '';
			foreach ($data_card['block_2'] as $k => $achievements_item) {
				$html_achievements .= '<div><p class="card-text" style="' . $color_no_license . '"><img src="' . $url_img_galochka . '" alt="img">' . $achievements_item . '</p></div>';
			}

			//get data Block 3
			$data_metodos_de_pagamento = $data_card['block_3']['metodos_de_pagamento'];
			$html_icons_pay = '';
			if (!empty($data_metodos_de_pagamento)) {
				$count_methods = count($data_metodos_de_pagamento);
				$count_out_block_methods = ($count_methods > 6) ? '+' . ($count_methods - 6) : '';

				foreach ($data_metodos_de_pagamento as $k => $pay_item) {
					if ($k < 6) {
						$html_icons_pay .= '<img src="' . $pay_item['icon'] . '" class="bet-pay-icon" alt="' . $k . '">';
					}
				}
			}

			//get data Black 5
		if (!empty($data_card['block_4']['0'])) {
			$data_block_5 = $data_card['block_5'];
			$text_btn_1 = $data_block_5['text_btn_bet_site'];
			$url_btn_1 = $data_block_5['link_btn_bet_site'];
			$text_btn_2 = $data_block_5['text_btn_single_post_page'];
			$html_block_5 = <<<HTML
<a href="{$url_btn_1}" class="btn">{$text_btn_1}</a>
<a href="{$link}" class="btn">{$text_btn_2}</a>
HTML;
		} else {
			$text_btn_no_license = __('Saber Mais','betting');
			$html_block_5 = <<<HTML
<a href="#" class="btn">{$text_btn_no_license}</a>
HTML;
		}


			?>
			<div class="bet_card <?php echo $class_no_license ?>">
				<div class="bet-img bl-0">
					<img src="<?php echo $url_img_card; ?>" alt="<?php echo $title_card; ?>">
					<?php echo $html_label; ?>
				</div>
				<div class="bet-part-card bl-1">
					<h5 class="card-title"><?php echo $title_card; ?><?php echo $after_title_icons_html; ?></h5>
					<?php echo $html_rating; ?>
					<?php
					if (!empty($data_card['block_4']['0'])) {
						?>
						<input type="checkbox" id="comparar-<?php echo $post_id ?>"
							   class="custom-checkbox" <?php echo $comparar; ?>><label
								for="comparar-<?php echo $post_id ?>">COMPARAR</label>
					<?php }
					?>
				</div>
				<div class="bet-part-card bl-2">
					<div class="card-content">
						<?php echo $html_achievements; ?>
					</div>
				</div>
				<div class="bet-part-card bl-3">
					<div class="card-content">
						<h4 class="card-text"><?php _e('Métodos de pagamento', 'betting'); ?></h4>
						<?php echo $html_icons_pay; ?>
						<span class="badge badge-bet-count"><?php echo $count_out_block_methods; ?></span>
					</div>
				</div>
				<div class="bet-img bl-4">
					<?php echo $html_shtampik; ?>
				</div>
				<div class="bet-part-card bl-5">
					<div class="card-btn-content">
						<?php echo $html_block_5; ?>
					</div>
				</div>
			</div>

		<?php endif ?>
	<?php
// Repeat the process and reset once it hits the limit
	endwhile;
	wp_reset_postdata();
	?>
</div>
