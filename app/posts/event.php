<?php
require_once __DIR__ . '/../../app/database/database.php';
require_once __DIR__ . '/post.php';
$db = Database::getInstance();
$con = $db->getmyDB();
$posts = new Post($db);
if (!empty($_POST)) {
    $event_title = ($_POST['event_title']);
    $event_description = ($_POST['event_description']);
    $event_speaker = ($_POST['event_speaker']);
    $event_created_at = ($_POST['event_created_at']);
    $event_endded_at = ($_POST['event_endded_at']);
    $posts->event($_POST);
    extract($_POST);
}
