<?php require_once __DIR__ . '/../header.php'; ?>
<?php require_once __DIR__ . '/../navbar.php'; ?>
<!-- event details -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(/public/admin/assets/images/slider/slide4.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Events Details</h1>
            </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Events Details</li>
            </ul>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- start details -->
        <?php $read_id = isset($_GET['more']) ?  $_GET['more'] : "<h1>Post not found</h1>"; ?>
        <?php if (isset($_GET['more'])) : ?>
            <?php
            $sql = "SELECT * FROM event WHERE event_id = {$hash->unhash($read_id)} ";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row d-flex flex-row-reverse">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="courses-post">
                                <?php if ($row['event_image'] == null) : ?>
                                    <img src="/public/admin/assets/images/testimonials/pic1.jpg" >
                                <?php else : ?>
                                    <img src="/public/event_images/<?php echo $row['event_image']; ?>" style="height: 400px; width: 100%;">
                                <?php endif; ?>
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
                            <div id="instructor">
                                <h4>Description</h4>
                                <div class="instructor-bx">
                                    <div class="instructor-author">
                                        <?php if ($row['event_image'] == null) : ?>
                                            <img src="/public/admin/assets/images/testimonials/pic1.jpg" >
                                        <?php else : ?>
                                            <img src="/public/event_images/<?php echo $row['event_image']; ?>" >
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
                                        <p>
                                        <?php echo $row['event_description'] ; ?>

                                        </p>
                                        <a href="javascript:void(0);" onclick="buy();" class="btn radius-xl text-uppercase">Register Now!</a>
                                            <script>
                                                function buy() {
                                                    window.location = "/public/login/login.php";
                                                }
                                            </script>
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