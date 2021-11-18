<?php
require_once __DIR__ . '/../database/database.php';
$db = Database::getInstance();
$con = $db->getmyDB();
$user_id = 0;
// if (!empty($_POST)) {
    $user_id  = htmlspecialchars($_POST['id']);
    $stmt = $con->prepare('SELECT * FROM profiles WHERE user_id=:user_id');
    $stmt->execute(array(':user_id' => $user_id));
    $data = array();
    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data['profile_bio'] = $row['bio'];
        $data['profile_country'] = $row['country'];
        $data['profile_age'] = $row['age'];
        $data['profile_education'] = $row['education'];
        $data['profile_id'] = $row['user_id'];
        // $data['profile_image'] = $row['image'];
    // }
    echo json_encode($data);
  
// }
