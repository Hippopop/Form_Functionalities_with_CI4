<?php
function getClient()
{
    if (!session()->get('user_token')) {
        require_once APPPATH . 'libraries/vendor/autoload.php';
        $client = new Google_Client();
        $client->setClientId('');
        $client->setClientSecret('');
        $client->setRedirectUri('http://localhost/Course_Folder/CodeIgniter_Version_4/Form_Functionalities/public/OAuthController');
        $client->addScope('email');
        $client->addScope('profile');

        return $client;
    } else {
        return session()->get('user_token');
    }
}
