<?php global $temp_html_dir; ?>
<?php get_header();
include_once THEME_DIR . '/inc/classes/ThemeHome.class.php';
$home_page = new ThemeHome();
?>
<?php echo $home_page->get_header_board(); ?>

<?php get_template_part( 'template-parts/content-archive', 'betpage' ); ?>

<?php while ( have_posts() ) : the_post();
	the_content();
endwhile;
?>

<?php get_footer(); ?>

