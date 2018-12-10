<?php
require_once 'core/init.php';

$user = new user();
if (!$user->isloggedin()) {
    redirect::to('index.php');
}
$user->logout();
echo 1;
// redirect::to('index.php');