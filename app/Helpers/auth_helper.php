<?php
function getClient()
{
    if (!session()->get('user_token')) {
        require_once APPPATH . 'libraries/vendor/autoload.php';
        $client = new Google_Client();
        $client->setClientId('');   // Enter your clientId;
        $client->setClientSecret('');   // Enter your secret;
        $client->setRedirectUri('');    // Enter the uri you want to redirect to that you added on console too;
        $client->addScope('email');
        $client->addScope('profile');

        return $client;
    } else {
        return session()->get('user_token');
    }
}
