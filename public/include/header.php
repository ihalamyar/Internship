<?php
// this header belongs to the dashboard or admin panel
require_once __DIR__ . '/../../app/middleware/middleware.php';
require_once __DIR__ . '/../../app/database/database.php';
require_once __DIR__ . '/../../app/redirect/redirectTo.php';
require_once __DIR__ . '/../../app/posts/post.php';
require_once __DIR__ . '/../../app/helper/helper.php';
require_once __DIR__ . '/../../app/helper/hashing.php';
// =============middleware=======================
$middleware  = new Middleware();
$middleware->loggedIn();
// ==============Database======================
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_email = $_SESSION['email'];
$hash = new Hashing();
$db = Database::getInstance();
$con = $db->getmyDB();

// ===============Posts=====================
$posts = new Post($db);
$post = $posts->fetch_data('posts');
$sold_course = $posts->fetch_payments();
$join_event = $posts->join_event();
$join_table_3 = $posts->joinTables();
$fetch_profile_by_id = $posts->fetchById('profiles', $user_id);

$profile = $posts->profile($user_id); 

// ===============Helper=====================
$helper = new Helper();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="Iqbal Hussain Alamyar" />
    <meta name="robots" content="" />
    <meta name="description" content="NICT UIN Jakarta" />
    <meta property="og:title" content="NICT UIN Jakarta" />
    <meta property="og:description" content="NICT UIN Jakarta" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">
    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="../error-404.php" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="/favicon.png" />
    <!-- PAGE TITLE HERE ============================================= -->
    <title>NICT UIN Jakarta </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/assets.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/vendors/calendar/fullcalendar.css">
    <!-- time picker -->
    <link rel="stylesheet" href="/public/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/admin/assets/css/bootstrap-datetimepicker.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="/public/font_awesome/css/all.css">
    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/typography.css">

    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/shortcodes/shortcodes.css">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/dashboard.css">
    <link class="skin" rel="stylesheet" type="text/css" href="/public/assets/css/color/color-1.css">

</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
    <!-- new content -->
    <header class="ttr-header">
        <div class="ttr-header-wrapper">
            <!--sidebar menu toggler start -->
            <div class="ttr-toggle-sidebar ttr-material-button">
                <i class="ti-close ttr-open-icon"></i>
                <i class="ti-menu ttr-close-icon"></i>
            </div>
            <!--sidebar menu toggler end -->
            <!--logo start -->
            <div class="ttr-logo-box">
                <div>
                    <a href="/public/dashboard/dashboard.php" class="ttr-logo">
                        <img class="ttr-logo-mobile" alt="" src="/public/assets/images/logo.png" width="30" height="30">
                        <img class="ttr-logo-desktop" alt="" src="/public/assets/images/logo.png" width="100" height="27">
                    </a>
                </div>
            </div>
            <!--logo end -->

            <div class="ttr-header-right ttr-with-seperator">
                <!-- header right menu start -->
                <ul class="ttr-header-navigation">
                    <!-- <li>
                        <a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
                    </li> -->
                    <!-- <li>
                        <a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-bell"></i></a>
                        <div class="ttr-header-submenu noti-menu">
                            <div class="ttr-notify-header">
                                <span class="ttr-notify-text-top">9 New</span>
                                <span class="ttr-notify-text">User Notifications</span>
                            </div>
                            <div class="noti-box-list">
                                <ul>
                                    <li>
                                        <span class="notification-icon dashbg-gray">
                                            <i class="fa fa-check"></i>
                                        </span>
                                        <span class="notification-text">
                                            <span>Sneha Jogi</span> sent you a message.
                                        </span>
                                        <span class="notification-time">
                                            <a href="#" class="fa fa-close"></a>
                                            <span> 02:14</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="notification-icon dashbg-yellow">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                        <span class="notification-text">
                                            <a href="#">Your order is placed</a> sent you a message.
                                        </span>
                                        <span class="notification-time">
                                            <a href="#" class="fa fa-close"></a>
                                            <span> 7 Min</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="notification-icon dashbg-red">
                                            <i class="fa fa-bullhorn"></i>
                                        </span>
                                        <span class="notification-text">
                                            <span>Your item is shipped</span> sent you a message.
                                        </span>
                                        <span class="notification-time">
                                            <a href="#" class="fa fa-close"></a>
                                            <span> 2 May</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="notification-icon dashbg-green">
                                            <i class="fa fa-comments-o"></i>
                                        </span>
                                        <span class="notification-text">
                                            <a href="#">Sneha Jogi</a> sent you a message.
                                        </span>
                                        <span class="notification-time">
                                            <a href="#" class="fa fa-close"></a>
                                            <span> 14 July</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="notification-icon dashbg-primary">
                                            <i class="fa fa-file-word-o"></i>
                                        </span>
                                        <span class="notification-text">
                                            <span>Sneha Jogi</span> sent you a message.
                                        </span>
                                        <span class="notification-time">
                                            <a href="#" class="fa fa-close"></a>
                                            <span> 15 Min</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li> -->
                    <li>
                        <?php if (is_array($fetch_profile_by_id) || is_object($fetch_profile_by_id)) : ?>
                            <?php foreach ($fetch_profile_by_id as $dash_pros) : ?>
                                <?php if (is_null($dash_pros['image'])) : ?>
                                    <a href="#" class="ttr-material-button ttr-submenu-toggle">
                                        <span class="ttr-user-avatar">
                                            <img alt="" src="/public/assets/images/testimonials/pic3.jpg" width="32" height="32">
                                        </span>
                                    </a>
                                <?php else : ?>
                                    <a href="#" class="ttr-material-button ttr-submenu-toggle">
                                        <span class="ttr-user-avatar">
                                            <img alt="" src="../../public/profile_image/<?php echo $dash_pros['image'] ?? NULL; ?>" width="32" height="32">
                                        </span>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="ttr-header-submenu">
                            <ul>
                                <li><a href="profile.php">My profile</a></li>
                                <!-- <li><a href="list_view_calendar.php">Activity</a></li> -->
                                <!-- <li><a href="mailbox.php">Messages</a></li> -->
                                <li><a href="/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="ttr-hide-on-mobile">
                        <a href="#" class="ttr-material-button"><i class="ti-layout-grid3-alt"></i></a>
                        <div class="ttr-header-submenu ttr-extra-menu">
                            <a href="#">
                                <i class="fa fa-music"></i>
                                <span>Musics</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-youtube-play"></i>
                                <span>Videos</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span>Emails</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Reports</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-smile-o"></i>
                                <span>Persons</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-picture-o"></i>
                                <span>Pictures</span>
                            </a>
                        </div>
                    </li> -->
                </ul>
                <!-- header right menu end -->
            </div>
            <!--header search panel start -->
            <div class="ttr-search-bar">
                <form class="ttr-search-form">
                    <div class="ttr-search-input-wrapper">
                        <input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
                        <button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
                    </div>
                    <span class="ttr-search-close ttr-search-toggle">
                        <i class="ti-close"></i>
                    </span>
                </form>
            </div>
            <!--header search panel end -->
        </div>
    </header>