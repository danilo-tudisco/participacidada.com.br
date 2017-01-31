<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?>
</title>
<link href="http://localhost/participa_cidada/wp-content/uploads/2013/10/ico" rel="shortcut icon"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<header id="cabecalho">
	<nav id="menuHome">
		<dl>
			<dt><a href="http://participacaocidada.com.br/">Home</a></dt>
		</dl>
	</nav>
	<nav id="menuNavHome">
		<dl>
			<dt> <a href="http://participacaocidada.com.br/ibcp">IBCP</a></dt>
			<dd> <a href="http://participacaocidada.com.br/investidor-social">Investidor Social</a></dd>
			<dd><a href="http://participacaocidada.com.br/agente-de-desenvolvimento">Agente de Desenvolvimento</a></dd>
			<dd class="destaque"><a href="http://participacaocidada.com.br/cadastro">Cadastro</a></dd>
		</dl>
	</nav>
</header>
<div id="main">
<div id="hrDiv"></div>
<div id="body">
<h1><a href="http://participacaocidada.com.br/" class="logo" title="Participação Social">Logo</a></h1>
<div class="formLogin">
	<form name="formLogin" action="asd.php" method="get">
		<label class="labelLogin">Login</label>
		<input class="inputMail" type="email" name="e-mail" value="E-mail" required/>
		<input name="senha" type="password"  class="inputSenha" required/>
		<input class="inputBt" type="submit" value="entrar" />
	</form>
</div>
