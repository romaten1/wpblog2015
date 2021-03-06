<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<h2 class="entry-title">
			<?php the_title(); ?>
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
			<p>Posted on  <?php the_date(); ?> by <?php the_author(); ?></p>
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