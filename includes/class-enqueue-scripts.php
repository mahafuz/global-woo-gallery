<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access

/**
 * Scripts and styles
 */
class GWPG_Scripts {

    /**
	 * The single instance of the class.
	 *
	 * @var self
	 * @since 1.0.0
	 */
	private static $_instance = null;

	/**
	 * Allows for accessing single instance of class. Class should only be constructed once per call.
	 *
	 * @since 1.0.0
	 * @static
	 * @return self Main instance.
	 */
	public static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
    }

    public function __construct() {
        add_action( 'admin_enqueue_scripts', [$this, 'addmin_enqueue_style'] );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_scripts'] );
    }

    public function admin_enqueue_scripts() {
        wp_enqueue_script(
			'gwpg-metabox',
			GWPG_PLUGIN_URI . 'admin/assets/js/gwpg.min.js',
			['jquery'],
			true
		);
		wp_enqueue_script(
			'gwpg-script',
			GWPG_PLUGIN_URI . 'admin/assets/js/metabox.js',
			['jquery'],
			true
		);
    }

    public function addmin_enqueue_style() {
        wp_enqueue_style(
            'gwpg-style',
            GWPG_PLUGIN_URI . 'admin/assets/css/gwpg.min.css',[],
            GWPG_VERSION
        );
    }


}

GWPG_Scripts::instance();