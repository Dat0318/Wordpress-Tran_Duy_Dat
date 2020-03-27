<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/*
Plugin Name: Facebook Messenger Chat for Website
Plugin URI: https://iamjagdish.com/wordpress-plugins/
Description: Integrate Facebook Messenger Chat on your website easily without touching any code.
Author: Jagdish Kashyap
Version: 1.2.0
Author URI: https://iamjagdish.com
License: GPL2
*/

class FacebookMessengerChatForWebsite {
	private $facebook_messenger_chat_for_website_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'facebook_messenger_chat_for_website_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'facebook_messenger_chat_for_website_page_init' ) );
		add_action( 'admin_enqueue_style', array( $this, 'color_picker' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'color_picker' ) );
	}

	public function color_picker() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'my-script-handle', plugins_url('js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}

	public function facebook_messenger_chat_for_website_add_plugin_page() {
		add_theme_page(
			'Facebook Messenger Chat for Website', // page_title
			'Facebook Messenger Chat for Website', // menu_title
			'manage_options', // capability
			'facebook-messenger-chat-for-website', // menu_slug
			array( $this, 'facebook_messenger_chat_for_website_create_admin_page' ) // function
		);
	}

	public function facebook_messenger_chat_for_website_create_admin_page() {
		$this->facebook_messenger_chat_for_website_options = get_option( 'facebook_messenger_chat_for_website_option_name' ); ?>

        <div class="wrap">
            <h2>Facebook Messenger Chat for Website</h2>
            <p>Integrate Facebook Messenger Chat on your website easily without touching any code.</p>
			<?php settings_errors(); ?>

            <form method="post" action="options.php">
				<?php
				settings_fields( 'facebook_messenger_chat_for_website_option_group' );
				do_settings_sections( 'facebook-messenger-chat-for-website-admin' );
				submit_button();
				?>
            </form>
        </div>
	<?php }

	public function facebook_messenger_chat_for_website_page_init() {
		register_setting(
			'facebook_messenger_chat_for_website_option_group', // option_group
			'facebook_messenger_chat_for_website_option_name', // option_name
			array( $this, 'facebook_messenger_chat_for_website_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'facebook_messenger_chat_for_website_setting_section', // id
			'Settings', // title
			array( $this, 'facebook_messenger_chat_for_website_section_info' ), // callback
			'facebook-messenger-chat-for-website-admin' // page
		);

		add_settings_field(
			'facebook_page_id_0', // id
			'Facebook Page ID', // title
			array( $this, 'facebook_page_id_0_callback' ), // callback
			'facebook-messenger-chat-for-website-admin', // page
			'facebook_messenger_chat_for_website_setting_section' // section
		);

		add_settings_field(
			'hide_on_pages_add_ids_with_comma_separated_values_1', // id
			'Hide On (Pages) - Add IDs with comma separated values', // title
			array( $this, 'hide_on_pages_add_ids_with_comma_separated_values_1_callback' ), // callback
			'facebook-messenger-chat-for-website-admin', // page
			'facebook_messenger_chat_for_website_setting_section' // section
		);

		add_settings_field(
			'hide_on_posts_add_ids_with_comma_separated_values_2', // id
			'Hide On (Posts) - Add IDs with comma separated values', // title
			array( $this, 'hide_on_posts_add_ids_with_comma_separated_values_2_callback' ), // callback
			'facebook-messenger-chat-for-website-admin', // page
			'facebook_messenger_chat_for_website_setting_section' // section
		);

		add_settings_field(
			'hide_on_posts_add_ids_with_comma_separated_values_3', // id
			'Position', // title
			array( $this, 'hide_on_posts_add_ids_with_comma_separated_values_3_callback' ), // callback
			'facebook-messenger-chat-for-website-admin', // page
			'facebook_messenger_chat_for_website_setting_section' // section
		);

		add_settings_field(
			'hide_on_posts_add_ids_with_comma_separated_values_4', // id
			'Color', // title
			array( $this, 'hide_on_posts_add_ids_with_comma_separated_values_4_callback' ), // callback
			'facebook-messenger-chat-for-website-admin', // page
			'facebook_messenger_chat_for_website_setting_section' // section
		);
	}

	public function facebook_messenger_chat_for_website_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['facebook_page_id_0'] ) ) {
			$sanitary_values['facebook_page_id_0'] = sanitize_text_field( $input['facebook_page_id_0'] );
		}

		if ( isset( $input['hide_on_pages_add_ids_with_comma_separated_values_1'] ) ) {
			$sanitary_values['hide_on_pages_add_ids_with_comma_separated_values_1'] = esc_textarea( $input['hide_on_pages_add_ids_with_comma_separated_values_1'] );
		}

		if ( isset( $input['hide_on_posts_add_ids_with_comma_separated_values_2'] ) ) {
			$sanitary_values['hide_on_posts_add_ids_with_comma_separated_values_2'] = esc_textarea( $input['hide_on_posts_add_ids_with_comma_separated_values_2'] );
		}

		if ( isset( $input['hide_on_posts_add_ids_with_comma_separated_values_3'] ) ) {
			$sanitary_values['hide_on_posts_add_ids_with_comma_separated_values_3'] = $input['hide_on_posts_add_ids_with_comma_separated_values_3'];
		}

		if ( isset( $input['hide_on_posts_add_ids_with_comma_separated_values_4'] ) ) {
			$sanitary_values['hide_on_posts_add_ids_with_comma_separated_values_4'] = $input['hide_on_posts_add_ids_with_comma_separated_values_4'];
		}

		return $sanitary_values;
	}

	public function facebook_messenger_chat_for_website_section_info() {

	}

	public function facebook_page_id_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="facebook_messenger_chat_for_website_option_name[facebook_page_id_0]" id="facebook_page_id_0" value="%s">',
			isset( $this->facebook_messenger_chat_for_website_options['facebook_page_id_0'] ) ? esc_attr( $this->facebook_messenger_chat_for_website_options['facebook_page_id_0']) : ''
		);
	}

	public function hide_on_pages_add_ids_with_comma_separated_values_1_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="facebook_messenger_chat_for_website_option_name[hide_on_pages_add_ids_with_comma_separated_values_1]" id="hide_on_pages_add_ids_with_comma_separated_values_1">%s</textarea>',
			isset( $this->facebook_messenger_chat_for_website_options['hide_on_pages_add_ids_with_comma_separated_values_1'] ) ? esc_attr( $this->facebook_messenger_chat_for_website_options['hide_on_pages_add_ids_with_comma_separated_values_1']) : ''
		);
	}

	public function hide_on_posts_add_ids_with_comma_separated_values_2_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="facebook_messenger_chat_for_website_option_name[hide_on_posts_add_ids_with_comma_separated_values_2]" id="hide_on_posts_add_ids_with_comma_separated_values_2">%s</textarea>',
			isset( $this->facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_2'] ) ? esc_attr( $this->facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_2']) : ''
		);
	}

	public function hide_on_posts_add_ids_with_comma_separated_values_3_callback() {
		?> <select name="facebook_messenger_chat_for_website_option_name[hide_on_posts_add_ids_with_comma_separated_values_3]" id="hide_on_posts_add_ids_with_comma_separated_values_3">
			<?php $selected = (isset( $this->facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_3'] ) && $this->facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_3'] === 'left') ? 'selected' : '' ; ?>
            <option value="left" <?php echo $selected; ?>>Left</option>
			<?php $selected = (isset( $this->facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_3'] ) && $this->facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_3'] === 'right') ? 'selected' : '' ; ?>
            <option value="right" <?php echo $selected; ?>>Right</option>
        </select> <?php
	}

	public function hide_on_posts_add_ids_with_comma_separated_values_4_callback() {
		printf(
			'<input type="text" class="my-color-field" name="facebook_messenger_chat_for_website_option_name[hide_on_posts_add_ids_with_comma_separated_values_4]" id="hide_on_posts_add_ids_with_comma_separated_values_4" value="%s">',
			isset( $this->facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_4'] ) ? esc_attr( $this->facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_4']) : ''
		);
	}

}
if ( is_admin() )
	$facebook_messenger_chat_for_website = new FacebookMessengerChatForWebsite();

