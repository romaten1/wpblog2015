<?php
/* Queue the first post, that way we know if this is a date archive so we can display the correct title.
 * We reset this later so we can run the loop properly with a call to rewind_posts().
 */
if ( ! is_front_page() ) {
	if ( have_posts() )
		the_post();
	?>

		<h2 class="page-title">
			<?php if ( is_day() ) { ?>
				Archive for <?php echo get_the_date();
			}
			elseif ( is_month() ) { ?>
				Archive for <?php echo get_the_date('F Y');
			}
			elseif ( is_year() ) { ?>
				Archive for <?php echo get_the_date('Y');
			}
			else {
				echo get_queried_object()->name;
			} ?>
		</h2>

	<?php rewind_posts();
}?>

<?php // start the loop ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h2>

		<section class="left image quarter">

			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'medium', array(
						'class' => 'left',
						'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt ))
					) ); ?>
				</a>
			<?php } ?>
		</section><!-- .image -->

		<section class="entry-meta">
			<p>Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
		</section><!-- .entry-meta -->

		<section class="entry-content">
			<?php the_content(); ?>
		</section><!-- .entry-content -->

		<section class="entry-meta">
			<?php if ( count( get_the_category() ) ) : ?>
				<span class="cat-links">
                Categories: <?php echo get_the_category_list( ', ' ); ?>
            </span>
			<?php endif; ?>
		</section><!-- .entry-meta -->

	</article><!-- #01-->

<?php endwhile; ?>
<?php // ends the loop ?>