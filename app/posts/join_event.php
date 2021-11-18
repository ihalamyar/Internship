    <?php
    require_once __DIR__ . '/../../app/database/database.php';
    session_start();
    $db = Database::getInstance();
    $con = $db->getmyDB();
    $event_id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    // check if user has already joined 
    try {
        $stmt  = $con->prepare("SELECT * FROM join_event WHERE event_id = ? AND user_id = ?");
        $stmt->execute([
            $event_id,
            $user_id,
        ]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            echo 'You already joined in this event';
        } else {
            // -----------------------------
            $row = $con->prepare("INSERT INTO join_event (event_id, user_id) VALUES(?,?)");
            $row->execute([$event_id, $user_id]);
            if ($row->rowCount() > 0) {
                echo 'You successfully joined the envet';
            } else {
                echo 'You did not join the event';
            }
        }
    } catch (PDOException $pdo) {
    }
