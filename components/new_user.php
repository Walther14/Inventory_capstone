<?php
session_start();



$id = '';
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
}
include('../Controller/db.php');
$errors = array();
$errorstring = '';

if (isset($_POST['submit'])) {

    $id = $_POST['id'];

    $default_password = $_POST['default_password'];

    $new_password = $_POST['new_password'];

    $confirm_password = $_POST['confirm_password'];

    $new_question = $_POST['security_question'];
    $new_answer = $_POST['security_answer'];

    $hashed_na = password_hash($new_answer, PASSWORD_DEFAULT);

    $df_query = "SELECT * FROM users WHERE user_id = '$id'";
    $query = mysqli_query($data, $df_query);
    $row = mysqli_fetch_assoc($query);
    $fetched_df = $row['password'];

    if (!password_verify($default_password, $fetched_df)) {
        $errors[] = 'Invalid default password.';
    }
    // Check if the new password and confirm password are the same
    if ($new_password !== $confirm_password) {
        $errors[] = 'New password and confirm password do not match.';
    }

    if (empty($errors)) {
        $hashed_passcode = password_hash($new_password, PASSWORD_DEFAULT);
        $update = "UPDATE users SET password = ?, security_question = ?, security_answer = ?, login_flag = ? WHERE user_id = ?";

        $query = mysqli_stmt_init($data);
        mysqli_stmt_prepare($query, $update);

        $idValue = $id;
        $trueValue = true; // Create a variable to hold the value of true

        mysqli_stmt_bind_param($query, 'ssssi', $hashed_passcode, $new_question, $hashed_na, $trueValue, $idValue);

        mysqli_stmt_execute($query);


        $role = $_SESSION['user_role'];    


        if (!empty(mysqli_error($data))) {

            $errors[] = "Error updating password and security question/answer: ";
        }
        if($role != 3){
            header('Location: ../login.php');
        }else{

            header("Location: ../index_custodian.php?id=" . $id);
        }
    } else { // Report the errors. 
        $errorstring = "Error! The following error(s) occurred:<br>";
        $errorstring .= "Please try again.<br>";
    } // End of if (empty($errors)) IF.
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules//halfmoon/css/halfmoon.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="../node_modules/chart.js/dist/chart.umd.js" defer></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js" defer></script>


    <title>Document</title>
</head>

<body class="reset-password">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card card-reset-password w-100">
                <div class="card-body">
                    <div class="card-title text-center">Reset Password</div>
                    <br>
                    <?php if (isset($errors)) { ?>
                        <h4 style='color: red;'><?php echo $errorstring; ?></h4>
                    <?php } ?>
                    <?php if (isset($errors)) { ?>
                        <h4 style='color: red;'><?php foreach ($errors as $msg) { // Print each error.
                                                    echo $msg . '<br>';
                                                } ?></h4>
                    <?php } ?>

                    <hr>
                    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>" hidden>

                        <!-- DEFAULT PASSWORD -->
                        <div class="row mb-3 form-group">
                            <label for="default_password">Default Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>

                                <input type="password" class="form-control" name="default_password" placeholder="Enter default password for authentication" required>
                            </div>
                        </div>

                        <!-- NEW PASSWORD -->
                        <div class="row mb-3 form-group">
                            <label for="new_password">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                            </div>
                        </div>

                        <!-- CONFIRM NEW PASSWORD -->
                        <div class="row mb-3 form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password" required>
                            </div>
                        </div>

                        <!-- Security Question -->
                        <div class="row mb-3 form-group">
                            <label class="label">Security Question</label>
                            <?php
                            // Define an array of security questions
                            $securityQuestions = array(
                                "What was the name of your first pet?",
                                "What is your mother's maiden name?",
                                "What is your favorite color?",
                                "What is your favorite movie?",
                                "What is your favorite book?",
                                "What is your favorite hobby?",
                                "What is the name of your favorite childhood friend?",
                                "What is your favorite sport?",
                            );

                            // // Select 1 random security question
                            $randomQuestionKey = array_rand($securityQuestions, 1);
                            // // Print the selected question
                            $_SESSION['sec_q'] = $securityQuestions[$randomQuestionKey];
                            echo '
         
                  
                  <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                              <input class="form-control" type="text" id="field-to-refresh" name="security_question" value="' . $securityQuestions[$randomQuestionKey] . '" placeholder="Enter Security Question" id="sa" readonly>
                          <button class="btn btn-success" style="background-color: #AD0423;" type="button" title="Refresh Question" id="refresh-btn">
                            <span class="icon">
                              <i class="fas fa-arrows-rotate"></i>
                            </span>
                          </button>
                        </div>';
                            ?>
                        </div>

                        <!-- SECURITY ANSWER -->
                        <div class="row mb-3 form-group">
                            <label for="confirm_password">Security Answer</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input class="form-control" type="text" name="security_answer" autocomplete="off" placeholder="Security Answer" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-submit w-100 btn-lg btn-block" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        // REFRESH FOR NEW SEC QUES 
        $("#refresh-btn").on("click", function() {
            $.get("new_security_question.php", function(data) {
                $("#field-to-refresh").val(data);
            });
        });
    </script>


</body>

</html>