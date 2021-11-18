<?php
require_once __DIR__ . '/../../app/database/database.php';
$db = Database::getInstance();
 $con = $db->getmyDB();
    try {
        $id = $_POST['id'];
        $update = $con->query("UPDATE payment set payment_status = 1  WHERE id = $id ");
        $update->execute($update);
    } catch (\PDOException $e) {
        echo 'Something went wrong';
    }

