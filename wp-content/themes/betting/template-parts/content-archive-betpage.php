<?php
/**
 * Template part for displaying block archive betting cards content in front-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package betting
 */

?>
<div class="container">
	<?php
	// Define our WP Query Parameters
	$the_query = new WP_Query('posts_per_page=10'); ?>

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
			$label = ($data_card['label']['text_label'] === '0') ? '' : $data_card['label']['text_label'];
			$color_label = $data_card['label']['color_label'];

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
			$html_achievements = '';
			foreach ($data_card['block_2'] as $k => $achievements_item) {
				$html_achievements .= '<div><p class="card-text"><img src="' . $url_img_galochka . '" alt="img">' . $achievements_item . '</p></div>';
			}

			//get data Block 3
			$data_metodos_de_pagamento = $data_card['block_3']['metodos_de_pagamento'];
			$html_icons_pay = '';
			if (!empty($data_metodos_de_pagamento)) {
				$count_methods = count($data_metodos_de_pagamento);
				$count_out_block_methods = ($count_methods > 6) ? '+' . ($count_methods - 6) : '';

				foreach ($data_metodos_de_pagamento as $k => $pay_item) {
					$html_icons_pay .= '<img src="' . $pay_item['icon'] . '" alt="' . $k . '">';
				}

			}

			//get data Black 4
			$html_shtampik = '';
			$url_shtamp_true = THEME_DIR_URI . '/assets/images/shtampik_true.png';
			$url_shtamp_false = THEME_DIR_URI . '/assets/images/shtampik_false.png';
			if (!empty($data_card['block_4']['0'])) {
				$html_shtampik = '<img src="' . $url_shtamp_true . '" alt="">';
			} else {
				$html_shtampik = '<img src="' . $url_shtamp_false . '" alt="">';
			}

			//get data Black 5
			$data_block_5 = $data_card['block_5'];
			$text_btn_1 = $data_block_5['text_btn_bet_site'];
			$url_btn_1 = $data_block_5['link_btn_bet_site'];
			$text_btn_2 = $data_block_5['text_btn_single_post_page'];
			$html_block_5 = <<<HTML
<a href="{$url_btn_1}" class="btn btn-info">{$text_btn_1}</a>
<a href="{$link}" class="btn btn-secondary">{$text_btn_2}</a>
HTML;

			?>
			<div class='bet_card' style="">
				<div class="bet-img">
					<img src="<?php echo $url_img_card; ?>" alt="<?php echo $title_card; ?>">
					<div class="bet-badge">
						<h5>
							<span class="top-casino" style="border-radius: 1px; background-color: <?php echo $color_label ?>; "><?php echo $label; ?></span>
						</h5>
					</div>
				</div>
				<div class="bet-part-card bl-1">
					<h5 class="card-title"><?php echo $title_card; ?><?php echo $after_title_icons_html; ?></h5>
					<?php echo $html_rating; ?>
					<input type="checkbox" id="comparar" class="custom-checkbox" <?php echo $comparar; ?>><label
							for="comparar">COMPARAR</label>
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
						<span class="badge badge-dark"
							  style="border-radius: 1px;"><?php echo $count_out_block_methods; ?></span>
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
