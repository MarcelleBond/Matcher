<?php
require_once 'core/init.php';
$user = new user;
$db = DB::getInstance();
if (Input::exists('request')) {
    if (input::get('action') === 'display_info') {
        echo json_encode($user->data());
    }
}
if ($_FILES['image']) {
    $target_dir = "images/gallery/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo 0;
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo 0;
        $uploadOk = 0;
    }
    if ($_FILES["image"]["size"] > 500000) {
        echo 0;
        $uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo 0;
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo 0;
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			$profile = json_decode($user->data()->profile);
			if (!$profile->dp)
			{
				$profile->dp = $target_file;
				$user->update(array('profile' => json_encode($profile)));
			}
            echo 1;
        } else {
            echo 0;
        }
    }
}
