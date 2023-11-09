<?php
session_start();

// Include necessary files
include_once('./Controller/db.php');
include('partials/header.php');
$db_password ='';
$db_username = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($data, $_POST['username']);
  $password = mysqli_real_escape_string($data, $_POST['password']);

  $username_error = $password_error = $error_message = "";

  // Validate username
  if (empty($username)) {
    $username_error = "Please enter a username.";
  }

  // Validate password
  if (empty($password)) {
    $password_error = "Please enter a password.";
  } elseif (strlen($password) < 6) {
    $password_error = "Password must be at least 6 characters long.";
  }

  if (empty($username_error) && empty($password_error)) {
    // Hash the password for secure storage and retrieval
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check the database for the username and hashed password
    $query = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($data, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);



    
    if (mysqli_stmt_num_rows($stmt) == 1) {
      mysqli_stmt_bind_result($stmt, $id, $db_username, $db_password);
      mysqli_stmt_fetch($stmt);

      // Verify the password
      if (password_verify($password, $db_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_username'] = $db_username;
        header("Location: index.php");
      } else {
        $error_message = "Incorrect password.";
      }
    } else {

      $error_message = $db_username;
    }

    mysqli_stmt_close($stmt);
  }
}
?>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh; background: url('./img/back.jpg'); background-size: cover;">
    <div class="card" style="width: 30rem; background-color: rgba(255, 255, 255, 0.5);">
        <img src="./img/prime.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">LOGIN</h5>
            <p class="card-text">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3">
                        <p>Please fill all fields in the form</p>
                        <span class="text-danger"><?php if (isset($error_message)) echo $error_message; ?></span>

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
            </p>
        </div>
    </div>
</div>



<?php
include('partials/footer.php')
?>