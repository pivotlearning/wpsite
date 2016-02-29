<?php

/**
 * @package    Optin Cat
 */

require_once dirname( __FILE__ ) . '/../../common/layout_1/layout.php';

$layout = fca_eoi_layout_descriptor_1( 'Layout 1', 'layout_1', array(
	'headline_copy' => 'Free Email Updates',
	'description_copy' => 'Get the latest content first.',
	'name_placeholder' => 'Name',
	'email_placeholder' => 'Email',
	'button_copy' => 'Join Now',
	'privacy_copy' => "We respect your privacy.",
) );