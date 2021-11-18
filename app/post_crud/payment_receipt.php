<?php
session_start();
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../../app/redirect/redirectTo.php';
$db = Database::getInstance();
$con = $db->getmyDB();
$user_pay_id = "";
$enroll_pay_id = "";
$payment_file = "";
$user_id = $_SESSION['user_id'];
try {
    $sql = "SELECT * FROM enroll WHERE user_id  = $user_id AND status = 0";
    $stmt = $con->query($sql);
    $user = $stmt->fetch();
    if (isset($user['payment_status']) == 0) {
        $enroll_pay_id = $_POST['enroll_pay_id'];
        $payment_file = $_FILES['payment_file']['name'];
        $profile_ext = explode('.', $payment_file);
        $profile_actual_ext = strtolower(end($profile_ext));
        $allowed_image = array('png', 'jpg', 'jpeg');
        $profile_new = time() . mt_rand() . '.' . $profile_actual_ext;
        $profile_path = '../../public/payment_image/' . $profile_new;
        if (in_array($profile_actual_ext, $allowed_image)) {
            if ($_FILES['payment_file']['size'] > 0 && $_FILES['payment_file']['error'] == 0) {
                if (move_uploaded_file($_FILES['payment_file']['tmp_name'], $profile_path)) {
                    $stmt = $con->prepare("SELECT image from enroll WHERE id =?");
                    $stmt->execute([$enroll_pay_id]);
                    $user = $stmt->fetch();
                    @unlink('../../public/payment_image/' . $user['image']);
                    $sql = "UPDATE enroll SET image = ?  WHERE id = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->execute([$profile_new, $enroll_pay_id]);
                    if ($stmt->rowCount()) {
                        echo 'Thank you for purchasing, <a href="/public/dashboard/user_courses.php">Back home ?</a>';
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
    } else {
        echo "Already submitted";
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
