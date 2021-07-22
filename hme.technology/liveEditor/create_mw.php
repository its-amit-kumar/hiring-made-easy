<?php

require_once 'RedisDB.php';
// session_start();
// $_SESSION['user'] = 'Ayush';
// echo json_encode(array('status'=>true));

if(isset($_POST['prob']))
{
    $obj = new RedisDB();
    $channelID = $obj->make_new_channel($_POST['prob'],$_POST['title']);

    $status = array('status' => true, 'channelID' => $channelID);
        echo json_encode($status);
    
}
else
{
    echo 0;
}

?>
