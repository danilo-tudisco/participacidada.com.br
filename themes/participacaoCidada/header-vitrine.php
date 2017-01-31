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
<link href="http://localhost/participa_cidada/wp-content/script/css/slider.css" rel="shortcut icon"/>
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


<script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript">
</script>
<script type="text/javascript">

$(document).ready(function() {	

	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
	
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});

		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		
	
		$(id).fadeIn(2000); 
	
	});
	
	$('.window .close').click(function (e) {
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});

</script>

<style>
select {
	width:300px;
}
.selectCombo{
	width: 125px !important;
	}
	
	
	
	
	
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:fixed;
  top: 50%;
  left: 50%;
  margin-top: -350px;
  margin-left: -530px;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog {
  width:1060px; 
  height:700px;
  padding:10px;
  background-color:#fff;
}

.close{display:block; text-align:right;}






</style>
<?php wp_enqueue_script(‘jquery’); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<header id="headerA">
	<nav id="menuHomeA">
		<dl>
			<dd><a href="http://participacaocidada.com.br/">Home</a></dd>
			<dd><a href="http://participacaocidada.com.br/carteira-de-projetos">Carteira de projetos</a></dd>
			<dd><a href="http://participacaocidada.com.br/cadastro">Cadastro</a></dd>
		</dl>
	</nav>
	<nav id="menuNavHomeA">
		<dl>
			<dd></dd>
		</dl>
	</nav>
</header>
<div id="toolBar">
	<div id="contentToolBar">
		<h1><a href="http://participacaocidada.com.br/" class="logoInterna" title="Participação Social">Logo</a></h1>
		<div id="busca">
			<label class="labelLogin">Buscar Projetos</label>
			<input class="inputMail" type="text" name="busca" style="width:500px" disabled/>
			<input class="inputBt" type="submit" value="Pesquisar"  disabled/>
			<a href="#dialog" name="modal">Busca Avançada</a>
		</div>
		<div class="containerMessage">
			<div id="message"> Você só poderá realizar buscas se estiver logado, caso não não tenha sido cadastrado ainda acesse nossa pagina de <a href="http://participacaocidada.com.br/cadastro/">cadastro</a> e comece a usufruir </div>
			<div id="exportXls"><a href="#">Exportar .xls</a> </div>
			<input class="inputBt" type="submit" value="Encomendar Projeto" style="float:right; margin-right:10px"/>
			<div id="formAvancada">
				<div id="select"> <span id="abrirCombo"> <a href="#">▾</a></span> </div>
				<div id="combo">
					<div>
						<div><a id="fechar" href="#" style="float:right; height:17px;" class="inputButton">Pesquisar</a></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="hrDiv"></div>
</div>
<div id="main">
<div id="body">
<div id="hrDiv"></div>




<div id="boxes">

