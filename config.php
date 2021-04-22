<?php
/*
 * Basic Site Settings and API Configuration
 */
  
	
// Database configuration
define('DB_HOST', 'db5001908671.hosting-data.io');
define('DB_USERNAME', 'dbu368582');
define('DB_PASSWORD', 'hvLf3FdqC9MXgN!');
define('DB_NAME', 'dbs1562887');
define('DB_USER_TBL', 'users');

// Facebook API configuration
define('FB_APP_ID', '171926418096894');
define('FB_APP_SECRET', '970e69ffa72fc79d7be15b9228bc48e8');
define('FB_REDIRECT_URL', 'http://vac.happypromo.fr/');

// Start session
if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require_once __DIR__ . '/facebook-php-graph-sdk/autoload.php';

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

// Call Facebook API
$fb = new Facebook(array(
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => 'v3.2',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}
?>