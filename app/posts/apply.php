<?php
require_once __DIR__ . '/../../app/database/database.php';
$db = Database::getInstance();
$con = $db->getmyDB();
$purchase_post_id = $_POST['purchase_post_id'];
$purchase_user_id = $_POST['purchase_user_id'];
$d=date ("d");
$m=date ("m");
$y=date ("Y");
$t=time();
$dmt=$d+$m+$y+$t;    
$ran= rand(0,10000000);
$dmtran= $dmt+$ran;
$un=  uniqid();
$dmtun = $dmt.$un;
$mdun = md5($dmtran.$un);
$sort=substr($mdun, 16); // if you want sort length code.

if (
    !preg_match('/^([0-9]*)$/', $purchase_user_id)
    || !preg_match('/^([0-9]*)$/', $purchase_post_id)
) {
    echo 'Invalid data ';
} else {
    $sql_check = "SELECT * FROM enroll WHERE user_id = {$purchase_user_id} AND status = 0";
    $user = $con->query($sql_check)->fetch();
    if(isset($user['status']) == 0){
        $sql = "INSERT INTO enroll (post_id, user_id, token) VALUES(?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$purchase_post_id, $purchase_user_id, $mdun]);
        if($stmt){
            echo 'Applied successfully';
        }else{
            echo 'Something went wrong';
        }
    }else{
        echo 'Complete the payment';
    }

}
