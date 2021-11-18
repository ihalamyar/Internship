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
        <?php if ($_SESSION['user_role_id'] == 0) : ?>
            <?php require_once __DIR__ . '/../include/admin_sidebar.php'; ?>
            <?php else :  ?>
            <?php require_once __DIR__ . '/../include/user_sidebar.php'; ?>

        <?php endif; ?>
    </div>
</div>
<main class="ttr-wrapper">
    <!--Main container start -->
    <div class="container-fluid">
        <!-- card header -->

        <?php if ($_SESSION['user_role_id'] == 0) : ?>
            <?php require_once __DIR__ . '/../include/admin_card_header.php'; ?>
            <?php else :  ?>
            <?php require_once __DIR__ . '/../include/user_card_header.php'; ?>

        <?php endif; ?>        
        <!-- Card header end -->
    <?php if ($_SESSION['user_role_id'] == 0) : ?>
        <?php require_once __DIR__ . '/../dashboard/all_events/admin_events.php'; ?>
    <?php else :  ?>
        <!-- Check if user is not admin, show them card without edit -->
        <?php require_once __DIR__ . '/../dashboard/all_events/users_events.php'; ?>
       
    <?php endif; ?>
</main>
<?php require_once __DIR__ . '/../include/footer.php'; ?>