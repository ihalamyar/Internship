<?php
// edit your event, this file edits your event
// the php script is written here, this is called by ajax, event_edit.js
require_once __DIR__ . '/../database/database.php';
$db = Database::getInstance();
$con = $db->getmyDB();
$profile_id = "";
$profile_bio = "";
$profile_country = "";
$profile_age = "";
$profile_education = "";
$profile_image = "";
$profile_tmp = "";
// try {
$event_id_edit = ($_POST['event_id_edit']);
$event_title_edit = ($_POST['event_title_edit']);
$event_description_edit = ($_POST['event_description_edit']);
$event_speaker_edit = ($_POST['event_speaker_edit']);
$event_image_edit = $_FILES['event_image_edit']['name'];
$event_created_at_edit = ($_POST['event_created_at_edit']);
$event_endded_at_edit = ($_POST['event_endded_at_edit']);
$profile_ext = explode('.', $event_image_edit);
$profile_actual_ext = strtolower(end($profile_ext));
$allowed_image = array('png', 'jpg', 'jpeg');
$profile_new = time() . mt_rand() . '.' . $profile_actual_ext;
$profile_path = '../../public/event_images/' . $profile_new;
if (in_array($profile_actual_ext, $allowed_image)) {
    if ($_FILES['event_image_edit']['size'] > 0 && $_FILES['event_image_edit']['error'] == 0) {
        if (move_uploaded_file($_FILES['event_image_edit']['tmp_name'], $profile_path)) {
            $stmt = $con->prepare("SELECT event_image FROM event  WHERE event_id=?");
            $stmt->execute([$event_id_edit]);
            $user = $stmt->fetch();
            @unlink('../../public/event_images/' . $user['event_image']);
            $sql = "
                        UPDATE event SET 
                        event_title =       :event_title_edit, 
                        event_description = :event_description_edit,
                        event_speaker =     :event_speaker_edit,
                        event_image =       :profile_new,
                        event_created_at =  :event_created_at_edit,
                        event_endded_at =   :event_endded_at_edit
                        WHERE event_id=    :event_id_edit";
            $data = [
                'event_title_edit' => $event_title_edit,
                'event_description_edit' => $event_description_edit,
                'event_speaker_edit' => $event_speaker_edit,
                'profile_new' => $profile_new,
                'event_created_at_edit' => $event_created_at_edit,
                'event_endded_at_edit' => $event_endded_at_edit,
                'event_id_edit' => $event_id_edit
            ];

            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            if ($stmt->rowCount()) {
                echo 'Changes has updated';
            } else {
                echo 'Nothing has changed';
            }
        }
    } else {
        echo "Unable to upload physical file";
    }
} else {
    echo "This type of image is not allow";
    return false;
}
// } catch (PDOException $th) {
//     echo 'Something went wrong!' . $th->getMessage();
// }
function validate($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return  $data;
}
