<?php

// IIS Mod-Rewrite
if (isset($_SERVER['HTTP_X_ORIGINAL_URL'])) {
$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_ORIGINAL_URL'];
}
// IIS Isapi_Rewrite
else if (isset($_SERVER['HTTP_X_REWRITE_URL'])) {
$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_REWRITE_URL'];
}
else
{
// Use ORIG_PATH_INFO if there is no PATH_INFO
if ( !isset($_SERVER['PATH_INFO']) && isset($_SERVER['ORIG_PATH_INFO']) )
$_SERVER['PATH_INFO'] = $_SERVER['ORIG_PATH_INFO'];

// Some IIS + PHP configurations puts the script-name in the path-info (No need to append it twice)
if ( isset($_SERVER['PATH_INFO']) ) {
if ( $_SERVER['PATH_INFO'] == $_SERVER['SCRIPT_NAME'] )
$_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'];
else
$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'] . $_SERVER['PATH_INFO'];
}

// Append the query string if it exists and isn't null
if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
}
}

require("index.php");

?>