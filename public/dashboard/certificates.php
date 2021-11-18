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
<!-- end  -->




<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <!-- card header -->
        <?php require_once __DIR__ . '/../include/card_header.php'; ?>

        <div class="row">
            <!-- sold item table -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <h5 style="padding: 10px; margin-left: 5px;">Pending Events</h5>
                    <div class="widget-inner">
                        <?php displayMessage(); ?>
                        <table class="table card-text">
                            <thead>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Event Titlte</th>
                                <th>State</th>
                            </thead>
                            <?php $sql = " SELECT * FROM event INNER  JOIN  join_event ON event.event_id=join_event.join_event_id 
                                                INNER JOIN users ON join_event.user_id=users.id ORDER BY event.event_status ASC"; ?>
                            <?php foreach ($join_event as $event) : ?>
                                <tbody>
                                    <td> <?php echo $event['name']; ?></td>
                                    <td> <?php echo $event['email']; ?></td>
                                    <td> <?php echo $event['event_title']; ?></td>
                                    <!-- <td>
                                        <?php if ($event['join_event_image'] ==  null) : ?>
                                            <img src="/public/profile_image/placeholder.png" style="width: 50px; height:50px; border-radius: 50%;">
                                        <?php else : ?>
                                            <img src="/public/join_event_image/<?php echo $event['join_event_image']; ?>" style="width: 50px; height:50px; border-radius: 50%;">
                                        <?php endif; ?>
                                    </td> -->
                                    <td>
                                        <?php if ($event['event_status'] == 0) : ?>
                                            <button class="btn button-sm btn-primary btn-sm approve_eventBtn">Pending</button>
                                        <?php else : ?>
                                            <a href="/app/certificate/certificate.php?print=<?php echo $hash->hash($event['id'], 10); ?>" target="_blank" class="btn  button-sm  btn-primary btn-sm">Print</a>
                                        <?php endif; ?>
                                    </td>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../include/footer.php'; ?>