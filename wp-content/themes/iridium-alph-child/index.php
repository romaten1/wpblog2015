<?php
/**
 * index.php
 *
 * The main template file.
 */
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php
echo '<div id="content" class="8u skel-cell-important">';
if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<?php

	get_template_part( 'content', get_post_format() );

	?>
<?php endwhile; ?>

	<?php alpha_paging_nav(); ?>

<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif;
echo '</div>';
?>



<?php get_footer(); ?>