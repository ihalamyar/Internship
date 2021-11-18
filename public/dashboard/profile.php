<?php require_once __DIR__ . '/../include/header.php'; ?>
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
    <?php if ($_SESSION['user_role_id'] == 0) : ?>
            <?php require_once __DIR__ . '/../include/admin_sidebar.php'; ?>
            <?php else :  ?>
            <?php require_once __DIR__ . '/../include/user_sidebar.php'; ?>

        <?php endif; ?>
          <!-- sidebar menu end -->
    <!-- sidebar menu end -->
</div>
</div>

<!--Main container start -->
<main class="ttr-wrapper">
<div class="container-fluid">
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Profile</h4>
                </div>
                <div class="widget-inner">
                    <div class="alert alert-success" role="alert" id="update_profile_message" style="display:none;"></div>
                    <?php if (is_array($profile) || is_object($profile)) : ?>
                        <?php foreach ($profile as $pro) : ?>
                            <form class="edit-profile m-b30" id="profile_update_form" method="POST">
                                <?php if ($pro['image'] == NULL) : ?>
                                    <img src="/public/profile_image/placeholder.png" class="img-thumbnail" style="width: 250px; height: 200px; margin-bottom: 10px;">
                                <?php else : ?>
                                    <img src="/public/profile_image/<?php echo $pro['image']; ?>" class="img-thumbnail" style="width: 250px; height: 200px; margin-bottom: 10px;">
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="id" name="id" type="hidden" value="<?php echo $pro['id']; ?>" placeholder="Your ID">
                                        <small id="profile_user_id_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="name" name="name" type="text" value="<?php echo $pro['name']; ?>" placeholder="Your ID">
                                        <small id="name_error" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="bio" name="bio" value="<?php echo $pro['bio']; ?>" placeholder="Your Bio">
                                        <small id="user_bio_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="country" name="country" type="text" value="<?php echo $pro['country'] ?>" placeholder="Your Country">
                                        <small id="user_country_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="age" name="age" type="text" value="<?php echo $pro['age'] ?>"  placeholder="Your Country">
                                        <small id="user_age_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="education" name="education" type="text" value="<?php echo $pro['education'] ?>" placeholder="Your Education">
                                        <small id="user_education_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="formFile" class="form-label">Thumbnail</label>
                                        <input class="form-control" type="file" id="file" name="file" value="">
                                        <small id="event_image_error" class="text-danger"></small>
                                        <img src="" style="width: 150px; margin-top: 5px; float: right;;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <button type="button" name="edit_profile_btn" id="edit_profile_btn" class="btn">Edit profile</button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
</main>

<?php require_once __DIR__ . '/../include/footer.php'; ?>