<?php
/*
reset password or fogotten password 
I am using PHPMailer to reset the password 

*/
require_once __DIR__ . '/ini/header.php';

// =================Middleware====================
$password_error = '';
$confir_password_error = '';
$key_error = '';
$password = '';
$cofirm_password = '';
$message = '';
if (isset($_POST['resetPasswordBtn'])) {
    try {
        if (isset($_GET['key']) && isset($_GET['email']) && isset($_GET['action']) == 'reset') {
            $token = $_GET["key"];
            $email = $_GET["email"];
            $curDate = date("Y-m-d H:i:s");
            $password = ($_POST['password']);
            $confirm_password = ($_POST['confirm_password']);
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $has_con_password = password_hash($confirm_password, PASSWORD_DEFAULT);
            if (empty(test_input($_POST['password']))) {
                $password_error = 'Password empty';
            }
            if (empty(test_input($_POST['confirm_password']))) {
                $confir_password_error = 'Confirm Password empty';
            } elseif ($password != $confirm_password) {
                $confir_password_error = 'Confirm Password not matched';
            } else {
                $stmt = $con->prepare("SELECT * FROM password_resets  WHERE token = ? and email = ?");
                $stmt->execute([$token, $email]);
                $forgot_password_rows = $stmt->fetch();
                $expiredDate = $forgot_password_rows['created_at'] ?? '';
                if ($stmt->rowCount() == 1) {
                    $update = "UPDATE users SET password = ? WHERE email = ? ";
                    $stmt = $con->prepare($update);
                    $stmt->execute([$hash_password, $email]);
                    if ($expiredDate > $curDate) {
                        if ($stmt->rowCount() > 0) {
                            $key_error = 'Password updated';
                            $delete = "DELETE FROM password_resets WHERE email=?";
                            $stmt = $con->prepare($delete);
                            $stmt->execute([$email]);
                            redirect('login.php', 'Password update', 'success');
                        } else {
                            $key_error = "No password changed";
                        }
                    } else {
                        $key_error = "Token has expired";
                    }
                } else {
                    $key_error = "No token found";
                }
            }
        }
    } catch (PDOException $e) {
        $key_error = "Something went wrong";
    }
}

?>

<!-- reset password content -->
<div class="account-form">
    <div class="account-head" style="background-image:url('/public/admin/assets/images/background/bg2.jpg');">
        <a href="index.php"><img src="/public/admin/assets/images/logo-white-2.png" alt=""></a>
    </div>
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">Forget <span>Password</span></h2>
                <p>Login Your Account <a href="login.php">Click here</a></p>
            </div>
            <form class="contact-bx" action="" method="POST">
                <?php echo displayMessage(); ?>
                <small>
                    <?php echo $message; ?>
                </small>
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="password" name="password" id="password" placeholder="New Password">
                                <small class="text-danger"><?php echo $password_error; ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="input-group">
                                <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password">
                                <small class="text-danger"><?php echo $confir_password_error; ?> </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button type="submit" name="resetPasswordBtn" class="btn button-md">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end reset password content -->
<!-- 
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6 px-lg-4">
            <div class="card">
                <div class="card-header px-lg-5">
                    <div class="card-heading text-primary">Forgotten poassword form</div>
                </div>
                <div class="card-body p-lg-5">
                    <h5><?php echo $key_error; ?></h5>
                    <form class="contact-bx" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="floatingInput" type="password" name="password" placeholder="New Password">
                            <small class="text-danger"><?php echo $password_error; ?></small>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="floatingPassword" type="password" name="confirm_password">
                            <label for="floatingPassword">Confirm Password</label>
                            <small class="text-danger"><?php echo $confir_password_error; ?> </small>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit" name="submit">Change</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-lg-6 col-xl-5 ms-xl-auto px-lg-4 text-center text-primary"><img class="img-fluid mb-4" width="300" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-0/img/drawkit-illustration.svg" alt="" style="transform: rotate(10deg)">
            <h1 class="mb-4">Start saving <br class="d-none d-lg-inline">your time & money</h1>
            <p class="lead text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed in</p>
        </div>
    </div>
</div> -->
<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<?php require_once __DIR__ . '/ini/footer.php'; ?>