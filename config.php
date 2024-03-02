<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'gmaillogin/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('732364379063-l4gu4n47mujpd0f700einpkcgeq74bkk.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('t75xUP5J0lFT-oDuBWtBaVcj');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost:8181/Newsportal/newsportal/gmail_login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>