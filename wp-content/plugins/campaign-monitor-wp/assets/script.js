
jQuery( document ).ready(function(){

		
	jQuery( document ).on( 'submit', '.fca_eoi_form', function (e) {
		
		e.preventDefault();
		
		var $this = jQuery( this );
		var $email_field = jQuery( '[name=email]', $this );
		var $name_field = jQuery( '[name=name]', $this );
		var name = $name_field.val();
		var email = $email_field.val();
		var list_id = $this.data( 'fca_eoi_list_id' );
		//var url = 'https://api.createsend.com/api/v3.1/subscribers/' + list_id + '.json';
		var $button = jQuery( '[type=submit]', $this );
		var $spinner = jQuery( '.fca_eoi_loading_spinner', $this );
		var button_initial_val;
		var highlight_interval = false;
		var thank_you_mode = $this.data( 'fca_eoi_thank_you_mode' );
		var thank_you_page = $this.data( 'fca_eoi_thank_you_page' );
		var has_error = false;
		var form_id = jQuery( '[name=fca_eoi_form_id]', $this ).val();
		var nonceValue = jQuery( '#fca_eoi_nonce' ).val();
				
		// Attach tooltips
		jQuery( '[name=email], [name=name]', jQuery( this ) ).each( function() {

			var $this = jQuery( this );
			var tooltipWidth = $this.width() * .8;

			$this.tooltipster( {
				contentAsHTML: true
				, fixedWidth: tooltipWidth
				, minWidth: tooltipWidth
				, maxWidth: tooltipWidth
				, trigger: 'none'
			} );
		} );

		// Remove tooltip and tick on focus
		jQuery( '[name=email], [name=name]', jQuery( this ) ).focus( function() {
			var $this = jQuery( this );
			var $button = jQuery( '[type=submit]', $this.closest( '.fca_eoi_form' ) );
			var button_initial_val = $button.data( 'fca_eoi_initial_val' );

			// Remove any previous icon
			if( 'undefined' !== typeof( button_initial_val ) ) {
				$button.val( button_initial_val );
			}
			
			// Hide tooltip
			jQuery( this ).tooltipster( 'hide' );
		} );

		// Save or save and get initial button value
		if( $button.data( 'fca_eoi_initial_val' ) ) {
			button_initial_val = $button.data( 'fca_eoi_initial_val' );
		} else {
			button_initial_val = $button.val();
			$button.data( 'fca_eoi_initial_val', button_initial_val );
		}
		
		// Remove any previous icon
		$button.val( button_initial_val );
		
		// Get Error Messages from hidden fields
		fca_eoi.invalid_email = $this.find('.fca_eoi_error_texts_email').val();
		fca_eoi.field_required = $this.find('.fca_eoi_error_texts_required').val();
		

		// Check email address
		if( ! email || ! is_email( email ) ) {

			$email_field.tooltipster( 'content', email ? fca_eoi.invalid_email : fca_eoi.field_required );
			$email_field.tooltipster( 'show' );
			$button.val( '✗ ' + button_initial_val );
			has_error = true;
		}

		// Check name
		if( $name_field.length && ! name ) {

			$name_field.tooltipster( 'content', fca_eoi.field_required );
			$name_field.tooltipster( 'show' );
			$button.val( '✗ ' + button_initial_val );
			has_error = true;
		}

		// Exit if there is any error
		if( has_error ) {
			return false;
		}
		//DISABLE BUTTON CLICK EVENT
		$button.click(function(event) {
			event.preventDefault(); 
		});	
		
		
		if (thank_you_mode != 'redirect') {
		
			// Run function to scale spinner based on button size
			scaleSpinnerSize($button, $spinner);
			
			$spinner.css("visibility", "visible");
		
			$button.attr('style', 'cursor: default; transition: none !important; background-color: #808080 !important; border: 1px solid #808080 !important; color: white !important;');
			
			if ( $button.closest('.fca_eoi_form').hasClass('fca_eoi_layout_1') ) {
				//do nothing for this layout, we don't want the extra gray button wrapper
			} else {
				$spinner.parent('.fca_eoi_layout_submit_button_wrapper').attr('style', 'transition: none !important; background-color: #808080 !important; border: 1px solid #808080 !important;');
			}
		}
		 
		
		jQuery.ajax( {
			url: fca_eoi.ajax_url
			, data: { 'email': email, 'name': name, 'action': 'fca_eoi_subscribe', 'list_id': list_id ,'form_id': form_id, 'nonce': nonceValue }
			, type: 'POST'
			, datatype: 'text'
		} ).done( function( data ) {
			// Stop highlighting and add an icon for success/failure
			$button.val( data + ' ' + button_initial_val );
			
			$spinner.css("visibility", "hidden"); 
			clearInterval( highlight_interval );
			if ( thank_you_page && '✓' === data ) {
				
				if ( thank_you_mode == 'redirect' ) {
					window.location.href = thank_you_page;
				} else {
					tooltipWidth = $button.width();
					$button.tooltipster( {
						contentAsHTML: true,
						trigger: 'none',
						fixedWidth: tooltipWidth,
						minWidth: tooltipWidth,
						maxWidth: tooltipWidth,
						arrowColor: '#148544'
					} );
					$button.tooltipster( 'content', thank_you_page );
					$button.tooltipster( 'show' );
					$email_field.prop('disabled', true);
					$name_field.prop('disabled', true);
					
					jQuery('.tooltipster-content').css("background-color", "#148544");
									
				}
			}
		} );
	} );
} );

function scaleSpinnerSize( $button, $spinner ) {
	var h = $button.outerHeight();
	
	h = h - 8; //account for borders
	var newTop = h + 4;
	
	$spinner.css('margin-top', '-' + h + 'px' );	
	$spinner.css('top', newTop );	
	$spinner.css('height', h + 'px');
	$spinner.css('width', h + 'px');
	
}

function is_email( email ) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}