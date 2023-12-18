<?php 

$error_message = '';

include('./Controller/db.php');

// Check if the dataection is successful
if (!$data) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){

// Retrieve the form data
$username = $_POST['username'];
$dob = $_POST['user_id'];
// Prepare the SQL query to retrieve the account matching the given data
$query = "SELECT * FROM users WHERE username = ? AND user_id = ?";
$sql = mysqli_stmt_init($data);
mysqli_stmt_prepare($sql, $query);
mysqli_stmt_bind_param($sql, 'ss', $username, $dob);
mysqli_stmt_execute($sql);
// Execute the query

if (empty(mysqli_error($data))) {
  $result = mysqli_stmt_get_result($sql);   
  if (mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_assoc($result);
    header("Location: recovery-password.php?id=". $row['user_id']);
  } else {
    $error_message = "No matching accounts were found. Please check your information and try again.";
  }
} else {
  echo mysqli_error($data);
}

// Close the database dataection
mysqli_close($data);

}












include('./partials/header.php');?>


<body class="forgot-password">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card card-forgot-password">
                <div class="card-body">
                    <div class="card-title text-center">Find Your Account</div>
                    <hr>
                    <?php if (isset($error_message)) { ?>
                  <h4 style='color: red;'><?php echo $error_message; ?></h4>
              <?php } ?>
                    <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">

                        <div class="mb-3 row">
                            <label for="username" class="col-md-3 col-form-label">Username:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="username" autocomplete="off"
                                    placeholder="Enter your username" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="dob" class="col-md-3 col-form-label">User ID:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="user_id" autocomplete="off"
                                    placeholder="Please refer to the administrator" required>
                            </div>
                        </div>

                        <div class="mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-lg btn-submit w-100" name="submit">Search</button>
                            <a class="btn btn-lg btn-submit w-100" href="login.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
