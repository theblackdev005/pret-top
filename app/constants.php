<?php

define('CHAT_API_KEY', '');
define('DEFAULT_SITE_LANGUAGE', 'fr');
define('ALLOW_WEBPAGE_LOADER', false);

define('SITE_NAME', 'JemloPay Finance®');
define('WEBSITE_CREATED_DATE', '2018-2025');
define('SITE_ADDRESS', 'Ferdinand 262610 Edegem, Belgique');

define('SITE_EMAIL', 'contact@jemlopay.eu');
define('SITE_PHONE', '+32460226774');
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