<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       phamhuuthanh.com
 * @since      1.0.0
 *
 * @package    Callnow_pht
 * @subpackage Callnow_pht/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Callnow_pht
 * @subpackage Callnow_pht/admin
 * @author     Pham Huu Thanh <phamhuuthanh1811@gmail.com>
 */
class Easy_Callnow_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		new EasyCallNow_OptionPage();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Callnow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Callnow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-callnow-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Callnow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Callnow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */		 

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-callnow-admin.js', array( 'jquery','wp-color-picker' ), $this->version, false );

	}

}


class EasyCallNow_OptionPage {

	function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	function admin_menu() {
		add_options_page(
			'Call Now Coccoc PHT Blog- Setup',
			'Call Now Coccoc',
			'manage_options',
			'call-now-pht',
			array(
				$this,
				'settings_page'
			)
		);
	}

	function get_settings(){
		$phone = get_option( 'easy_callnow_phone_number', false );
		//$position = get_option( 'easy_callnow_call_position', false );
		$ring_color = get_option( 'easy_callnow_ring_color', false );
		//$ring_hover_color = get_option( 'easy_callnow_ring_hover_color', false );
		//$button_color = get_option( 'easy_callnow_button_color', false );
		//$number_color = get_option( 'easy_callnow_number_color', false );
		//$offset_top = get_option( 'easy_callnow_offset_top', false );
		//$offset_bottom = get_option( 'easy_callnow_offset_bottom', false );
		//$offset_left = get_option( 'easy_callnow_offset_left', false );
		//$offset_right = get_option( 'easy_callnow_offset_right', false );
		$padding_right = get_option( 'easy_callnow_padding_right', false );
		$padding_top = get_option( 'easy_callnow_padding_top', false );
		$tracking_code = get_option( 'easy_callnow_tracking_code', false );
		return array(
			'phone' => $phone ? $phone : '0981797xxx',
			//'position' => $position ? $position : 'p_bottom_right',
			'ring_color' => $ring_color ? $ring_color : '#f00',
			//'ring_hover_color' => $ring_hover_color ? $ring_hover_color : '#baf5a7',
			//'button_color' => $button_color ? $button_color : '#eee',
			//'number_color' => $number_color ? $number_color : '#f00',
			//'offset_top' => $offset_top ? $offset_top : '50',
			//'offset_bottom' => $offset_bottom ? $offset_bottom : '15',
			//'offset_left' => $offset_left ? $offset_left : '5',
			//'offset_right' => $offset_right ? $offset_right : '5',
			'padding_right' => $padding_right ? $padding_right : '-2',
			'padding_top' => $padding_top ? $padding_top : '50',
			'tracking_code' => $tracking_code ? $tracking_code : '',
			);
	}


	function  settings_page() {
		if(isset($_POST['update'])){
			update_option( 'easy_callnow_phone_number', trim($_POST['phone']) );
			//update_option( 'easy_callnow_call_position', trim($_POST['p_call_position']) );
			update_option( 'easy_callnow_ring_color', trim($_POST['ring_color']) );
			//update_option( 'easy_callnow_ring_hover_color', trim($_POST['ring_hover_color']) );
			//update_option( 'easy_callnow_button_color', trim($_POST['button_color']) );
			//update_option( 'easy_callnow_number_color', trim($_POST['number_color']) );
			//update_option( 'easy_callnow_offset_top', trim($_POST['offset_top']) );
			//update_option( 'easy_callnow_offset_bottom', trim($_POST['offset_bottom']) );
			//update_option( 'easy_callnow_offset_left', trim($_POST['offset_left']) );
			//update_option( 'easy_callnow_offset_right', trim($_POST['offset_right']) );
			update_option( 'easy_callnow_padding_right', trim($_POST['padding_right']) );
			update_option( 'easy_callnow_padding_top', trim($_POST['padding_top']) );
			update_option( 'easy_callnow_tracking_code', stripslashes(trim($_POST['tracking_code']) ));
		}
		

		$config = $this->get_settings();
		?>

		<h1 class="wp-heading-inline"><?php _e('Custom Call Now Coccoc PHT Blog - Setup','easy-callnow') ?></h1>
		<p><?php _e('Enter your phone number and custom color','easy-callnow') ?></p>
		<hr>
		<form action="" class="ts-frm" method="POST">
			<div class="form-group">
			  <label class="control-label" ><strong><?php _e('Phone Number','easy-callnow') ?></strong></label> 			    
			    <div class="input-group">			 	
			  		<input type="text" name="phone" value="<?php echo $config['phone']; ?>">
			    </div>
			</div>

			<div class="form-group">
			 <!-- <label class="control-label" ><strong><?php _e('Position:','easy-callnow') ?></strong></label><br/> -->
			  <label class="control-label" ><strong><?php _e('Padding Right(px):','easy-callnow') ?></strong></label>
				<div class="input-group">			 	
			  		<input type="text" name="padding_right" value="<?php echo $config['padding_right']; ?>">
			    </div><br/>
			<label class="control-label" ><strong><?php _e('Padding Top(%):','easy-callnow') ?></strong></label>
				<div class="input-group">
					<input type="text" name="padding_top" value="<?php echo $config['padding_top']; ?>">
				</div>
			</div>

			<div class="form-group">
			  <label class="control-label" ><strong><?php _e('Ring Color','easy-callnow') ?></strong></label> 			    
			    <div class="input-group">			 	
			  		<input name="ring_color" class="color-field" value="<?php echo $config['ring_color']; ?>" type="text">
			    </div>
			</div>
			<div class="form-group">
			  <label class="control-label" ><strong><?php _e('Tracking Code','easy-callnow') ?></strong></label> 			    
			    <div class="input-group">			 	
			  		<textarea name="tracking_code" rows="6" cols="70"><?php echo $config['tracking_code']; ?></textarea>
			    </div>
			</div>

		  <div class="form-group">
		  <input type="submit" name="update" value="<?php _e('Save','easy-callnow') ?>">
		  </div>
			
		</form>
		<div class="clear"></div>
		<hr>
		<p><strong>Donate (1$) :</strong> <a href="https://paypal.me/thanh1811" target="_blank">Paypal</a></p>
		<p>Don't forget to rate me: <a href="https://wordpress.org/support/plugin/call-now-coccoc-pht-blog/reviews/#new-post" target="_blank"><strong>Reviews</strong></a></p>
		<p>Create by: Phạm Hữu Thạnh from <a href="https://phamhuuthanh.com">www.phamhuuthanh.com</a></p>
		<?php
	}
}