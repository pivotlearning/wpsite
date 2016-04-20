<?php
/**
 *
 * (c) king-theme.com
 *
 * The Header of theme.
 *
 */
 
 
global $king;

if ( ! isset( $content_width ) ) $content_width = 1170;

?><!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<?php 
	wp_head();
?>
</head>
<body <?php body_class('bg-cover'); ?>>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=286148241411530";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0049/1530.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
<script type="text/javascript" src="<?php echo THEME_URI; ?>/assets/js/scroll.min.js"></script>
	<div id="main" class="layout-<?php 	
		$mclass =  $king->cfg['layout']; 
		if( !empty( $post->post_name ) ){
			if( $post->post_type == 'page' )$mclass .= ' page-'.$post->post_name; 
		}
		echo esc_attr( $mclass ); 
		echo ' '.esc_attr( $king->main_class ); ?> site_wrapper">
	<?php
	
		/**
		* Load header path, change header via theme panel, files location themes/linstar/templates/header/
		*/

		king::path( 'header' ); 
		
	?>
	
