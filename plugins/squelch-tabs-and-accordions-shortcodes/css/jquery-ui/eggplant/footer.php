<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
</div>
</div>
<!-- #main -->

<footer id="footer">
	<nav>
		<dl>
			<dd><a href="#" class="facebookHome">facebook</a></dd>
			<dd><a href="#" class="twitterHome">twitter</a></dd>
		</dl>
	</nav>
	<nav id="menuFooter">
		<dl>
			<dd><a href="muriqui">Muriqui</a></dd>
			<dd><a href="quem-somos">Quem Somos</a></dd>
			<dd>Mídia</dd>
			<dd><a href="faq">FAQ/Ajuda</a></dd>
			<dd><a href="termos-de-uso">Termos de Uso</a></dd>
			<dd>Politíca de Privacidade</dd>
			<dd><a href="contato">Contato</a></dd>
		</dl>
	</nav>
</footer>
</div>
</body>
</html>
<div id="footer" role="contentinfo">
<div id="colophon"> 
	<!-- #footer --> 
	
</div>
<!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body></html>