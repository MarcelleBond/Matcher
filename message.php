<?php
require_once 'core/init.php';

$db = DB::getInstance();

switch ($_REQUEST['action']) {
    case 'sendMessage':
        if ($db->insert('messages', array('user' => 'Tyler', 'message' => $_REQUEST['message']))) {
            echo 1;
            exit;
        }
        break;
    case 'getMessages':
        $db->query('SELECT * FROM messages');
        $res = $db->results();
        $chat = '';
        foreach ($res as $key) {
            $chat .= "<div class='single-message'>
                                <strong>" . $key->user . ": </strong> " . $key->message. "
                                <span>".date('d-m-Y h:i a',strtotime($key->date))."</span>
                                </div>";
        }
        echo $chat;
        break;

    default:
        # code...
        break;
}
