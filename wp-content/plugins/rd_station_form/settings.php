<?php
	add_action( 'admin_init', 'my_plugin_settings' );

	function my_plugin_settings() {
		register_setting( 'my-plugin-settings-group', 'rd_station_token' );
		register_setting( 'my-plugin-settings-group', 'identificador' );
	}

	add_action('admin_menu', 'my_plugin_menu');

	function my_plugin_menu() {
		add_submenu_page( 'options-general.php', 'RD Station Form Integration', 'RD Station Form', 'administrator'
										, 'rd_station_form', 'my_plugin_settings_page');
	}

	function my_plugin_settings_page() {?>
								<div class="wrap">
									<h2>Staff Details</h2>

									<form method="post" action="options.php">
										<?php settings_fields( 'my-plugin-settings-group' ); ?>
										<?php do_settings_sections( 'my-plugin-settings-group' ); ?>
										<table class="form-table">
											<tr valign="top">
												<th scope="row">Token RD Station</th>
												<td><input required="true" type="text" name="rd_station_token" value="<?php echo esc_attr( get_option('rd_station_token') ); ?>" /></td>
											</tr>
											<tr valign="top">
												<th scope="row">Identificador</th>
												<td><input required="true" type="text" name="identificador" value="<?php echo esc_attr( get_option('identificador') ); ?>" /></td>
											</tr>				
										</table>

										<?php submit_button(); ?>
									</form>
								</div>
<?php								
	}
?>