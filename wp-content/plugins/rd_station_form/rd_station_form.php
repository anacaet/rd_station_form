<?php
/*
Plugin Name: RD Station Form
Plugin URI: http://exemplo.org/rd_station_form
Description: Um plugin que cria um form no wordpress e envia dados para o RD Station
Version: 1.0
Author: Ana Carolina Alves
Author URI: http://exemplo.org
License: GPLv2
*/
if ( is_admin() ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    include_once( dirname(__file__).'/settings.php');
}

include_once( dirname(__file__).'/form_conversion.php');

?>