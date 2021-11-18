<?php require_once __DIR__ . '/../include/header.php'; ?>

<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            <a href="#"><img alt="" src="/public/admin/assets/images/logo.png" width="122" height="27"></a>

            <div class="ttr-sidebar-toggle-button">
                <i class="ti-arrow-left"></i>
            </div>
        </div>
        <!-- sidebar menu start -->
        <nav class="ttr-sidebar-navi">
            <ul>
            <li>
                    <a href="dashboard.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-home"></i></span>
                        <span class="ttr-label">Dashborad</span>
                    </a>
                </li>
                <li>
                    <a href="all_posts.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Posts</span>
                    </a>
                </li>
                <li>
                    <a href="all_events.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Events</span>
                    </a>
                </li>
                <li>
                    <a href="user_courses.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Your Courses</span>
                    </a>
                </li>
                <li>
                    <a href="join_events.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Your events</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">My Profile</span>
                    </a>
                </li>
                <li class="ttr-seperate"></li>
            </ul>
            <!-- sidebar menu end -->
        </nav>
        <!-- sidebar menu end -->
    </div>
</div>
<!-- Left sidebar menu end -->


<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">

        <?php require_once __DIR__ . '/../include/card_header.php'; ?>
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">

                    <?php $read_id = isset($_GET['details']) ?  $_GET['details'] : NULL; ?>
                    <?php if (isset($_GET['details'])) : ?>
                        <?php
                        $sql = "SELECT * FROM event WHERE event_id  = {$hash->unhash($read_id)} LIMIT 1";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="widget-inner">
                            <h3><?php echo $row['event_title']; ?></h3>
                            <img src="/public/event_images/<?php echo $row['event_image']; ?>" class=" img-thumbnail" style="width: 100%; height: 400px;">
                            <p>
                                <?php echo $row['event_description']; ?>
                            </p>
                            <h6>Speaker: <strong><?php echo ucwords($row['event_speaker']); ?></strong></h6>
                            <div>
                                <small>Start Time: <strong> <?php echo $helper->CustomDateFormat($row['event_created_at']); ?></strong></small>
                                <br>
                                <small>End Time: <strong>  <?php echo $helper->CustomDateFormat($row['event_endded_at']); ?></strong></small>
                            </div>
                            <div class="mt-2">
                                <div class="alert alert-success" role="alert" id="join_event_message" style="display: none"></div>
                                <form method="POST" id="join_event_form">
                                    <?php if ($row['event_created_at'] >= $row['event_endded_at']) : ?>
                                        <button class="btn button " >Event Expired</button>
                                        <?php else: ?>
                                            <button class="btn button join_event_Btn" id="<?php echo $row['event_id']; ?>">Join</button>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../include/footer.php'; ?>