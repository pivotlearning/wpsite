<?php
/*
*	(c) king-theme.com
*/	
	
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	global $king;
	if( empty( $king->cfg['footerText'] ) ){
		$king->cfg['footerText'] = 'Add footer copyrights text via <a href="'.admin_url('admin.php?page='.strtolower(THEME_NAME).'-panel').'"><strong>theme-panel</strong></a>';
	}
	
?>
<!--Footer Layout 3: Location /templates/footer/-->
<footer class="footer3">
    <div class="container">
        <div class="left animated eff-fadeInLeft delay-150ms">
            <h3 class="white"><?php _e( 'CONTACT US', KING_DOMAIN ); ?></h3>
            <p>
            	<?php _e( 'Are you a Pivot partner? Find out how we can help you provide the best education for your students, or just keep in touch with the contact form to the right.', KING_DOMAIN ); ?>
            </p>
            <br>
            <br>
            <div class="one_half">
                <?php if ( is_active_sidebar( 'footer3' ) ) : ?>
					<div id="footer3" class="widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer3' ); ?>
					<!-- #secondary -->
				<?php endif; ?>
            
            <!-- end section -->
            <div class="one_half last">
                <h6 class="white uline">Get in Touch</h6>
                <?php $king->socials('footer_social_links3'); ?>
            
            <!-- end section -->
        
        <!-- end left section -->
        <div class="right animated eff-fadeInRight delay-150ms">
			<a name="newsletter"></a><div class="king-form two">
				<?php echo do_shortcode( '[salesforce form="1"]' ); ?>
			
        
    
    <!-- end footer -->
</footer>
<div class="clearfix">
<div class="copyright_info3">
	<div class="container">
		<?php echo king::esc_js( $king->cfg['footerText'] ); ?>
		<a href="<?php echo esc_url( $king->cfg['footerTerms'] ); ?>"> 
    		<?php _e('Terms of Use', KING_DOMAIN ); ?>
    	</a> 
    	| 
    	<a href="<?php echo esc_url( $king->cfg['footerPrivacy'] ); ?>">
    		<?php _e('Privacy Policy', KING_DOMAIN ); ?>
    	</a>
	

