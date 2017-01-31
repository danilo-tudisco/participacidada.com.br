<?php
/**
Template Name: Vitrine */
get_header('vitrine'); ?>

<div class="clear"></div>
<div id="container">
	<div class="clear"></div>
	<div style="width:1000px; margin:0 auto;">
		<div style="float:left; width:100%;">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
		</div>
	</div>
</div>
<div class="clear"></div>
<br />
<br />
<br />
</div>
<?php get_footer(); ?>
