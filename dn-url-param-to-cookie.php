<?php
/**
 * dn-url-param-to-cookie
 *
 * @package       DIGITAL_NATURE_URL_PARAM_TO_COOKIE
 * @author        Digital Nature
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Digital Nature - URL Param to cookie
 * Plugin URI:    https://www.digital-nature.co.uk
 * Description:   Creates a cookie for each of the configured URL parameters
 * Version:       1.0.0
 * Author:        Digital Nature
 * Author URI:    https://www.digital-nature.co.uk
 * Text Domain:   dn-url-param-to-cookie
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with dn-url-param-to-cookie. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

use DigitalNature\UrlParamToCookie\Bootstrap;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Plugin name
define('DIGITAL_NATURE_URL_PARAM_TO_COOKIE_NAME',			'dn-url-param-to-cookie');

// Plugin visible name
define('DIGITAL_NATURE_URL_PARAM_TO_COOKIE_FRIENDLY_NAME', 'Digital Nature - URL Param to cookie');

// Plugin version
define('DIGITAL_NATURE_URL_PARAM_TO_COOKIE_VERSION',		'1.0.0');

// Plugin Root File
define('DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_FILE',	__FILE__);

// Plugin base
define('DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_BASE',	plugin_basename(DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_FILE));

// Plugin Folder Path
define('DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_DIR',	plugin_dir_path(DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_FILE));

// Plugin Folder URL
define('DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_URL',	plugin_dir_url(DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_FILE));

/**
 * Bring in the autoloader
 */
require_once DIGITAL_NATURE_URL_PARAM_TO_COOKIE_PLUGIN_DIR . 'vendor/autoload.php';

/**
 * Bring in the bootstrap class
 *
 * @return  Bootstrap|object
 * @since   1.0.0
 * @author  Gareth Midwood
 */
function DIGITAL_NATURE_URL_PARAM_TO_COOKIE() {
	return Bootstrap::instance();
}

DIGITAL_NATURE_URL_PARAM_TO_COOKIE();
