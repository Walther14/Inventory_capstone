<?php
@include('./Controller/db.php');
@include('partials/header.php');




echo ($_POST['username']);
if (isset($_POST['username'])) {
  $username    = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (!filter_var($username, FILTER_VALIDATE_username)) {
    $username_error = "Please Enter Valid Username";
  }
  if (strlen($password) < 6) {
    $password_error = "Password must be minimum of 6 characters";
  }

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $username . "' and password = '" . ($password) . "'");
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_username']  = $row['username'];
    header("Location: index.php");
  } else {
    $error_message = "Incorrect username or Password!!!";
  }
}

?>

<div class="d-flex justify-content-center  align-items-center" style="height: 100vh; background: url('./img/back.jpg'); background-size: cover;">
  <div class="card" style="width: 18.75rem; background-color: rgba(255, 255, 255, 0.5);">
    <img src="./img/prime.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">LOGIN </h5>
      <p class="card-text">
      <form>
        <div class="mb-3">
          <p>Please fill all fields in the form</p>
          <span class="text-danger"><?php if (isset($error_message)) echo $error_message; ?></span>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <label class="form-label" for="username">Username</label>
            <input type="text" class="form-control" id="username" required placeholder="Username" name="username">
            <span class="text-danger"><?php if (isset($username_error)) echo $username_error; ?></span>
        </div>
        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input type="password" class="form-control" id="password" required placeholder="Password" name="password">
          <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
        </div>
        <div class="mb-3 pb-3 border-bottom">
          <button type="submit" class="btn btn-primary w-100">Sign in</button>
        </div>
      </form>
        <div class="text-center text-body-secondary">
          <a href="#">Forget Password?</a>
        </div>


    </div>
  </div>
</div>


<?php
include('partials/footer.php')
?>