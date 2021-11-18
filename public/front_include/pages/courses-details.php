<?php require_once __DIR__ . '/../header.php'; ?>
<?php require_once __DIR__ . '/../navbar.php'; ?>
<!-- display course detials -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(/public/admin/assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Courses Details</h1>
            </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Courses Details</li>
            </ul>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- start details -->
        <?php $read_id = isset($_GET['read']) ?  $_GET['read'] : NULL; ?>
        <?php if (isset($_GET['read'])) : ?>
            <?php
            $sql = "SELECT * FROM users INNER JOIN profiles ON users.id=profiles.user_id  INNER JOIN posts ON users.id=posts.author_id WHERE posts.id  = {$hash->unhash($read_id)} ";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row d-flex flex-row-reverse">
                        <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                            <div class="course-detail-bx">
                                <div class="course-price">
                                    <del>$190</del>
                                    <h4 class="price">$<?php echo $row['price'] ?? ''; ?></h4>
                                </div>
                                <div class="course-buy-now text-center">
                                    <a href="javascript:void(0);" onclick="buy();" class="btn radius-xl text-uppercase">Buy Now This Courses</a>
                                    <script>
                                        function buy() {
                                            window.location = "/public/login/login.php";
                                        }
                                    </script>
                                </div>
                                <div class="teacher-bx">
                                    <div class="teacher-info">
                                        <div class="teacher-thumb">
                                            <?php if ($row['image'] == null) : ?>
                                                <img src="/public/admin/assets/images/testimonials/pic1.jpg" alt="">
                                            <?php else : ?>
                                                <img src="/public/profile_image/<?php echo $row['image']; ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div class="teacher-name">
                                            <h5> <?php echo $row['name'] ?? ''; ?></h5>
                                            <span>Science Teacher</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cours-more-info">
                                    <div class="review">
                                        <span>3 Review</span>
                                        <ul class="cours-star">
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price categories">
                                        <span>Categories</span>
                                        <h5 class="text-primary">Frontend</h5>
                                    </div>
                                </div>
                                <div class="course-info-list scroll-page">
                                    <ul class="navbar">
                                        <li><a class="nav-link" href="#overview"><i class="ti-zip"></i>Overview</a></li>
                                        <li><a class="nav-link" href="#curriculum"><i class="ti-bookmark-alt"></i>Curriculum</a></li>
                                        <li><a class="nav-link" href="#instructor"><i class="ti-user"></i>Instructor</a></li>
                                        <li><a class="nav-link" href="#reviews"><i class="ti-comments"></i>Reviews</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div class="courses-post">
                                <div class="ttr-post-media media-effect">
                                    <?php if (isset($row['post_image']) == null) : ?>
                                        <img src="/public/admin/assets/images/event/pic2.jpg" style="height:200px" alt="not background found">
                                    <?php else : ?>
                                        <img src="/public/post_images/<?php echo $row['post_image']; ?>" style="height:200px" alt="not background found">
                                    <?php endif; ?>
                                </div>
                                <div class="ttr-post-info">
                                    <div class="ttr-post-title ">
                                        <h2 class="post-title"> <?php echo $row['title'] ?? ''; ?></h2>
                                        <small>
                                            <?php echo $helper->CustomDateFormat($row['created_at'] ?? ''); ?>
                                        </small>
                                    </div>
                                    <div class="ttr-post-text">
                                        <p>
                                            <?php echo $row['body'] ?? ''; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="instructor">
                                <h4>Instructor</h4>
                                <div class="instructor-bx">
                                    <div class="instructor-author">
                                        
                                        <?php if ($row['image'] == null) : ?>
                                            <img src="/public/admin/assets/images/testimonials/pic1.jpg" alt="">
                                        <?php else : ?>
                                            <img src="/public/profile_image/<?php echo $row['image']; ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="instructor-info">
                                        <h6><?php echo $row['name'] ?? ''; ?></h6>
                                        <span>Professor</span>
                                        <ul class="list-inline m-tb10">
                                            <li><a href="#" class="btn sharp-sm facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="btn sharp-sm twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="btn sharp-sm linkedin"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#" class="btn sharp-sm google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                        <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end detail -->
        <?php else : ?>
            <h1>No post selected</h1>
        <?php endif; ?>
    </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>