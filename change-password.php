<?php
include('./Controller/db.php');


$id = '';
if(isset($_GET['id'])) {
  $id = $_GET['id'];
}

$error_message = '';

if(isset($_POST['submit'])){
  $id = $_POST['id'];

// Retrieve the new password and security question/answer from the form data
$new_password = $_POST['new_password'];

// Retrieve the confirm password from the form data
$confirm_password = $_POST['confirm_password'];

// Check if the new password and confirm password are the same
if ($new_password !== $confirm_password) {
  $error_message = "Error: New password and confirm password do not match. '$id'";
  
}else{

  $hashed_passcode = password_hash($new_password, PASSWORD_DEFAULT);
  // Prepare the SQL query to update the password and security question/answer
// Prepare the SQL query to update the password and security question/answer
$query = "UPDATE users SET password =? WHERE user_id =?";
  
$sql = mysqli_stmt_init($data);

if (!mysqli_stmt_prepare($sql, $query)) {
  $error_message = "SQL statement failed!";
} else {
  mysqli_stmt_bind_param($sql, 'si', $hashed_passcode, $id);
  if(mysqli_stmt_execute($sql)){
    echo "<script>
      alert('Password and security question/answer updated successfully.');
      setTimeout(function() {
        window.location.href = 'login.php';
      }, 1000); // redirect after 1 seconds (adjust as needed)
      </script>";
  } else {
    $error_message = mysqli_error($data);
  }
  mysqli_stmt_close($sql);
}
mysqli_close($data);

}
  



}
include('partials/header.php');

?>

<body class="change-password">
  <div class="container d-flex justify-content-center align-items-center">
    <div class="col-md-6">
      <div class="card card-change-password w-100">
        <div class="card-body">
          <div class="card-title text-center">Change Password</div>
          <?php if (isset($error_message)) { ?>
            <h4 style='color: red;'><?php echo $error_message; ?></h4>
        <?php } ?>
          <hr>
          <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
            <input type="hidden" name="id" value="<?=$id ?>" hidden>

            <!-- ===== NEW PASSWORD ===== -->
            <div class="row mb-3 form-group">
              <label for="new_password">New Password</label>
              <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
              </div>
            </div>

            <!-- ===== NEW PASSWORD ===== -->
            <div class="row mb-3 form-group">
              <label for="new_password">Confirm New Password</label>
              <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password" required>
              </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="submit" class="btn btn-primary w-100 btn-lg btn-block" name="submit" style="background-color: #AD0423;">Submit</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  

</body>

</html>



