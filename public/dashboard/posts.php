<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php
$title = "";
$body = "";
$author_id = "";
$titleError = "";
$postError = "";
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author_id = $_POST['author_id'];
    // $post_image = $_FILES['file']['name'];
    $project_price = $_POST['project_price'];
    $errors = $posts->register($_POST);
    extract($_POST);
}

?>

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
                            <h4>Create Course</h4>
                        </div>
                      
                            <div class="widget-inner">
                                <div class="alert alert-success" role="alert" id="edit_event_message" style="display:none;"></div>
                                <div class="alert alert-success" role="alert" id="event_message" style="display:none;"></div>
                                <small><?php echo $posts->successPosts; ?></small>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <input class="form-control" id="author_id" name="author_id" type="hidden" value="<?php echo $user_id; ?>" placeholder="Write your title" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control mb-2" id="title" name="title" type="text" placeholder="Write your title" autocomplete="off">
                                        <small class="text-danger"><?php echo $posts->titleError; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Write your desription"></textarea>
                                        <small class="text-danger"><?php echo $posts->postError; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mt-2">
                                            <input type="file" class="form-control" name="file" id="file">
                                        </div>
                                        <small class="text-danger"><?php echo $posts->postImageError; ?></small>
                                    </div>
                                    <div class="input-group mt-2">
                                        <input type="text" class="form-control" id="project_price" name="project_price" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Enter project price">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <small class="text-danger"><?php echo $posts->priceError; ?></small>
                                    <div class="form-group mt-2">
                                        <button class="btn btn-primary " type="submit" name="submit">Save Course</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endif; ?>
<?php require_once __DIR__ . '/../include/footer.php'; ?>