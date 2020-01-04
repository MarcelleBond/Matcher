<?php
require_once 'core/init.php';
$db = DB::getInstance();
$user = new user;

$user->update(array("profile" => json_encode('{"DOB":"1997-09-11","bio":"young and reckless ","fame":146,"gender":"Male","interest":{"ART":"ART","PHOTOGRAPHY":"PHOTOGRAPHY","GETING STONED":"GETING STONED","CODING":"CODING","FRIENDS":"FRIENDS"},"location":"Johannesburg","last_login":"online","preference":"Female","dp":"http://localhost/matcher/images/gallery/Black_Cupid_e22a4d9416fc3c46188751a651ada965.jpg_1.jpeg","notifications":["Amy viewed your page","Amy liked your profile","Amy unliked your profile"]}')));


// {"DOB":"1997-09-11","bio":"young and reckless ","fame":146,"gender":"Male","interest":{"ART":"ART","PHOTOGRAPHY":"PHOTOGRAPHY","GETING STONED":"GETING STONED","CODING":"CODING","FRIENDS":"FRIENDS"},"location":"Johannesburg","last_login":"online","preference":"Female","dp":"http://localhost/matcher/images/gallery/Black_Cupid_e22a4d9416fc3c46188751a651ada965.jpg_1.jpeg","notifications":["Amy viewed your page","Amy liked your profile","Amy unliked your profile"]}