<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">
			
			<?php
				// show all posts instead of just 10
/*
				global $query_string;
				query_posts( $query_string . '&posts_per_page=-1' );
*/
				
				
				global $wp_query;
				$args = array_merge( $wp_query->query, array( 'orderby' => 'meta_value', 'meta_key' => 'Missionary Key', 'order' => 'ASC','posts_per_page' => -1 ) );
				query_posts( $args );

			?>
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="entry-title">Ministries</h1>
					<p>Below you will find all the missionaries that serve in a <?php echo strtolower(wp_title('',false)); ?>-type ministry. For more information about any one of them, click on their picture.</p>
				</header>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<div class="entry-content">
				
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
	
						<h2 class="missionary-listed">
							<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('category-thumb', array('class' => 'rounded shadowed')); ?>
							<span class="missionary-name">
							<?php the_title(); ?>
							</span></a>
							<?php
								$wwntbm_field = get_post_meta(get_the_ID(), 'Field', true);
								if ($wwntbm_field != NULL) {echo '<span class="field-of-service">'.$wwntbm_field.'</span>';}
							?>
						</h2>
	
					<?php endwhile; ?>
				
				</div><!-- .entry-content -->

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>