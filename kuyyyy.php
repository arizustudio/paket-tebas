<?php
//--------------------------------------------------------------------------------------
// Instructions:
//--------------------------------------------------------------------------------------
// <theme-name> is the theme assigned to cPanel account.
// 1) cd /usr/local/cpanel/base/frontend/<theme-name>
// 2) mkdir api_examples
// 3) cd api_examples
// 4) create a file Email_passwd_pop.live.php and put this code into that file.
// 5) In your browser login to a cPanel account.
// 6) Manually change the url from: .../frontend/<theme-name>/
//    to .../frontend/<theme-name>/api_examples/Email_passwd_pop.live.php
//--------------------------------------------------------------------------------------

// Instantiate the CPANEL object.
require_once "/usr/local/cpanel/php/cpanel.php";

// Print the header
header('Content-Type: text/plain');

// Connect to cPanel - only do this once.
$cpanel = new CPANEL();

// Call the API
$response = $cpanel->uapi(
    'Email',
    'passwd_pop',
    array (
        'email' => 'it@benchmarklk.co.nz',
        'password' => 'RahasiaPabrikG4n12@@',
    )
);

// Handle the response
if ($response['cpanelresult']['result']['status']) {
    $data = $response['cpanelresult']['result']['data'];
    // Do something with the $data
    // So you can see the data shape we print it here.
    print to_json($data);
}
else {
    // Report errors:
    print to_json($response['cpanelresult']['result']['errors']);
}

// Disconnect from cPanel - only do this once.
$cpanel->end();

//--------------------------------------------------------------------------------------
// Helper function to convert a PHP value to html printable json
//--------------------------------------------------------------------------------------
function to_json($data) {
    return json_encode($data, JSON_PRETTY_PRINT);
}
