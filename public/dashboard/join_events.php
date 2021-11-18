<?php require_once __DIR__ . '/../include/header.php'; ?>

<!-- Left sidebar menu start -->
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
        <?php require_once __DIR__ . '/../include/user_sidebar.php'; ?>

    </div>
</div>
<main class="ttr-wrapper">
    <div class="container-fluid">
       <!-- card header -->

       <?php if ($_SESSION['user_role_id'] == 0) : ?>
            <?php require_once __DIR__ . '/../include/admin_card_header.php'; ?>
            <?php else :  ?>
            <?php require_once __DIR__ . '/../include/user_card_header.php'; ?>

        <?php endif; ?>        
        <!-- Card header end -->
        <div class="row">
            <?php
            $sql = "SELECT * FROM event LEFT JOIN join_event ON event.event_id=join_event.event_id
                WHERE join_event.user_id = $user_id ORDER BY update_at DESC 
                ";
            ?>
            <?php $datas = $con->query($sql)->fetchAll(); ?>
            <?php if (count($datas) > 0) : ?>
                <?php foreach ($datas as $value) : ?>
                    <div class="col-lg-12 m-b30 widget-box p-3" style="gap: 10px;">
                        <?php if ($value['event_status'] == 0) : ?>
                            <i class="fas fa-spinner mb-3" style="color:#9D9D9D"></i>
                        <?php else : ?>
                            <i class="fas fa-check mb-3" style="color:#90EE90"></i>
                        <?php endif; ?>
                        <div class="card-courses-list admin-courses">
                            <div class="card-courses-media">
                                <img src="/public/event_images/<?php echo $value['event_image'] ?? ''; ?>" alt="" />
                            </div>
                            <div class="card-courses-full-dec">
                                <div class="card-courses-title">
                                    <h4><?php echo $value['event_title']; ?></h4>
                                </div>
                                <div class="row card-courses-dec">
                                    <div class="col-md-12">

                                        <h6 class="m-b10">Course Description</h6>
                                        <p>
                                            <?php echo substr($value['event_description'], 0, 50); ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if ($value['event_status'] == 0) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <?php $sql = "SELECT name FROM users WHERE id = ? LIMIT 1"; ?>
                                                <?php $stmt = $con->prepare($sql); ?>
                                                <?php $stmt->execute([$user_id]); ?>
                                                <?php $user = $stmt->fetch(); ?>
                                                <h4 class="alert-heading">Well done <?php echo $user['name']; ?></h4>
                                                <p>Aww yeah, you successfully applied for this course, please complete the payment <strong>mandiri, code 008, ID number, 1118493200</strong> as soon as possible</p>
                                                <hr>
                                                <p class="mb-4">For any technical issue please contact us here, <strong>nict_tecnicalissue@gmail.com</strong>.</p>
                                                <a href="upload_event_payment.php?payment=<?php echo $hash->hash($value['join_event_id'],10);?>" class="btn green outline">Please complete the payment</a>
                                            </div>
                                        <?php else : ?>
                                            <a href="#" class="btn green outline">Read more</a>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="row" style="width: 100%; margin: 10px;">
                    <div class="col-lg-12  widget-box p-3 alert alert-info" style="display: flex; justify-content:center; align-items: center;" >
                       <h5>You have not yet join any event</h5>
                    </div>
                </div>
            <?php endif; ?>
            <!-- end fetch courses -->
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../include/footer.php'; ?>