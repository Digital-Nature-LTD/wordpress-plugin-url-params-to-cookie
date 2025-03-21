<?php
namespace DigitalNature\UrlParamToCookie\Helpers;

class UrlParamToCookieHelper
{
    const DEFAULT_PREFIX = 'dn_uptc_';

    /**
     * @TODO make this dynamic, so that it can be configured through wp admin
     *
     * The URL params that we will capture and convert into cookies
     *
     * @return array
     */
    public static function get_configured_url_param_mappings(): array
    {
        return [
            'utm_source' => self::DEFAULT_PREFIX . 'utm_source',
            'utm_medium' => self::DEFAULT_PREFIX . 'utm_medium',
            'utm_campaign' => self::DEFAULT_PREFIX . 'utm_campaign',
            'utm_term' => self::DEFAULT_PREFIX . 'utm_term',
            'utm_content' => self::DEFAULT_PREFIX . 'utm_content',
            'utm_id' => self::DEFAULT_PREFIX . 'utm_id',
            'fbclid' => self::DEFAULT_PREFIX . 'fbclid',
            'gclid' => self::DEFAULT_PREFIX . 'gclid',
            'wbraid' => self::DEFAULT_PREFIX . 'wbraid',
            'gbraid' => self::DEFAULT_PREFIX . 'gbraid',
        ];
    }

    /**
     * @return void
     */
    public static function url_params_to_cookies(): void
    {
        $urlParamMappings = self::get_configured_url_param_mappings();

        foreach ($urlParamMappings as $param => $cookieName) {
            if (!empty($_REQUEST[$param])) {
                setcookie(
                    $cookieName,
                    $_REQUEST[$param],
                    strtotime("+4 hours"),
                    '/'
                );
            }
        }
    }

}
