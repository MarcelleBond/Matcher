<?php
require_once '../core/init.php';

$usercheck = new user();
$db = DB::getInstance();

if ($usercheck->isloggedin()) {
    redirect::to('index.php');
}

if (input::exists()) {
    if (token::check(input::get('token'))) {
        $validate = new validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'passwd' => array('required' => true),
        ));
        if ($validation->passed()) {
            $user = new user(escape(input::get('username')));
            if ($user->data()->active === '1') {
                $login = $user->login(escape(input::get('username')), escape(input::get('passwd')));
                if ($login) {
                    echo "<script>alert('" . $user->data()->active . "');</script>";
                    redirect::to('index.php');
                } else {
                    echo "Login Failed! Please try again";
                }
            } else {
                echo "Please activate your account";
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
