<?php

namespace DigitalNature\UrlParamToCookie\Frontend;

use DigitalNature\UrlParamToCookie\Helpers\UrlParamToCookieHelper;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

class Includes {

    /**
     * constructor
     */
    function __construct()
    {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_frontend_scripts_and_styles'], 20 );

        // HOOKS
        new \DigitalNature\UrlParamToCookie\Hooks\UrlParamToCookieHooks();
    }

    /**
     * Enqueue the frontend related scripts and styles for this plugin.
     * All the added scripts and styles will be available on every page within the frontend.
     *
     * @return	void
     */
    public function enqueue_frontend_scripts_and_styles()
    {
        $configuration = UrlParamToCookieHelper::get_configured_url_param_mappings();

        // script to save the cookies
        wp_enqueue_script(
            'dn-url-param-to-cookie-script',
            DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_URL . 'assets/frontend/js/save-cookies.js',
            [
            ],
            DIGITAL_NATURE_URL_PARAM_TO_COOKIE_VERSION
        );

        // config is added just before the script above
        wp_add_inline_script(
            'dn-url-param-to-cookie-script',
            "DNURLPARAMTOCOOKIE = {'config' : " . json_encode($configuration) . "}",
            'before'
        );
    }
}
