<?php

define('CHAT_API_KEY', '');
define('DEFAULT_SITE_LANGUAGE', 'fr');
define('ALLOW_WEBPAGE_LOADER', false);

define('SITE_NAME', 'Test Dev');
define('WEBSITE_CREATED_DATE', '2025-2026');
define('SITE_ADDRESS', 'Trebbin, Markt 1-3 14959');
define('LEGAL_FULL_NAME', SITE_NAME);
define('LEGAL_REGISTRATION_OR_VAT_NUMBER', '12345DD');

define('SITE_EMAIL', 'hey@theblackdev.com');
define('SITE_PHONE', '+313555786');
define('SITE_PHONE_2', '');

define('WEBMASTER_NAME', 'Cosimo Mick');
define('AUTHOR_NAME', 'Elena Gallardo');
define('TEAG', '3.75%');
define('LOAN_PROCESSING_FEE_AMOUNT', 250);
define('LOAN_PROCESSING_FEE_CURRENCY', '€');
define('LOAN_PROCESSING_FEE', LOAN_PROCESSING_FEE_AMOUNT . ' ' . LOAN_PROCESSING_FEE_CURRENCY);

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
