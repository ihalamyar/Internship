<?php require_once __DIR__ . '/../include/header.php'; ?>
<!-- make event file -->
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
        <?php require_once __DIR__ . '/../include/admin_sidebar.php'; ?>
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
                            <h4>Create Event</h4>
                        </div>
                        <div class="widget-inner">
                            <div class="alert alert-success" role="alert" id="event_message" style="display:none;"></div>
                            <form class="edit-profile m-b30" id="event_form" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="event_title" name="event_title" type="text" placeholder="Event title">
                                        <small id="event_ttile_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <textarea id="event_description" name="event_description" cols="30" rows="10" class="form-control" placeholder="Describe the event"></textarea>
                                        <small id="event_description_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="event_speaker" name="event_speaker" type="text" placeholder="Speacker name">
                                        <small id="event_speaker_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class='input-group date' id='event_created_at' name="event_created_at">
                                        <input type='text' class="form-control" name="event_created_at" placeholder="Start the event time">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class='input-group date' id='event_endded_at' name="event_endded_at">
                                        <input type='text' class="form-control" name="event_endded_at" placeholder="End the event time">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="formFile" class="form-label">Thumbnail</label>
                                        <input class="form-control" type="file" id="event_image" name="event_image">
                                        <small id="event_image_error" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <button type="button" name="make_event_btn" id="make_event_btn" class="btn">Save Event</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <!-- Your Profile Views Chart END-->
            </div>
        </div>
    </main>
<?php endif; ?>
<?php require_once __DIR__ . '/../include/footer.php'; ?>