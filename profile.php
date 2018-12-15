<?php
require_once 'core/init.php';
$user = new user;
$db = DB::getInstance();
$profile = json_decode($user->data()->profile);

if (Input::exists('request')) {
    ///////SEND USER INFO FOR DISPLAY////////////
    if (input::get('action') === 'display_info') {
        echo json_encode($user->data());
    }
    ///////SEND USER IMAGES FOR DISPLAY////////////
    else if (input::get('images')) {
        echo json_encode($db->get('gallery', array('user_id', '=', $user->data()->user_id))->results());
    }
    ///////UPDATE BIO////////////
    else if (input::get('bio')) {
        $profile->bio = input::get('bio');
        $user->update(array('profile' => json_encode($profile)));
        echo 1;
    }

    ///////UPDATE INTEREST////////////
    else if (input::get('tags')) {
        $interest = array();
        $tags = input::get('tags');
        foreach ($tags as $key => $value) {
            $interest[$value] = $value;
        }
        $profile->interest = $interest;
        $user->update(array('profile' => json_encode($profile)));
    }
    ///////UPDATE PREFERENCE////////////
    else if (input::get('pref')) {
        $profile->preference = input::get('pref');
        $user->update(array('profile' => json_encode($profile)));
    }
    ///////UPDATE PROFILE PICTURE////////////
    else if (input::get('new_propic')) {
        $profile->dp = input::get('new_propic');
        $user->update(array('profile' => json_encode($profile)));
    }
    ///////UPDATE PROFILE PICTURE////////////
    else if (input::get('delete_pic')) {
        $db->delete('gallery', array("img_name", '=', input::get('delete_pic')));
		if(isset($profile->dp))
			if ($profile->dp == input::get('delete_pic')) {
				unset($profile->dp);
				$user->update(array('profile' => json_encode($profile)));
			}
		unlink(input::get('delete_pic'));
        echo 1;
    }

}

////////////////////////////////////UPLOAD OF IMAGE///////////////////////////
else if ($_FILES['image']) {
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
        if (($count = $db->get('gallery', array('user_id', '=', $user->data()->user_id))->count()) < 5) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $user->data()->username . '_image_' . $count . '.jpeg')) {
                if (!$profile->dp) {
                    $profile->dp = $target_dir . $user->data()->username . '_image_' . $count . '.jpeg';
                    $user->update(array('profile' => json_encode($profile)));
                }
                $db->insert('gallery', array('img_name' => $target_dir . $user->data()->username . '_image_' . $count . '.jpeg', 'user_id' => $user->data()->user_id));
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 2;
        }

    }
}
