<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Google_Client;
use Google_Service;

class OAuthController extends Controller
{
    public function index()
    {
      helper('auth_helper.php');
      $client = getClient();

      if($this->request->getVar('code'))
      {
        $token = $client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        // $client->authenticate();

        if(!isset($token['error']))
        {
          require_once APPPATH . 'libraries/vendor/autoload.php';
          $client->setAccessToken($token['access_token']);
          session()->set('user_token', $token['access_token']);
          // // $plus = new \Google\AuthHandler
          // $services = new Google_Service($client);
          // $services
          $services = new \Google_Service_Oauth2($client);
          $data = [];
          $data['user_info'] = $services->userinfo->get();
          return view('oauth_page', $data);


        }
      }

      return view('oauth_page');
    }
}
