<?php
// this footer belongs to the login page
require_once __DIR__ . '/ini/header.php';
$message = '';
$email = NULL;
if (isset($_POST['emailBtn'])) {
    $email = addslashes($_POST['email']);
    if (empty($_POST['email'])) {
        redirect('forgot.php', 'Email empty', 'success');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirect('forgot.php', 'email is not a valid email address', 'success');
    } else {
        $stmt = $con->prepare("SELECT * FROM users  WHERE email=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($stmt->rowCount() == 1) {
            // reset password 
            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
            $created_at = date("Y-m-d H:i:s", $expFormat);
            $token = md5(time());
            $addtoken = substr(md5(uniqid(rand(), 1)), 3, 10);
            $token = $token . $addtoken;
            $sql = "INSERT INTO password_resets (email, token, created_at)
             VALUES  (:email, :token, :created_at)";
            $stmt = $con->prepare($sql);
            $stmt->execute(array(
                ":email" => $email,
                ':token' => $token,
                ':created_at' => $created_at
            ));
            $message .= '<p>Please click on the following link to reset your password.</p>';
            $message .= '<p><a href="http://localhost:8888/public/login/reset-password.php?key=' . $token . '&email=' . $email . '&action=reset" target="_blank">http://localhost:8888/public/login/reset-password.php?key=' . $token . '&email=' . $email . '&action=reset</a></p>';
            $body = $message;
            $subject = "Password Recovery";
            $email_to = $email;
            // $mail->SMTPDebug = 1;                                       // Enable verbose debug output
            $mail->isSMTP();
            $mail->SMTPAuth   = true;
            $mail->Subject = $subject;
            $mail->Username   = 'your-email'; // SMTP username
            $mail->Password   = 'your-password';                               // SMTP password
            $mail->Port       = 587;                                    // TCP port to connect to
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.gmail.com';
            $mail->setFrom('info@mydomain.com', $subject);
            $mail->addReplyTo('saboorhamedi49gmail.com', $subject);
            $mail->addAddress($email_to, $user['name']);
            $mail->isHTML(true);
            // Content
            $mail->Subject = $subject;
            $mail->Body    = $message;
            if (!$mail->Send()) {
                $message = "Mailer Error: " . $mail->ErrorInfo;
            } else {
                redirect('forgot.php', 'An email has been sent', 'success');
            }
        } else {
            redirect('forgot.php', 'Email does not exist', 'success');
        }
    }
}
?>

<!-- forgot password content -->
<div class="account-form">
    <div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
        <a href="index.php"><img src="assets/images/logo-white-2.png" alt=""></a>
    </div>
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">Forget <span>Password</span></h2>
                <p>Login Your Account <a href="login.php">Click here</a></p>
            </div>
            <form class="contact-bx" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <?php echo displayMessage(); ?>
                <small>
                    <?php echo $message; ?>
                </small>
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" id="email" name="email" type="email" placeholder="E-mail: example@gmail.com" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button name="emailBtn" type="submit" value="Submit" class="btn button-md">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end forgot password content -->
<?php require_once __DIR__ . '/ini/footer.php'; ?>