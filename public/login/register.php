<?php
require_once __DIR__ . '/ini/header.php';
// variables 
$name = '';
$email = '';
$password = '';
// errors 
$nameError = '';
$emailError = '';
$passwordError = '';
$successMessage = '';


if (isset($_POST['submit'])) {
    // name validation
    if (empty($_POST['name'])) {
        $nameError = 'Name is required';
    } else {
        $name = validated($_POST['name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameError = 'Only letters and space are allowed';
        }
    }
    // email validation 
    if (empty($_POST['email'])) {
        $emailError = 'E-mail is required';
    } else {
        $email = validated($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = 'E-mail is not valid';
        }
    }
    // password 
    if (empty($_POST['password'])) {
        $passwordError = 'Password is required';
    } else {
        $password = validated(password_hash($_POST['password'], PASSWORD_DEFAULT));
    }
    try {
        if (!empty($name) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check = "SELECT email FROM users WHERE email = '$email'";
            $check_row = $con->query($check);
            $check_row->fetch();

            if ($check_row->rowCount() > 0) {
                $successMessage = '<div class="alert alert-success" role="alert">E-mail already exists</div>';
            } else {

                // 
                $sql = "INSERT INTO users (name, email, password) VALUES(?,?,?)";
                $stmt = $con->prepare($sql);
                $data = $stmt->execute([$name, $email, $password]);
                // return   print_r($data); die;

               
                if ($stmt->rowCount()) {
                    $successMessage = '<div class="alert alert-success" role="alert">New user created, <a href="/public/login/login.php">Login</a></div>';
                } else {
                    $successMessage = '<div class="alert alert-success" role="alert">User not created</div>';
                }
            }
        }
    } catch (PDOException $pdo) {
        $successMessage = '<div class="alert alert-success" role="alert">Something went wrong</div>';
    }
}

function validated($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
?>
<!-- login content -->
<div class="account-form">
    <div class="account-head" style="background-image:url('/public/admin/assets/images/background/bg2.jpg');">
        <a href="index.php"><img src="/public/admin/assets/images/logo.png" alt="" width=350;></a>
    </div>
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">Register <span>Account</span></h2>
            </div>
            <form class="contact-bx" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <?php echo $successMessage; ?>
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" id="name" type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Name: Ahmad">
                                <small class="text-danger"><?php echo $nameError; ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" id="email" type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="E-mail: example@gmail.com">
                                <small class="text-danger"><?php echo $emailError; ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" id="password" type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="Password: Yhji#($)999">
                                <small class="text-danger"><?php echo $passwordError; ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button name="submit" type="submit" class="btn button-md">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end -->
<?php require_once __DIR__ . '/ini/footer.php'; ?>