<?php
/**
 * Main TRU CMS class
 *
 * @package TRU_CMS
 * @since   0.1.0
 */

/**
 * Final Fantasy_Cycling class.
 *
 * @final
 */
final class TRU_CMS {

    public $version = '0.1.0';

    protected static $_instance = null;

    /**
     * instance function.
     *
     * @access public
     * @static
     * @return void
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) :
            self::$_instance = new self();
        endif;

        return self::$_instance;
    }

    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct() {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
    }

    /**
     * define_constants function.
     *
     * @access private
     * @return void
     */
    private function define_constants() {
        define( 'TRU_CMS_PATH', plugin_dir_path( __FILE__ ) );
        define( 'TRU_CMS_URL', plugin_dir_url( __FILE__ ) );
        define( 'TRU_CMS_VERSION', $this->version );
    }

    /**
     * init_hooks function.
     *
     * @access private
     * @return void
     */
    private function init_hooks() {
        add_action( 'init', array( $this, 'init' ), 0 );
    }

    /**
     * includes function.
     *
     * @access public
     * @return void
     */
    public function includes() {
        include_once( TRU_CMS_PATH . 'post-types/news.php' );
        include_once( TRU_CMS_PATH . 'post-types/faq.php' );                
    }

    /**
     * init function.
     *
     * @access public
     * @return void
     */
    public function init() {}
}

function trucms() {
    return TRU_CMS::instance();
}

// Global for backwards compatibility.
$GLOBALS['trucms'] = trucms();
