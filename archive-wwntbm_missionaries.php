<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> page type-page status-publish hentry">
				<header class="entry-header">
					<h1 class="entry-title">Missionaries</h1>
				</header><!-- .entry-header -->
					<div class="entry-content">
					<?php
					$missionaries_query = new WP_Query( array ( 'post_type' => 'wwntbm_missionaries', 'orderby' => 'meta_value', 'meta_key' => 'Missionary Key','posts_per_page' => -1, 'order' => 'ASC' ) );

					while ( $missionaries_query->have_posts() ) : $missionaries_query->the_post();

						echo '<h2 class="missionary-listed">
						<a href="';
						the_permalink();
						echo '">';
						the_post_thumbnail('category-thumb', array('class' => 'rounded shadowed'));
						echo '<span class="missionary-name">';
						the_title();
						echo '</span></a>';
						$wwntbm_field = get_post_meta(get_the_ID(), 'Field', true);
						if ($wwntbm_field != NULL) {echo '<span class="field-of-service">'.$wwntbm_field.'</span>';}
						echo '</h2>';

					endwhile; // end of the loop. ?>
					</div>
				</article><!-- .page -->

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>