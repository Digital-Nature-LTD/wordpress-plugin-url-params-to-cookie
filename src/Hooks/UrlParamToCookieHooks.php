<?php
namespace DigitalNature\UrlParamToCookie\Hooks;


use DigitalNature\UrlParamToCookie\Helpers\UrlParamToCookieHelper;

class UrlParamToCookieHooks
{
    public function __construct()
    {
        add_action('wp_loaded', [$this, 'wp_loaded']);
    }

    /**
     * @return void
     */
    public function wp_loaded(): void
    {
        UrlParamToCookieHelper::url_params_to_cookies();
    }
}
