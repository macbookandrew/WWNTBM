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
					<h1 class="entry-title">Countries</h1>
				</header><!-- .entry-header -->
					<div class="entry-content">
					<ul class="dropdown">
					<?php
					
					// get unique countries
					$fields = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'Field' ORDER BY meta_value ASC", $metakey) );
					
					foreach ($fields as $field) {
						// get missionaries by field
						$query = new WP_Query( array ( 'post_type' => 'wwntbm_missionaries', 'orderby' => 'meta_value', 'meta_key' => 'Field', 'meta_value' => $field, 'order' => 'ASC' ) );
						
						echo '<li><a class="dropdown_trigger"><span class="trigger_pointer_arrow"></span>'.$field.'</a>
						<ul class="sub_links" style="display:none;">';
						while ( $query->have_posts() ) : $query->the_post();
		
							echo '<li><a href="';
							the_permalink();
							echo '">';
							the_title();
							echo '</a></li>';
		
						endwhile; // end of the loop.
						echo '</ul>
						</li>';
					} // end of foreach
					?>
					</ul><!-- .dropdown -->
					</div><!-- .entry-content -->
				</article><!-- .page -->

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>