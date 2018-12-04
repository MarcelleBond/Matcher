<?php
require_once '../core/init.php';
$user = new user();
function activeEmail($token, $mail)
{
    $message = '
		Click on link below to activate account:
		http://localhost:8080/camagru/active.php?token=' . $token . '&email=' . $mail;
    $message = wordwrap($message, 100, "\r\n");
    mail(escape($_POST['email']), 'Activation link', $message);
}
if (!$user->isloggedin()) {
    if (Input::exists()) {
        if (token::check(input::get('token'))) {
            $validate = new Validate();
            $validate = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 20,
                    'unique' => 'users',
                ),
                'passwd' => array(
                    'required' => true,
                    'min' => 6,
                ),
                'passwd_again' => array(
                    'required' => true,
                    'matches' => 'passwd',
                ),
                'email' => array(
                    'required' => true,
                    'unique' => 'users',
                    'valid_email' => 1,
                ),
                'gender' => array(
                    'required' => true,
                )
            ));

            if ($validate->passed()) {
                try
                {
                    $token = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890!$()*";
                    $token = str_shuffle($token);
                    $token = substr($token, 0, 10);
                    $user->create(array(
                        'username' => escape(input::get('username')),
                        'first_name' => escape(input::get('first_name')),
                        'last_name' => escape(input::get('last_name')),
                        'passwd' => hash::make(escape(input::get('passwd'))),
                        'email' => escape(input::get('email')),
                        'active' => 0,
                        'ver_code' => $token,
                        'profile' => json_encode(input::get('gender')),
                    ));
                    activeEmail($token, escape(input::get('email')));

                    echo "Please check your email.";

                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                $display;
                foreach ($validation->errors() as $error) {
                    $display .= $error . "<br>";
                }
                echo $display;
            }
        }
    }
} else {
    redirect::to('index.php');
}
