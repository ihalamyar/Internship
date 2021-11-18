<!-- this header belongs to the front page, like index.php, and the rest
of the files is in the fron_include/pages -->
<?php require_once __DIR__ . '/../../app/database/database.php'; ?>
<?php require_once __DIR__ . '/../../app/helper/helper.php'; ?>
<?php require_once __DIR__ . '/../../app/helper/hashing.php'; ?>
<?php require_once __DIR__ . '/../../app/posts/post.php'; ?>
<?php require_once __DIR__ . '/../../app/middleware/middleware.php'; ?>
<?php
$middleware = new Middleware();
$middleware->isLoggedIn();
$db = Database::getInstance();
$con = $db->getmyDB();
$posts = new Post($db);
$helper = new Helper();
$hash = new Hashing();
$post = $posts->fetch_data('posts');
$related = $posts->relatedPost('posts');
$posts_details = $posts->joinTables();// join three tables
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharing</title>
    <!-- Custome style.css -->
    <!-- <link rel="stylesheet" href="/public/asset/style.css"> -->
    <!-- this is the dashboards style -->
    <link rel="icon" type="image/x-icon" href="/favicon.png" />
    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" href="/public/admin/assets/css/assets.css">
    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" href="/public/admin/assets/css/typography.css"> 
    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" href="/public/admin/assets/css/shortcodes/shortcodes.css">
    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" href="/public/admin/assets/css/style.css"> 
    <link rel="stylesheet" href="/public/admin/assets/css/color/color-1.css">
<!-- REVOLUTION SLIDER CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/admin/assets/vendors/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="/public/admin/assets/vendors/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="/public/admin/assets/vendors/revolution/css/navigation.css">
    <!-- end here -->
</head>
<!-- <li><a href="/public/login/login.php">Login</a></li> -->
<body id="bg">
<div class="page-wraper">

<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>