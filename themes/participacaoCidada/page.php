<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div id="container">
	<div class="clear"></div>
	<div style="width:1000px; margin:0 auto;">
		<?php
		
	if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
		<div id="primary" class="widget-area" role="complementary">
			<ul class="widgetText">
				<?php dynamic_sidebar( 'primary-widget-area' ); ?>
			</ul>
		</div>
		<?php endif; ?>
		<div style="float:left;">
			<div id="vrDiv"></div>
		</div>
		<div style="float:left; width:60%;">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
		</div>
	</div>
	<div class="clear"></div>
	<br />
	<br />
	<br />
</div>
<?php get_footer(); ?>
