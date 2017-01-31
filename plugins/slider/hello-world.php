<?php
/*
Plugin Name: Hello World!
Plugin URI: http://pedroelsner.com/2011/06/hello-world-meu-primeiro-plugin-para-wordpress/
Description: Adiciona o texto "Hello World!" ao conteúdo do post
Version: 1
Author: Pedro Elsner
Author URI: http://pedroelsner.com/
*/


/**
 * Função que adiciona o texto "Hello World!" ao conteudo do post
 *
 * @param string $content
 * @return string
 */
function hello_world_content_filter( $content ) {
  global $post;
  // Verifica a opção no banco de dados para este post ou página
  if ( get_post_meta($post->ID, 'hello_world_opt_mostrar_mensagem', true) == '1') {
    $content .= ' 
	 <script src="http://code.jquery.com/jquery-1.5.min.js" type="text/javascript">
</script>
<script src="http://participacaocidada.com.br/wp-content/uploads/script/sliderJS.js" type="text/javascript">
</script>
<link href="http://participacaocidada.com.br/wp-content/uploads/script/sliderStyle.css" rel="stylesheet" type="text/css" />

<div id="containerSlider">
	<div id="slider"> </div>
	<a href="http://participacaocidada.com.br/wp-content/uploads/script/list.html" class="off">☷</a> <a href="http://participacaocidada.com.br/wp-content/uploads/script/grid.html" class="on">☰</a> </div>
<br />
<div id="somediv" title="this is a dialog">
	<iframe src="http://participacaocidada.com.br/wp-content/uploads/script/list.html" id="conteudo" scrolling="no"></iframe>  
	
	</div>
	 ';
  }
  return $content;
}

// Cria o hook para ligar esta função ao filter the_content
add_filter( 'the_content', 'hello_world_content_filter' );



/**
 * Função que exibe o conteúdo do quadro
 */
function hello_world_meta_box() {
  global $post;
  
  echo '<input type="hidden" name="hello_world_nonce" id="hello_world_nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  
  echo '<input type="checkbox" name="hello_world_opt_mostrar_mensagem" id="hello_world_opt_mostrar_mensagem" ';

  // Verifica a opção no banco de dados para este post ou página
  if( get_post_meta( $post->ID, 'hello_world_opt_mostrar_mensagem', true ) == '1' )
    echo ' checked="checked" ';
  
  echo '/>';
  echo '<label for="hello_world_opt_mostrar_mensagem">Mostrar mensagem?</label>';
}

/**
 * Função que verifica a existencia da função add_meta_box
 * e se existir adiciona o quadro de opções
 */
function hello_world_add_custom_box() {
	
 // Verifica se a versão do WordPress suporta a função add_meta_box
  if ( function_exists( 'add_meta_box' ) ) {
	  
    // Adiciona o quadro na sessão de páginas e posts
    foreach ( array( 'post', 'page' ) as $type ) {
      /**
       * Função que adiciona o quadro
	   *
       * @param string ID
       * @param string Titulo
       * @param function Função que mostrará o conteudo do quadro
       * @param string 'post' ou 'page'
       * @param string Onde será exibido
       */
      add_meta_box( 'hello_world_meta_box', 'Hello World!', 'hello_world_meta_box', $type, 'side' );
    }
  }
  
}

// Cria o hook necessário
add_action( 'admin_menu', 'hello_world_add_custom_box' );


/**
 * Função que grava as opções do plugin
 *
 * @param int $post_id
 * @return int
 */
function hello_world_save_postdata( $post_id ) {

  if ( ! wp_verify_nonce( $_POST['hello_world_nonce'], plugin_basename(__FILE__) ) ) {
    return $post_id;
  }

  // Verifica se o usuário pode editar post ou página
  if ( 'page' == $_POST['post_type'] && ! current_user_can( 'edit_page', $post_id ) ) {
    return $post_id;
  } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
    return $post_id;
  }

  // Se opt_mostrar_mensagem foi selecionado atualiza tabela
  if ( ! empty( $_POST['hello_world_opt_mostrar_mensagem'] ) ){
    update_post_meta($post_id, 'hello_world_opt_mostrar_mensagem', '1');
  } else{
    delete_post_meta($post_id, 'hello_world_opt_mostrar_mensagem');
  }

  return true;
}

// Cria hook necessário
add_action('save_post', 'hello_world_save_postdata');

?>