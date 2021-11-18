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
<?php if ($_SESSION['user_role_id'] == 0) : ?>

    <!--Main container start -->
    <main class="ttr-wrapper">
        <div class="container-fluid">

            <div class="row">
                <!-- Your Profile Views Chart -->
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">
                        <div class="wc-title">
                            <h4>Make event</h4>
                        </div>
                        <?php $read_id = isset($_GET['details']) ?  $_GET['details'] : NULL; ?>
                        <?php if (isset($_GET['details'])) : ?>
                            <?php
                            $sql = "SELECT * FROM event WHERE event_id  = {$hash->unhash($read_id)} LIMIT 1";
                            $stmt = $con->prepare($sql);
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="widget-inner">
                                <div class="alert alert-success" role="alert" id="edit_event_message" style="display:none;"></div>
                                <div class="alert alert-success" role="alert" id="event_message" style="display:none;"></div>
                                <form class="edit-profile m-b30" id="event_form_edit" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input class="form-control" id="event_id_edit" name="event_id_edit" type="hidden" value="<?php echo $row['event_id']; ?>" placeholder="Event ID">
                                            <small id="event_ttile_error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input class="form-control" id="event_title_edit" name="event_title_edit" value="<?php echo $row['event_title']; ?>" type="text" placeholder="Event title">
                                            <small id="event_ttile_error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <textarea id="event_description_edit" name="event_description_edit" cols="30" rows="10" class="form-control" placeholder="Describe the event"><?php echo $row['event_description']; ?></textarea>
                                            <small id="event_description_error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input class="form-control" id="event_speaker_edit" name="event_speaker_edit" type="text" value="<?php echo $row['event_speaker']; ?>" placeholder="Speacker name">
                                            <small id="event_speaker_error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class='input-group date' id='event_created_at' name="event_created_at">
                                            <input type='text' class="form-control" name="event_created_at_edit" value="<?php echo $row['event_created_at']; ?>" placeholder="Start the event time">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class='input-group date' id='event_endded_at' name="event_endded_at">
                                            <input type='text' class="form-control" name="event_endded_at_edit" value="<?php echo $row['event_endded_at']; ?>" placeholder="End the event time">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="formFile" class="form-label">Thumbnail</label>
                                            <input class="form-control" type="file" id="event_image_edit" name="event_image_edit" value="">
                                            <small id="event_image_error" class="text-danger"></small>
                                            <img src="/public/event_images/<?php echo $row['event_image']; ?>" style="width: 150px; margin-top: 5px; float: right;;">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-7">
                                            <button type="button" name="event_edit_btn" id="event_edit_btn" class="btn">Make Event</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endif; ?>
<?php require_once __DIR__ . '/../include/footer.php'; ?>