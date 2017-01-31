<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */


get_header(); ?>

<div id="container">
	<div class="clear"></div>
	<div style="width:1000px; margin:0 auto;">
		
		
		<div style="float:left; width:750px;">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
			

     

			
		</div>
		<div style="float:left; width:50px;">
			<div id="vrDiv"></div>
		</div>
		
		<?php
		
	if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
		<div id="primary" class="widget-area" role="complementary" style="float:left; width:200px;">
			<ul class="widgetText">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div>
		<?php endif; ?>
		
		
		
		
		
	</div>
	<div class="clear"></div>
	
</div>
<?php get_footer(); ?>