<div id="dialog" class="window">
<a href="#" class="close">Fechar [X]</a><br />
Janela Modal Simples<br />  
<table border="0" cellspacing="0" cellpadding="0" style="width:1060px !important;">
							<tr>
								<td valign="top" style="width:550px !important;">
								<h3>Como utilizar nosso filtro</h3>
								<p>Para encontrar projetos, você pode utilizar 22 filtros de busca e selecionar quantos<br /> itens desejar em cada filtro.</p>
								<p>Para selecionar mais de um item, utilize a tecla Ctrl . Se acessar a partir de um MAC, <br />utilize a tecla Command (⌘).</p>
								<p>Após definir filtros e itens, clique em <a id="fechar2" href="#" style="height:17px;" class="inputButton">Pesquisar</a></p><br />
									<br />
									<br />
									<table id="tabela" style="width:550px !important;" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<th colspan="4">Por Agente de desenvolvimento Social (Entidades)</th>
										</tr>
										<tr>
											<td>Nome:</td>
											<td><label for="nome"></label>
												<input type="text" name="nome" id="nome"></td>
											<td>Endereço:</td>
											<td><input type="text" name="nome2" id="nome2"></td>
										</tr>
										<tr>
											<td valign="top">Tipo de entidade:</td>
											<td><label for="tipoEntidade"></label>
												<select class="selectCombo" name="tipoEntidade" size="2" multiple id="tipoEntidade">
													<option selected> </option>
													<option>Associação</option>
													<option>Fundação</option>
													<option>Organização Social </option>
													<option>OSCIP – Organização da Sociedade Civil de Interesse Público </option>
													<option>OE – Organização Estrangeira </option>
													<option>UPF – Utilidade Pública Federal </option>
													<option>Cadastro no CNAS – Conselho Nacional de Assistência Social </option>
													<option>CEBAS – Educação </option>
													<option>CEBAS – Assistência Social </option>
													<option>CEBAS – Saúde </option>
													<option>Certificado de Utilidade Pública Municipal </option>
													<option>Certificado de Utilidade Pública Estadual </option>
												</select></td>
											<td valign="top">Entidades reconhecidas publicamente:</td>
											<td valign="top"><input type="text" name="nome3" id="nome3"></td>
										</tr>
										<tr>
											<td>Entidades que recebe algum tipo de parceria:</td>
											<td><input type="text" name="nome4" id="nome4"></td>
											<td>Entidades que divulgam seus balanços publicamente:</td>
											<td><input type="text" name="nome5" id="nome5"></td>
										</tr>
										<tr>
											<td valign="top">Áreas de atuação da Entidade:</td>
											<td><select class="selectCombo" name="tipoEntidade2" size="2" multiple id="tipoEntidade2">
													<option selected> </option>
													<option>Agricultura</option>
													<option>Arte e cultura </option>
													<option>Assistência social </option>
													<option>Comunicação</option>
													<option>Comércio</option>
													<option>Crianças e adolescentes </option>
													<option>DST/AIDS </option>
													<option>Discriminação racial </option>
													<option>Discriminação sexual </option>
													<option>Economia Solidária </option>
													<option>Educação</option>
													<option>Esporte</option>
													<option>Fortalecimento de outras entidades/ Movimentos populares </option>
													<option>Justiça e promoção de direitos </option>
													<option>Meio Ambiente </option>
													<option>Organização popular/ Participação popular </option>
													<option>Orçamento público </option>
													<option>Questão indígena </option>
													<option>Questões agrárias </option>
													<option>Questões urbanas </option>
													<option>Relações de consumo </option>
													<option>Relações de gênero </option>
													<option>Saúde </option>
													<option>Segurança alimentar </option>
												</select></td>
											<td valign="top">Receita anual da Entidade (em R$):</td>
											<td><select class="selectCombo" name="tipoEntidade3" size="2" multiple id="tipoEntidade3">
													<option selected> </option>
													<option>Acima de 5 milhões (especificar): </option>
													<option>Acima de 2,5 milhões até 5 milhões </option>
													<option>Acima de 1 milhão até 2,5 milhões </option>
													<option>Acima de 500 mil até 1 milhão </option>
													<option>Acima de 250 mil até 500 mil </option>
													<option>Acima de 50 mil até 100 mil </option>
													<option>Acima de 25 mil até 50 mil </option>
													<option>Acima de 10 mil até 25 mil </option>
													<option>Acima de 5 mil até 10 mil </option>
												</select></td>
										</tr>
										<tr>
											<td valign="top">&nbsp;</td>
											<td>&nbsp;</td>
											<td valign="top">&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
									</table></td>
								<td valign="top"><table id="tabela"width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<th colspan="4">Por Projeto Social</th>
										</tr>
										<tr>
											<td valign="top">Nome do Projeto:</td>
											<td valign="top"><input type="text" name="nome6" id="nome6"></td>
											<td valign="top" style="width:100px;">Nome do Responsável Legal:</td>
											<td valign="top"><input type="text" name="nome7" id="nome7"></td>
										</tr>
										<tr>
											<td valign="top">Projeto aprovado em alguma lei de incentivo, Qual?</td>
											<td><select class="selectCombo" name="tipoEntidade4" size="2" multiple id="tipoEntidade4">
													<option selected> </option>
													<option>Lei Rouanet </option>
													<option>Pronac </option>
													<option>Lei de Incentivo ao Esporte </option>
													<option>Lei do Audiovisual </option>
													<option>Fundo Nacional de Apoio à Criança e ao Adolescente </option>
												</select></td>
											<td colspan="2" valign="top"><table id="tabela"width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td valign="top">Leis estaduais. Qual Estado? </td>
														<td valign="top"><input type="text" name="nome8" id="nome8"></td>
													</tr>
													<tr>
														<td valign="top">Leis estaduais. Qual Municipio? </td>
														<td valign="top"><input type="text" name="nome9" id="nome9"></td>
													</tr>
												</table></td>
										</tr>
										<tr>
											<td valign="top">Prazo de execução do projeto (em meses):</td>
											<td><select class="selectCombo" name="tipoEntidade5" size="2" multiple id="tipoEntidade5">
													<option selected> </option>
													<option>de 1 a 3 meses </option>
													<option>de 3 a 6 meses </option>
													<option>de 6 a 12 meses </option>
													<option>de 12 a 24 meses </option>
													<option>acima de 24 meses </option>
												</select></td>
											<td valign="top">Área de abrangência do projeto </td>
											<td valign="top"><input type="text" name="nome10" id="nome10"></td>
										</tr>
										<tr>
											<td valign="top">Por áreas de atuação do Projeto:</td>
											<td><select class="selectCombo" name="tipoEntidade5" size="2" multiple id="tipoEntidade5">
													<option selected> </option>
													<option>Agricultura</option>
													<option>Arte e cultura</option>
													<option>Assistência social</option>
													<option>Comunicação </option>
													<option>Comércio</option>
													<option>Crianças e adolescentes</option>
													<option>DST/AIDS</option>
													<option>Discriminação racial</option>
													<option>Discriminação sexual</option>
													<option>Economia Solidária</option>
													<option>Educação</option>
													<option>Esporte</option>
													<option>Fortalecimento de outras entidades/ Movimentos populares</option>
													<option>Justiça e promoção de direitos</option>
													<option>Meio Ambiente</option>
													<option>Organização popular/ Participação popular</option>
													<option>Orçamento público</option>
													<option>Questão indígena</option>
													<option>Questões agrárias</option>
													<option>Questões urbanas</option>
													<option>Relações de consumo</option>
													<option>Relações de gênero</option>
													<option>Saúde</option>
													<option>Segurança alimentar</option>
												</select></td>
											<td valign="top"></td>
											<td valign="top"></td>
										</tr>
										<tr>
											<td valign="top">Públicos beneficiários:</td>
											<td><select class="selectCombo" name="tipoEntidade6" size="2" multiple id="tipoEntidade6">
													<option selected> </option>
													<option>Todos</option>
													<option>Crianças e adolescentes </option>
													<option>Crianças e Adolescentes vítimas de violência sexual; </option>
													<option>Adolescentes em conflito com a lei; </option>
													<option>Estudantes</option>
													<option>Jovens</option>
													<option>Mulheres</option>
													<option>Família</option>
													<option>Negros/ Quilombolas; </option>
													<option>Lideranças e educadores(as) populares </option>
													<option>Lésbicas, gays, bissexuais, travestis e transexuais </option>
													<option>Moradores(as) de áreas de ocupação </option>
													<option>Organizações populares/ Movimentos sociais </option>
													<option>Outras entidades, associações </option>
													<option>Indivíduos apenados e/ ou egressos do sistema penitenciário; </option>
													<option>População em geral </option>
													<option>Indivíduos em situação de rua (moradores de rua); </option>
													<option>Portadores(as) de HIV </option>
													<option>Portadores(as) de necessidades especiais (físicas e mentais) </option>
													<option>Povos indígenas </option>
													<option>Professores(as) </option>
													<option>Terceira idade </option>
													<option>Trabalhadores(as) rurais/ Sindicatos de trabalhadores(as) rurais </option>
													<option>Pequenos produtores </option>
													<option>Trabalhadores(as) urbanos(as)/ Sindicatos urbanos </option>
													<option>Comunidades tradicionais </option>
													<option>Pessoas em situação de pobreza ou extrema pobreza. </option>
													<option>Migrantes/ Imigrantes </option>
													<option>Usuários de substâncias psicoativas. </option>
													<option>Comunidade científica </option>
													<option>Autoridades locais </option>
													<option>Lideranças comunitárias </option>
													<option>Moradores de áreas de ocupação </option>
												</select></td>
											<td valign="top">Custo do projeto: </td>
											<td><select class="selectCombo" name="tipoEntidade7" size="2" multiple id="tipoEntidade7">
													<option>Até 5.000,00 </option>
													<option>De 5 a 10 mil </option>
													<option>De 10 a 20 mil </option>
													<option>De 20 a 40 mil </option>
													<option>De 40 a 60 mil </option>
												</select></td>
										</tr>
										<tr>
											<td valign="top">Projetos que proíbe a cobrança e/ou contribuição financeira por parte dos usuários/beneficiários:</td>
											<td valign="top"><input type="text" name="nome11" id="nome11"></td>
											<td valign="top">Quantidade de beneficiados diretos: </td>
											<td valign="top"><input type="text" name="nome12" id="nome12"></td>
										</tr>
										<tr>
											<td valign="top">Quantidade de beneficiados indiretos:</td>
											<td valign="top"><input type="text" name="nome13" id="nome13"></td>
											<td valign="top">&nbsp;</td>
											<td valign="top">&nbsp;</td>
										</tr>
									</table></td>
							</tr>
							<tr>
								<td valign="top">&nbsp;</td>
								<td valign="top">&nbsp;</td>
							</tr>
						</table>
</div>
  
 






<!-- Máscara para cobrir a tela -->
  <div id="mask"></div>
