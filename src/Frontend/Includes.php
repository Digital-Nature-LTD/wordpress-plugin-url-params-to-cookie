<?php

namespace DigitalNature\UrlParamToCookie\Frontend;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

class Includes {

    /**
     * constructor
     */
    function __construct()
    {
        // HOOKS
        new \DigitalNature\UrlParamToCookie\Hooks\UrlParamToCookieHooks();
    }
}