add_action( 'wp_footer', 'add_fb_messenger_website_chat' );
function add_fb_messenger_website_chat() {

	$facebook_messenger_chat_for_website_options = get_option( 'facebook_messenger_chat_for_website_option_name' );
	$fb_page_id                                  = $facebook_messenger_chat_for_website_options['facebook_page_id_0'];
	$hide_on_pages                               = $facebook_messenger_chat_for_website_options['hide_on_pages_add_ids_with_comma_separated_values_1'];
	$hide_on_posts                               = $facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_2'];
	$position = $facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_3'];
	$color                               = $facebook_messenger_chat_for_website_options['hide_on_posts_add_ids_with_comma_separated_values_4'];

	if ( is_page( explode( ',', $hide_on_pages ) ) ) {
		return false;
	} elseif ( is_single( explode( ',', $hide_on_posts ) ) ) {
		return false;
	} else { ?>

        <style>
            .fb_iframe_widget iframe {
                <?php echo $position ?>: 0pt !important;
            }
            .fb_reset>div {
                <?php echo $position ?>: 9pt !important;
            }
        </style>
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    xfbml: true,
                    version: 'v3.3'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-customerchat" attribution=setup_tool page_id="<?php echo $fb_page_id ?>" theme_color="<?php echo $color ?>">
        </div>

	<?php }
}

