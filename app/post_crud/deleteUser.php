<?php
session_start();
try {
    $id = base64_decode((isset($_GET['id'])) ?
    ($_GET['id']) : 'The ID not found');
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../redirect/redirectTo.php';
$db = Database::getInstance();
$con = $db->getmyDB();
$stmt = $con->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);
if ($stmt->rowCount()) {
    redirect('/public/dashboard/dashboard.php', 'User has delete', 'sucsess');
} else {
    redirect('/public/dashboard/dashboard.php', 'User did not deleted', 'info');
}
} catch (PDOException $th) {
    redirect('/public/dashboard/dashboard.php', 'Something went wrong', 'danger');
}
