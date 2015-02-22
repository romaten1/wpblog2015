<?php
function wptp_in_header_widget_area() {
	if ( is_active_sidebar( 'in-header-widget-area' ) ) {
		?>
		<aside class="in-header widget-area" role="complementary">
			<?php dynamic_sidebar( 'in-header-widget-area' ); ?>
		</aside>
	<?php
	}
}

add_action( 'wptp_in_header', 'wptp_in_header_widget_area' );

function wptp_sidebar_widget_area() {
	if ( is_active_sidebar( 'sidebar-widget-area' ) ) { ?>
		<aside class="sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
		</aside>
	<?php }
}
add_action( 'wptp_sidebar', 'wptp_sidebar_widget_area' );

function wptp_footer_widget_area() { ?>

	<aside class="fatfooter" role="complementary">

		<?php
		// the first widget area
		if ( is_active_sidebar( 'first-footer-widget-area' ) ) { ?>
			<aside class="first quarter left widget-area">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</aside><!-- .first .widget-area -->
		<?php }

		// the second widget area
		if ( is_active_sidebar( 'second-footer-widget-area' ) ) { ?>
			<aside class="second quarter widget-area">
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
			</aside><!-- .first .widget-area -->
		<?php }

		// the third widget area
		if ( is_active_sidebar( 'third-footer-widget-area' ) ) { ?>
			<aside class="third quarter widget-area">
				<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
			</aside><!-- .first .widget-area -->
		<?php }

		// the fourth widget area
		if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) { ?>
			<aside class="fourth right quarter widget-area">
				<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
			</aside><!-- .first .widget-area -->
		<?php } ?>

	</aside>

<?php
}
add_action( 'wptp_footer', 'wptp_footer_widget_area' );