<?php
namespace DigitalNature\UrlParamToCookie\Helpers;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

class UrlParamToCookieHelper
{
    const DEFAULT_PREFIX = 'dn_uptc_';

    /**
     * @TODO make this dynamic, so that it can be configured through wp admin
     *
     * The URL params that we will capture and convert into cookies, plus their configuration
     *
     * @return array
     */
    public static function get_configured_url_param_mappings(): array
    {
        return [
            'defaults' => [
                'ttl' => 3600,
                'path' => '/',
            ],
            'params' => [
                'utm_source' => [
                    'name' => self::DEFAULT_PREFIX . 'utm_source',
                ],
                'utm_medium' => [
                    'name' => self::DEFAULT_PREFIX . 'utm_medium',
                ],
                'utm_campaign' => [
                    'name' => self::DEFAULT_PREFIX . 'utm_campaign',
                ],
                'utm_term' => [
                    'name' => self::DEFAULT_PREFIX . 'utm_term',
                ],
                'utm_content' => [
                    'name' => self::DEFAULT_PREFIX . 'utm_content',
                ],
                'utm_id' => [
                    'name' => self::DEFAULT_PREFIX . 'utm_id',
                ],
                'fbclid' => [
                    'name' => self::DEFAULT_PREFIX . 'fbclid',
                ],
                'gclid' => [
                    'name' => self::DEFAULT_PREFIX . 'gclid',
                ],
                'wbraid' => [
                    'name' => self::DEFAULT_PREFIX . 'wbraid',
                ],
                'gbraid' => [
                    'name' => self::DEFAULT_PREFIX . 'gbraid',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function get_populated_cookies(): array
    {
        $populated = [];

        $mappings = self::get_configured_url_param_mappings();

        foreach ($mappings as $param => $cookieConfig) {
            $value = $_COOKIE[$cookieConfig['name']];

            if (empty($value)) {
                continue;
            }

            $populated[$param] = $value;
        }

        return $populated;
    }

    /**
     * Saves to cookies server-side
     *
     * @return void
     */
    public static function save_url_params_to_cookies(): void
    {
        $configuration = self::get_configured_url_param_mappings();
        $urlParamMappings = $configuration['params'];
        $defaults = $configuration['defaults'];

        foreach ($urlParamMappings as $param => $cookieConfig) {
            if (!empty($_REQUEST[$param])) {
                $ttl = $cookieConfig['ttl'] ?? $defaults['ttl'];

                setcookie(
                    $cookieConfig['name'],
                    $_REQUEST[$param],
                    time() + $ttl,
                    $cookieConfig['path'] ?? $defaults['path']
                );
            }
        }
    }

}
