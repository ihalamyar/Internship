<?php require_once __DIR__ . '/../include/header.php'; ?>

<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            <a href="#">
                <img alt="" src="/public/assets/images/logo.png" width="70" height="27">
            </a>
            <div class="ttr-sidebar-toggle-button">
                <i class="ti-arrow-left"></i>
            </div>
        </div>
        <!-- sidebar menu start -->
        <?php require_once __DIR__ . '/../include/user_sidebar.php'; ?>
        <!-- sidebar menu end -->
    </div>
</div>
<!-- Left sidebar menu end -->
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Your Profile Views Chart -->
            <?php $purchase_id = isset($_GET['purchase']) ?  $_GET['purchase'] : "<h1>Post not found</h1>"; ?>
            <?php if (isset($_GET['purchase'])) : ?>
                <?php
                $sql = "SELECT users.id AS users_id, name, email,  role_id, status,
                posts.id AS posts_id, title, body,author_id, 
                post_image, price, posts.created_at
                FROM users
                INNER JOIN posts ON 
                users.id=posts.author_id WHERE posts.id = {$hash->unhash($purchase_id)} ";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">
                        <!-- start from here -->
                        <div class="widget-inner">
                            <div class="card-courses-list admin-review">
                                <div class="card-courses-full-dec">
                                    <div class="card-courses-title">
                                        <h4> <?php echo $row['title'] ?? ''; ?></h4>
                                    </div>
                                    <div class="card-courses-list-bx">
                                        <ul class="card-courses-view">
                                            <li class="card-courses-user">
                                                <div class="card-courses-user-pic">
                                                    <?php if ($row['post_image'] == null) : ?>
                                                        <img src="/public/profile_image/placeholder.png" alt="" />
                                                    <?php else : ?>
                                                        <img src="/public/post_images/<?php echo $row['post_image']; ?>" alt="" />
                                                    <?php endif; ?>
                                                </div>
                                                <div class="card-courses-user-info">
                                                    <h5>NAME</h5>
                                                    <h4><?php echo $row['name']; ?></h4>
                                                </div>
                                            </li>

                                            <li class="card-courses-categories">
                                                <h5>DATE</h5>
                                                <h4><?php echo $helper->customDateFormat($row['created_at']); ?></h4>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row card-courses-dec">
                                        <div class="col-md-12">
                                            <h6 class="m-b10 font-weight-bold">You can buy one course in a time</h6>
                                            <p><?php echo $row['body']; ?></p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="alert alert-success" role="alert" id="apply__message" style="display:none"></div>
                                            <form method="POST" id="form_apply">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="purchase_user_id" name="purchase_user_id" placeholder="User ID" value="<?php echo $user_id; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="purchase_post_id" name="purchase_post_id" placeholder="Post ID" value="<?php echo $row['posts_id']; ?>">
                                                </div>
                                            </form>
                                            <button class="btn" id="apply_btn">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end here -->
                    </div>
                </div>
            <?php endif; ?>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
<div class="ttr-overlay"></div>
<?php require_once __DIR__ . '/../include/footer.php'; ?>