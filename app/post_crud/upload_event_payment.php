<?php
session_start();
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../../app/redirect/redirectTo.php';
$db = Database::getInstance();
$con = $db->getmyDB();
$join_event_id = "";
$event_join_file = "";
$user_id = $_SESSION['user_id'];
try {
    $join_event_id = $_POST['join_event_id'];
    $event_join_file = $_FILES['event_join_file']['name'];
    $profile_ext = explode('.', $event_join_file);
    $profile_actual_ext = strtolower(end($profile_ext));
    $allowed_image = array('png', 'jpg', 'jpeg');
    $profile_new = time() . mt_rand() . '.' . $profile_actual_ext;
    $profile_path = '../../public/join_event_image/' . $profile_new;
    if (in_array($profile_actual_ext, $allowed_image)) {
        if ($_FILES['event_join_file']['size'] > 0 && $_FILES['event_join_file']['error'] == 0) {
            if (move_uploaded_file($_FILES['event_join_file']['tmp_name'], $profile_path)) {
                $stmt = $con->prepare("SELECT join_event_image FROM join_event WHERE join_event_id =?");
                $stmt->execute([$join_event_id]);
                $user = $stmt->fetch();
                @unlink('../../public/join_event_image/' . $user['join_event_image']);
                $sql = "UPDATE join_event SET join_event_image = ?  WHERE join_event_id = ?";
                $stmt = $con->prepare($sql);
                $stmt->execute([$profile_new, $join_event_id]);
                if ($stmt->rowCount()) {
                    echo 'Thank you for purchasing, <a href="/public/dashboard/join_events.php">Back home ?</a>';
                } else {
                    echo 'Nothing has changed';
                }
            }
        } else {
            echo "Unable to upload physical file";
        }
    } else {
        echo "This type of image is not allow";
    }
} catch (PDOException $th) {
    echo 'Something went wrong!' . $th->getMessage();;
}


function validate($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return  $data;
}
