  <?php
  require_once __DIR__ . '/../database/database.php';
  session_start();
  $user_id = $_SESSION['user_id'];
  $db = Database::getInstance();
  $con = $db->getmyDB();

  $id = "";
  $bio = "";
  $country = "";
  $age = "";
  $country = "";
  $education = "";
  $file = "";
  $profile_tmp = "";
  try {
    $id = validated($_POST['id']);
    $bio = validated($_POST['bio']);
    $country = validated($_POST['country']);
    $age = validated($_POST['age']);
    $education = validated($_POST['education']);
    $profile_name = addslashes($_FILES['file']['name']);
    $profile_ext = explode('.', $profile_name);
    $profile_actual_ext = strtolower(end($profile_ext));
    $allowed_image = array('png', 'jpg', 'jpeg');
    $profile_new = time() . mt_rand() . '.' . $profile_actual_ext;
    $profile_path = '../../public/profile_image/' . $profile_new;

    if (in_array($profile_actual_ext, $allowed_image)) {
      if ($_FILES['file']['size'] > 0 && $_FILES['file']['error'] == 0) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $profile_path)) {
          $stmt = $con->prepare("SELECT image FROM profiles  WHERE user_id = ?");
          $stmt->execute([$user_id]);
          $user = $stmt->fetch();
          @unlink('../../public/profile_image/' . $user['image']);
          $data = [
            'bio' => $bio,
            'country' => $country,
            'age' => $age,
            'education' => $education,
            'profile_new' => $profile_new,
            'id' => $id,
          ];
          $sql = "UPDATE profiles SET bio=:bio, 
                        country=:country,
                        age=:age, 
                        education=:education,
                        image=:profile_new 
                        WHERE id =:id";
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
    }
  } catch (PDOException $th) {
    echo 'Something went wrong!' . $th->getMessage();
  }

  function validated($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
  }
