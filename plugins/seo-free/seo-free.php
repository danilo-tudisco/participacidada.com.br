<?php
 
/**
*
* Plugin Name: Seo Free
* Description: All the tools to help improve positioning and monitoring of your wordpress blog
* Version: 1.2
* Author: webhostri
*
**/

add_action( 'admin_menu', 'wp_skinhome' );
add_action('wp_footer','wp_seo_analitycs');
add_action('wp_head','wp_seo_meta');


function wp_skinhome() {
    add_options_page( 'Opciones WP Skin @ Home', 'Herramientas SEO Free', 'manage_options', 'wp_skinhome', 'wp_skinhome_options' );
}

function wp_skinhome_options() {

    if (!current_user_can('manage_options'))
    {
        wp_die( __('PequeÃ±o padawan... debes utilizar la fuerza para entrar aquÃ­.') );
    }
	
    $hidden_field_name = 'wp_skin_image_hidden';

    $opt_name = 'seof_google_analitycs';
    $opt_name_2 = 'seof_meta_description';
	$opt_name_3 = 'seof_meta_keywords';

    $data_field_name = 'seof_google_analitycs';
    $data_meta_description = 'seof_meta_description';
    $data_meta_keywords = 'seof_meta_keywords';

    $opt_val = get_option( $opt_name );
    $opt_val_2 = get_option( $opt_name_2 );
    $opt_val_3 = get_option( $opt_name_3 );


    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'ruta_hidden') {

		$opt_val = $_POST[ $data_field_name ];
		$opt_val_2 = $_POST[$data_meta_description];
		$opt_val_3 = $_POST[$data_meta_keywords];

		update_option( $opt_name, $opt_val );
		update_option( $opt_name_2, $opt_val_2 );
		update_option( $opt_name_3, $opt_val_3 );
		?>
			<div class="updated">
				<p>
					<strong>
						<?php _e('settings saved.', 'wp_skinhome_menu' ); ?>
					</strong>
				</p>
			</div>
		<?php
	}
	
	
    echo '<div class="wrap">';

    echo "<h2>" . __( 'Herramientas Free SEO', 'wp_skinhome_menu' ) . "</h2>";
    ?>
    <form name="form1" method="post" action="">
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="ruta_hidden">
        <p>
            <?php _e("Codigo de seguimiento Google Analytics: ", 'wp_skinhome_menu' ); ?>
            <textarea name="<?php echo $data_field_name; ?>" rows="10" cols="50" class="large-text code"><?php echo $opt_val; ?></textarea>
        </p>
        <p>
            <?php _e("Etiqueta meta description: ", 'wp_skinhome_menu' ); ?>(Solo se aplicaran al home)
            <textarea name="<?php echo $data_meta_description; ?>" rows="10" cols="50" class="large-text code"><?php echo $opt_val_2; ?></textarea>
        </p>
        <p>
            <?php _e("Etiqueta meta keywords: ", 'wp_skinhome_menu' ); ?>(Solo se aplicaran al home)
            <textarea name="<?php echo $data_meta_keywords; ?>" rows="10" cols="50" class="large-text code"><?php echo $opt_val_3; ?></textarea>
        </p>
        <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>
    </form>
</div>
<br /><br />
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Plugin SeoFree -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9329069495351013"
     data-ad-slot="4556868763"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>

<?php

}

function wp_seo_analitycs(){
	
		$opt_name = 'seof_google_analitycs';
	
		$opt_val = get_option( $opt_name );
		?>
		<?php echo $opt_val; ?>
		<?php
	
}
function wp_seo_meta(){
	
	if(is_home()){
		$opt_name_2 = 'seof_meta_description';
		$opt_name_3 = 'seof_meta_keywords';
	
		$opt_val_2 = get_option( $opt_name_2 );
		$opt_val_3 = get_option( $opt_name_3 );
	
		if($opt_val_2 != ''){
			?><meta name="description" content="<?=$opt_val_2; ?>"><?php
		}
		if($opt_val_3 != ''){
			?><meta name="keywords" content="<?=$opt_val_3; ?>"><?php
		}
	}
	
}
