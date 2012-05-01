<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php
// get link for the author's missionary page
$author_query = new WP_Query( array( 'post_type' => 'wwntbm_missionaries', 'meta_key' => 'Username', 'meta_value' => get_the_author_meta('user_login') ) );
$author_missionary_page_link = '<a href="'.home_url('/connect/missionaries/').$author_query->posts[0]->post_name.'" title="'.$author_query->posts[0]->post_title.'">'.$author_query->posts[0]->post_title.'</a>';
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?><br/><span class="smaller"><?php echo $author_missionary_page_link ?></span></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php twentyeleven_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		This entry was posted by <?php echo $author_missionary_page_link; ?>.
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->