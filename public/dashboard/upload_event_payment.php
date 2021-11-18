<?php require_once __DIR__ . '/../include/header.php'; ?>
<!-- Upload the receipt of your payment -->
<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            <a href="#"><img alt="" src="/public/assets/images/logo.png" width="70" height="27"></a>

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
                <ul>
                    <li>
                        <a href="mailbox.php" class="ttr-material-button"><span class="ttr-label">Mail Box</span></a>
                    </li>
                    <li>
                        <a href="mailbox_compose.php" class="ttr-material-button"><span class="ttr-label">Compose</span></a>
                    </li>
                    <li>
                        <a href="mailbox_read.php" class="ttr-material-button"><span class="ttr-label">Mail Read</span></a>
                    </li>
                </ul>
                </li>
                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-calendar"></i></span>
                        <span class="ttr-label">Calendar</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="basic_calendar.php" class="ttr-material-button"><span class="ttr-label">Basic Calendar</span></a>
                        </li>
                        <li>
                            <a href="list_view_calendar.php" class="ttr-material-button"><span class="ttr-label">List View</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="bookmark.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
                        <span class="ttr-label">Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="review.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-comments"></i></span>
                        <span class="ttr-label">Review</span>
                    </a>
                </li>
                <li>
                    <a href="add-listing.php" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-layout-accordion-list"></i></span>
                        <span class="ttr-label">Add listing</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">My Profile</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="user_profile.php" class="ttr-material-button"><span class="ttr-label">User Profile</span></a>
                        </li>
                        <li>
                            <a href="teacher_profile.php" class="ttr-material-button"><span class="ttr-label">Teacher Profile</span></a>
                        </li>
                    </ul>
                </li>
                <li class="ttr-seperate"></li>
            </ul>
            <!-- sidebar menu end -->
        </nav>
        <!-- sidebar menu end -->
    </div>
</div>
<!-- main content -->
<main class="ttr-wrapper">

    <div class="container">
        <?php require_once __DIR__ . '/../include/card_header.php'; ?>
        <?php $payment = isset($_GET['payment'])  ?  $_GET['payment'] : NULL; ?>
        <?php if (isset($_GET['payment'])) : ?>
            <?php
            $data = $con->query("SELECT * FROM join_event WHERE join_event_id = {$hash->unhash($payment)}");
            foreach ($data as $row) { ?>
                <div class="row">
                    <div class="alert alert-success col-lg-12" role="alert" id="join_event_message" style="display: none;"></div>
                    <div class="col-lg-12">
                        <h6>Upload the receipt of the payment</h6>
                        <form method="POST" id="join_event_form" style="width: 100%">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="join_event_id" id="join_event_id" value="<?php echo $row['join_event_id']; ?>" placeholder="Enroll ID">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="event_join_file" id="event_join_file" required>
                            </div>
                        </form>
                        <button type="button" name="event_joinBtn" id="event_joinBtn" class="btn green outline">submit payment</button>
                    </div>
                </div>
            <?php } ?>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                Wrong token
            </div>
        <?php endif; ?>

</main>
<?php require_once __DIR__ . '/../include/footer.php'; ?>