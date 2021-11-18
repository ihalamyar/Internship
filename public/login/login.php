<?php
/*
this is the login page, 
in this login.php file code <writtn></writtn><writtn></writtn>
for login card has written either
*/
require_once __DIR__ . '/ini/header.php';
$error = "";
$userdError = "";
$passwordError = "";
if (isset($_POST['submit'])) {
  $user = trim($_POST['user']);
  $password = trim($_POST['password']);
  if (empty($_POST['user'])) {
    $userdError = "Email Feiled is empty ";
  } else if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
    $userdError = "Email is invalid ";
  }
  if (empty($_POST['password'])) {
    $passwordError = "Password Feiled is empty ";
  }
  if ($userdError ==  "" && $passwordError ==  "") {
    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->execute([$_POST['user']]);
    $result  = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
      if ($result['status'] == 0 ?? '') {
        $error = '<div class="alert alert-info">This account has disabled</div>';
      } else {
        if ($result && password_verify($_POST['password'], $result['password'])) {
          $_SESSION['loggedin'] = true;
          $_SESSION['name'] = $result['name'];
          $_SESSION['email'] = $result['email'];
          $_SESSION['user_id'] = $result['id'];
          $_SESSION['user_role_id'] = $result['role_id'];
            header('Location: /../public/dashboard/dashboard.php');
        
        } else {
          $error = '<div class="alert alert-info">Wrong details</div>';
        }
      }
    } else {
      $error = '<div class="alert alert-info">Email does not exists</div>';
    }
  } else {
    $error = '<div class="alert alert-info">Fill the fieleds</div>';
  }
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
        <h2 class="title-head">Login to your <span>Account</span></h2>
        <p>Don't have an account? <a href="register.php">Create one here</a></p>
      </div>
      <form class="contact-bx" action=""  method="POST">
      <?php echo $error; ?>
      <?php displayMessage(); ?>
        <div class="row placeani">
          <div class="col-lg-12">
            <div class="form-group">
              <div class="input-group">
                <input class="form-control" id="user" type="text" name="user" value="<?php echo isset($_POST['user']) ? $_POST['user'] : '' ?>" placeholder="E-mail: example@gmail.com" >
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <div class="input-group">
                <input class="form-control" type="password" name="password" placeholder="Password" >
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group form-forget">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
              </div>
              <a href="forgot.php" class="ml-auto">Forgot Password?</a>
            </div>
          </div>
          <div class="col-lg-12 m-b30">
            <button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
          </div>
          
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end -->
<?php require_once __DIR__ . '/ini/footer.php'; ?>