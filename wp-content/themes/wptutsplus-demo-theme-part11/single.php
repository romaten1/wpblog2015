<?php // the single template file  ?>

<?php get_header(); ?>

	<div id="content" class="two-thirds">

		<?php get_template_part( 'loop', 'single' ); ?>

	</div><!-- #content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>