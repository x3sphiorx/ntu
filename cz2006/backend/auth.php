<?php
// DO NOT EDIT THIS FILE.

// Get jsconnect to communicate with forum
require_once '../pages/forum/plugins/jsconnect/functions.jsconnect.php';

// Match those in your jsConnect settings
$clientID = '1610951613';
$secret = 'd91c4fc0137a930332bc1dd46f6b2129';

// Grab the current user from your session management system or database here
session_start();
$signedIn = isset($_COOKIE['signed_in_id']);

// Get user information from session
$user = array();

if ($signedIn)
{
    $user['uniqueid'] = $_COOKIE['signed_in_id'];
    $user['name'] = $_COOKIE['signed_in_id'];
    $user['email'] = $_COOKIE['email'];
    $user['photourl'] = '';
}

// Generate the jsConnect string.
$requestParams['callback'] = $_GET['callback'];
WriteJsConnect($user, $requestParams, $clientID, $secret, false);  // for full page forum
JsSSOString($user, $clientID, $secret);  // add this line if using an embedded forum (remove if not embedded)
?>
