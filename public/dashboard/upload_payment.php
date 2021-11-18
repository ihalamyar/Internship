    <?php require_once __DIR__ . '/../include/header.php'; ?>
    <!-- Upload the receipt of your payment -->
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
            <!-- sidebar menu end -->
        </div>
    </div>
    <!-- main content -->
    <main class="ttr-wrapper">
       
        <div class="container">
            <?php require_once __DIR__ . '/../include/user_card_header.php'; ?>
            <?php $payment = isset($_GET['payment'])  ?  $_GET['payment'] : NULL; ?>
            <?php if (isset($_GET['payment'])) : ?>
                <?php
                    $data = $con->query("SELECT * FROM enroll WHERE token = '$payment'");
                    foreach ($data as $row) { ?>
                            <div class="row">
                                <div class="alert alert-success col-lg-12" role="alert" id="payment_cucess_message" style="display: none;"></div>
                                <div class="col-lg-12">
                                    <h6>Upload the receipt of the payment</h6>
                                    <form method="POST" id="payment_receipt_form" style="width: 100%">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="enroll_pay_id" id="enroll_pay_id" value="<?php echo $row['id']; ?>" placeholder="Enroll ID">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="payment_file" id="payment_file" required>
                                        </div>
                                    </form>
                                    <button type="button" name="payment_receipt_btn" id="payment_receipt_btn" class="btn green outline">submit payment</button>
                                </div>
                            </div>
                    <?php } ?>
                <?php else : ?>
                   <div class="alert alert-danger" role="alert">
                         Wrong token
                   </div>
                <?php endif; ?>
           
    </main>
    <?php require_once __DIR__ . '/../include/footer.php'; ?>