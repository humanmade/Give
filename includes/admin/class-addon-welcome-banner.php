<?php
/**
 * Give Welcome Banner
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Give_Addon_Welcome_Banner
 */
class Give_Addon_Welcome_Banner extends Give_Addon_Activation_Banner {


	public $addon_details = array();

	/**
	 * @var Give_Addon_Welcome_Banner
	 **/
	private static $instance = null;

	public function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Give_Addon_Welcome_Banner();
		}

		return self::$instance;
	}

	/**
	 * Give_Addon_Welcome_Banner constructor.
	 */
	public function __construct() {
		add_action( 'current_screen', array( $this, 'maybe_initialize_hooks' ) );
	}


	/**
	 * Will initialize hooks to display the new (as of 4.4) connection banner if the current user can
	 * connect Jetpack, if Jetpack has not been deactivated, and if the current page is the plugins page.
	 *
	 * This method should not be called if the site is connected to WordPress.com or if the site is in development mode.
	 *
	 * @since 4.4.0
	 * @since 4.5.0 Made the new (as of 4.4) connection banner displayaa to everyone by default.
	 * @since 5.3.0 Running another split test between 4.4 banner and a new one in 5.3.
	 *
	 * @param $current_screen
	 */
	function maybe_initialize_hooks( $current_screen ) {

		add_action( 'admin_notices', array( $this, 'render_banner' ) );


//		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_banner_scripts' ) );
//		add_action( 'admin_print_styles', array( Jetpack::init(), 'admin_banner_styles' ) );

	}

	/**
	 * Renders the new connection banner as of 4.4.0.
	 *
	 * @since 4.4.0
	 */
	function render_banner() { ?>
        <div id="message" class="updated jp-wpcom-connect__container">
            <div class="jp-wpcom-connect__inner-container">
				<span
                        class="notice-dismiss connection-banner-dismiss"
                        title="<?php esc_attr_e( 'Dismiss this notice', 'jetpack' ); ?>">
				</span>

				<?php
echo '<pre>';
var_dump($this->addon_details);
echo '</pre>';
				error_log( print_r( $addons, true ) . "\n", 3, WP_CONTENT_DIR . '/debug_new.log' );
				?>
            </div>
        </div>
	<?php }

}

Give_Addon_Activation_Banner::init();