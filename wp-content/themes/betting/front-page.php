<?php global $temp_html_dir; ?>
<?php get_header();
include_once THEME_DIR . '/inc/classes/ThemeHome.class.php';
$home_page = new ThemeHome();
?>
<?= $home_page->get_header_board(); ?>

<?php /*
if (have_posts()) {
while (have_posts()) {
the_post();
get_template_part('template-parts/content-archive', 'page');
}
echo get_the_posts_pagination(array(
'prev_text' => '«',
'next_text' => '»',
'screen_reader_text' => __('&nbsp;'),
'aria_label' => '',
));
} else {
echo __('Sorry, no posts!', 'beautysalon');
} */
?>
<ul>

<?php
// Define our WP Query Parameters
$the_query = new WP_Query( 'posts_per_page=5' ); ?>


<?php
// Start our WP Query
while ($the_query -> have_posts()) : $the_query -> the_post();
// Display the Post Title with Hyperlink
global $post;
	$post_id = get_the_ID();
	$link = get_the_permalink();

	$data_card = get_field('post_betting_card', $post_id);
	$data_card = (!empty($data_card)) ? $data_card : null;
	$label = ($data_card['label'] === '0') ? '' : $data_card['label'];

	var_dump($data_card);
if (!empty($data_card)) :
?>
	<div class='card-group' style="max-width=1164px !important; height=142px !important;">
		<div class="card bg-primary">
			<div class="card-body text-center bg-white">
				<img src="<?php echo $data_card['bet_img']; ?>" alt="<?php echo $data_card['block_1']['bet_title']; ?>">
				<h5><span class="badge badge-secondary" style="border-radius: 1px;"><?php echo $label; ?></span></h5>
			</div>
		</div>
		<div class="card bg-warning">
			<div class="card-body text-center">
				<p class="card-text">Some text inside the second card</p>
			</div>
		</div>
		<div class="card bg-success">
			<div class="card-body text-center">
				<p class="card-text">Some text inside the third card</p>
			</div>
		</div>
		<div class="card bg-danger">
			<div class="card-body text-center">
				<p class="card-text">Some text inside the fourth card</p>
			</div>
		</div>
		<div class="card bg-dark">
			<div class="card-body text-center">
				<p class="card-text">Some text inside the fourth card</p>
			</div>
		</div>
		<div class="card bg-info">
			<div class="card-body text-center">
				<p class="card-text">Some text inside the fourth card</p>
			</div>
		</div>
	</div>
<?php endif ?>
<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>


<li><?php
// Display the Post Excerpt
the_excerpt(__('(more…)')); ?></li>


<?php
// Repeat the process and reset once it hits the limit
endwhile;
wp_reset_postdata();
?>
</ul>


<?php get_footer(); ?>

