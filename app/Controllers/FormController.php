<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;


class FormController extends Controller
{
    public function __construct()
    {
        helper('form');
        helper('auth_helper.php');
    }

    public function index()
    {
        $all_data = [];
        $form_rules = [
            'name' => 'required|alpha|min_length[4]',
            'mail' => 'required|valid_email',
            'number' => 'required|exact_length[11]',
            'image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpeg,image/jpg,image/gif,image/png,image/webp]'
                    . '|max_size[image,10000]',
                // . '|max_dims[image,1024,768]',
            ],
        ];


        if ($this->request->getMethod() == 'post' && $this->validate($form_rules)) {

            $name =  $this->request->getVar('name');
            $mail =  $this->request->getVar('mail');
            $numb =  $this->request->getVar('number');

            if ($imagefile = $this->request->getFile('image')) {
                $newName = $imagefile->getRandomName();
                if ($imagefile->isValid() && !$imagefile->hasMoved()) {
                    $User_Model = new UserModel();
                    $confirmation = $User_Model->Insert_User(['user_name' => $name, 'user_mail' => $mail, 'user_phone' => $numb, 'user_image' => $newName]);
                    if (gettype($confirmation) == 'boolean') {
                        $imagefile->move(FCPATH . 'Assets/Uploads/', $newName);
                        return $this->send_mail($mail, $name);
                    } else {
                        return view('errors/html/production', ['e' => $confirmation]);
                    }
                }
            }
        } else {
            $all_data['e'] = $this->validator;
        }

        $client = getClient();
        if (!session()->get('user_token')) {
            $all_data['google'] = getClient()->createAuthUrl();
        }
        return view('form/user_form', $all_data);
    }

    public function send_mail($email, $name)
    {
        $email_instance = \config\Services::email();
        $msg =
            ' <h1>Welcome ' . $name . '!</h1><br>' .
            '<p>This is the email you submitted on <a href="' . base_url() . '">Website.com</a></p><br>' .
            '<br>' .
            '<h3>To confirm your email please click the link below: </h3><br>' .
            '<a href="' . base_url() . '/EmailController">Confirm!</a>';
        $email_instance->setTo($email)->setFrom('Devtrimm.com')->setSubject("Confirmation for your account.")->setMessage($msg);
        if ($email_instance->send()) {
            return view("email_page");
        } else {
            return view("email_page", ["error" => $email_instance->printDebugger(['headers'])]);
        }
    }
}
