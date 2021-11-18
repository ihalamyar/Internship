<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php
// disable user
if (
    isset($_GET['status']) && $_GET['status'] != ''
    && isset($_GET['id']) && $_GET['id'] > 0
) {

    $status = $_GET['status'];
    $status_id = $_GET['id'];
    if ($status == "Active") {
        $status = 1;
    } else {
        $status = 0;
    }
    $sql = "UPDATE users SET status = ? WHERE id = ?";
    $con->prepare($sql)->execute([$status, $status_id]);
    echo "<script>window.location = 'dashboard.php';</script>";
}
// end
?>
<!-- Left sidebar menu start -->
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
        <?php if ($_SESSION['user_role_id'] == 0) : ?>
            <?php require_once __DIR__ . '/../include/admin_sidebar.php'; ?>
            <?php else :  ?>
            <?php require_once __DIR__ . '/../include/user_sidebar.php'; ?>

        <?php endif; ?>
        <!-- sidebar menu end -->
    </div>
</div>
<!-- Left sidebar menu end -->
<!-- end  -->

<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <!-- card header -->

        <?php if ($_SESSION['user_role_id'] == 0) : ?>
            <?php require_once __DIR__ . '/../include/admin_card_header.php'; ?>
            <?php else :  ?>
            <?php require_once __DIR__ . '/../include/user_card_header.php'; ?>

        <?php endif; ?>        
        <!-- Card header end -->
        <!-- <?php if ($_SESSION['user_role_id'] == 0) : ?>
            <di class="row">
                <div class="col-lg-12  m-b30">
                    <a href="make_event.php" class="btn button" id="make_new_eventBtn">+ Add Event</a>
                    <a href="posts.php" class="btn button" id="make_new_eventBtn">+ Add Course</a>
                </div>
            </di>
        <?php endif; ?> -->
        <div class="row">
            <!-- user table starts -->
            <?php if ($_SESSION['user_role_id'] == 0) : ?>
                <?php require_once __DIR__ . '/../dashboard/all_users/table.php'; ?>
        <?php endif; ?> 
            
            <!-- sold item table -->
            <?php if ($_SESSION['user_role_id'] == 0) : ?>
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">
                        <h5 style="padding: 10px; margin-left: 5px;">Pending Courses</h5>
                        <div class="widget-inner">
                            <?php displayMessage(); ?>
                            <table class="table card-text ">
                                <thead >
                                    <th>Name</th>
                                    <th>Course token</th>
                                    <th>Payment Receipts</th>
                                    <th>Status</th>
                                </thead>
                                <?php if (is_array($sold_course) || is_object($sold_course)) : ?>
                                    <?php foreach ($sold_course as $course) : ?>
                                        <tbody>
                                          
                                            <td> <?php echo $course['name']; ?></td>
                                            <td> <?php echo $course['token']; ?></td>
                                            <td>
                                                <?php if ($course['image'] ==  null) : ?>
                                                    <a href="/public/profile_image/placeholder.png" target="_blank"><img src="/public/profile_image/placeholder.png" style="width: 50px; height:50px; border-radius: 50%;"></a>
                                                <?php else : ?>
                                                    <a href="/public/payment_image/<?php echo $course['image'] ?? null; ?>" target="_blank">
                                                        <img src="/public/payment_image/<?php echo $course['image'] ?? null; ?>" style="width: 50px; height:50px; border-radius: 50%;">
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php if ($course['status'] == 0) : ?>
                                                    <button class="btn button-sm btn-primary btn-sm approveBtn" id="<?php echo $course['id'] ?>">Pending</button>
                                                <?php else : ?>
                                                    <button class="btn  button-sm  btn-primary btn-sm">Approved</button>
                                                <?php endif; ?>
                                            </td>
                                        </tbody>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- event payment table -->
            <!-- sold item table -->
            <?php if ($_SESSION['user_role_id'] == 0) : ?>
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">
                        <h5 style="padding: 10px; margin-left: 5px;">Pending Events</h5>
                        <div class="widget-inner">
                            <?php displayMessage(); ?>
                            <table class="table card-text">
                                <thead>
                                    <th>Name</th>
                                    <th>Event Title</th>
                                    <th>Payment Receipts</th>
                                    <th>Status</th>
                                </thead>
                                <?php if (is_array($join_event) || is_object($join_event)) : ?>
                                    <?php foreach ($join_event as $event) : ?>
                                        <tbody>
                                            <td> <?php echo $event['name']; ?></td>
                                            <td> <?php echo $event['event_title']; ?></td>
                                            <td>
                                                <?php if ($event['join_event_image'] ==  null) : ?>
                                                    <a href="/public/profile_image/placeholder.png" target="_blank"><img src="/public/profile_image/placeholder.png" style="width: 50px; height:50px; border-radius: 50%;"></a>
                                                <?php else : ?>
                                                    <a href="/public/join_event_image/<?php echo $event['join_event_image']; ?>" target="_blank">
                                                        <img src="/public/join_event_image/<?php echo $event['join_event_image']; ?>" style="width: 50px; height:50px; border-radius: 50%;">
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php if ($event['event_status'] == 0) : ?>
                                                    <button class="btn button-sm btn-primary btn-sm approve_eventBtn" id="<?php echo $event['join_event_id'] ?>">Pending</button>
                                                <?php else : ?>
                                                    <button class="btn  button-sm  btn-primary btn-sm">Approved</button>
                                                <?php endif; ?>
                                            </td>
                                        </tbody>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../include/footer.php'; ?>