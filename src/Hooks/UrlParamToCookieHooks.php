<?php
namespace DigitalNature\UrlParamToCookie\Hooks;

use DigitalNature\UrlParamToCookie\Helpers\UrlParamToCookieHelper;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

class UrlParamToCookieHooks
{
    public function __construct()
    {
        // @TODO make server side capture optional and include this if it's active
        //add_action('wp_loaded', [$this, 'wp_loaded']);
    }

    /**
     * @return void
     */
    public function wp_loaded(): void
    {
        UrlParamToCookieHelper::save_url_params_to_cookies();
    }
}
