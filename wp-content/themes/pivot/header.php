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
<script type="text/javascript">
document.addEventListener("DOMContentLoaded",function(){var e=function(){if("scrollingElement"in document)return document.scrollingElement;var a=document.documentElement,b=a.scrollTop;a.scrollTop=b+1;var c=a.scrollTop;a.scrollTop=b;return c>b?a:document.body}(),g=function(a){var b=e.scrollTop;if(2>a.length)a=-b;else if(a=document.querySelector(a)){a=a.getBoundingClientRect().top;var c=e.scrollHeight-window.innerHeight;a=b+a<c?a:c-b}else a=void 0;if(a)return new Map([["start",b],["delta",a]])},h=function(a){var b=
a.getAttribute("href"),c=g(b);if(c){var d=new Map([["duration",800]]),k=performance.now();requestAnimationFrame(function l(a){d.set("elapsed",a-k);a=d.get("duration");var f=d.get("elapsed"),g=c.get("start"),h=c.get("delta");e.scrollTop=Math.round(h*(-Math.pow(2,-10*f/a)+1)+g);d.get("elapsed")<d.get("duration")?requestAnimationFrame(l):(history.pushState(null,null,b),e.scrollTop=c.get("start")+c.get("delta"))})}},f=document.querySelectorAll("a.scroll");(function b(c,d){var e=c.item(d);e.addEventListener("click",
function(b){b.preventDefault();h(e)});if(d)return b(c,d-1)})(f,f.length-1)});
</script>
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
	
