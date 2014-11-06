<?php

$basePath = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'];

/**
 * The Client ID is used to identify the OAuth Consumer. You may request a
 * Client ID by asking the easySYS Support
 */
define('EASYSYS_CLIENT_ID', "");

/**
 * The Client Secret is used to verify the OAuth Consumer. This secret should
 * always be kept secret (Most of you may already have guessed it :)).
 * 
 * You may request a Client Secret by asking the easySYS Support
 */
define('EASYSYS_CLIENT_SECRET', "");

/**
 * The EASYSYS_AUTH_URL should be the authorization url of the OAuth Provider
 */
define('EASYSYS_AUTH_URL', "https://office.easysys.ch/oauth/authorize");

/**
 * The EASYSYS_TOKEN_URL should be the url of the OAuth Provider to fetch an access token.
 */
define('EASYSYS_TOKEN_URL', "https://office.easysys.ch/oauth/access_token");

/**
 * The base url for the easySYS API
 */
define('EASYSYS_API_URL', "https://office.easysys.ch/api2.php");

/**
 * The URL of this sample application. 
 * 
 * Example:
 * If you call the example from http://localhost/oauth_example/index.php
 * you should set this value to http://localhost/oauth_example
 */
define('APPLICATION_PATH', $basePath);

/**
 * The OAuth Provider will redirect the user to this URL after the authorization step
 */
define('APPLICATION_REDIRECTION_URL', APPLICATION_PATH . "/process.php");

/**
 * The scopes you need for your application (Use space to split multiple entries)
 */
define('APPLICATION_SCOPES', "contact_edit monitoring_show");

checkConfig(array(
    EASYSYS_CLIENT_ID,
    EASYSYS_CLIENT_SECRET,
    EASYSYS_AUTH_URL,
    EASYSYS_TOKEN_URL,
    EASYSYS_API_URL,
    APPLICATION_REDIRECTION_URL,
    APPLICATION_SCOPES
));

function checkConfig(array $configurations) {
    foreach($configurations as $config) {
        if(!$config){
            die('please configure the application (see config/config.php)');
        }
    }
}
?>
