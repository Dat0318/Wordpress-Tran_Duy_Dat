<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       phamhuuthanh.com
 * @since      1.0.0
 *
 * @package    Callnow_pht
 * @subpackage Callnow_pht/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Callnow_pht
 * @subpackage Callnow_pht/includes
 * @author     Pham Huu Thanh <phamhuuthanh@gmail.com>
 */
class Easy_Callnow_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function callnow_load_textdomain() {

		load_plugin_textdomain(
			'callnow-pht',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
