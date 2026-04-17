<?php

define('CHAT_API_KEY', '');
define('DEFAULT_SITE_LANGUAGE', 'pt');
define('ALLOW_WEBPAGE_LOADER', false);

define('SITE_NAME', 'Optivest Financiamento®');
define('WEBSITE_CREATED_DATE', '2025-2025');
define('SITE_ADDRESS', 'Trebbin, Markt 1-3 14959 Trebbin Deutschland');

define('SITE_EMAIL', 'info@optivestgroup.com');
define('SITE_PHONE', '+351913555786');
define('SITE_PHONE_2', '');

define('WEBMASTER_NAME', 'Cosimo Mick');
define('AUTHOR_NAME', 'Elena Gallardo');
define('TEAG', '3.75%');

# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------

define('DS', DIRECTORY_SEPARATOR);
define('PAGE_SAMPLE_DIR', dirname(__DIR__) . '/resources/views/elements/');
define('TESTIMONIALS_DIR', PAGE_SAMPLE_DIR . 'testimonials/');
define('PARTNERS_ASSETS_DIR', dirname(__DIR__) . '/public/assets/images/partners/');
define('SITE_WWW', !empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null );
