<?php // uninstall remove options
	if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
	    exit();

	$option_name = 'rd_station_form';

	delete_option( $option_name );
?>