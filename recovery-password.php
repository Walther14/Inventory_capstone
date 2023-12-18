<?php

include('./Controller/db.php');
$id = '';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$error_message = '';

if(isset($_POST['submit'])){

    // Retrieve the security question and answer from the form
    $id = $_POST['id'];
    $security_answer = $_POST['security_answer'];

    // Sanitize the input to prevent SQL injection attacks
$security_answer = mysqli_real_escape_string($data, $security_answer);

// Retrieve the stored security answer from the rowbase
$sql = "SELECT security_answer FROM users WHERE user_id='$id'";
$result = $data->query($sql);

// Check for errors in the query
if (!$result) {
    die("Error retrieving security answer: " . mysqli_error($conn));
}

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // The query returned at least one row, so fetch the result and compare the answers
    $row = $result->fetch_assoc();
    if (password_verify($security_answer, $row['security_answer'])) {
        // The answer matches, do something here, such as grant access to the resource
        header("Location: change-password.php?id=".$id);
    } else {
        // The answer doesn't match, do something here, such as display an error message
        $error_message = "The answer doesn't match, please try again.";
    }
} else {
    // The security question wasn't found in the database, do something here, such as display an error message
    $error_message = "No matching accounts were found. Please check your information and try again.";
}

// Close the database connection
}


include('partials/header.php');



?>

<body class="recovery-password">
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h1 class="card-header text-center">Find Your Account</h1>
                    <div class="card-body">


                    <?php
               
                    
       

                    // Prepare the query using a prepared statement
$stmt = $data->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $id);

// Execute the query and get the result set
if ($stmt->execute()) {
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    // Handle the error here
    die("Error retrieving employee data: " . mysqli_error($data));
}

// Close the prepared statement
$stmt->close();

                    ?>
                    <?php if (isset($error_message)) { ?>
                  <h4 style='color: red;'><?php echo $error_message; ?></h4>
              <?php } ?>
                        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
                            <input type="hidden" name="id" value="<?=$id?>">

                            <div class="form-group">
                                <label for="security-question-1">Security question 1</label>
                                <input type="text" class="form-control" id="security-question-1" value="<?= $row['security_question'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="security-answer">Security Answer:</label>
                                <input class="form-control" type="text" name="security_answer" autocomplete="off" placeholder="Enter Security Answer" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" name="submit">Confirm</button>
                                <a class="btn btn-primary btn-block" href="login.php">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>

</html>