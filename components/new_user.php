<?php
session_start(); // Start the session to access session variables

$id = $_SESSION['user_id'];
@include('../Controller/db.php');

// Function to generate random security questions
function getRandomQuestions($count = 3)
{
    $questions = [
        "What is your favorite color?",
        "In which city were you born?",
        "What is the name of your first pet?",
        "What is your favorite movie?",
        "Who is your favorite author?",
        "What is the make and model of your first car?",
        "What is the name of the street you grew up on?",
        "What is your favorite food?",
        "What is the name of your best friend in high school?",
        "What is your favorite vacation spot?",
        // Add more questions as needed
    ];

    shuffle($questions);

    // Ensure that we have at least $count questions
    while (count($questions) < $count) {
        // Add questions back to the array if needed (infinite loop prevention)
        $questions[] = reset($questions);
    }

    return array_slice($questions, 0, $count);
}


// Get random security questions
$securityQuestions = getRandomQuestions();

function hashSecurityAnswers($securityAnswers)
{
    // Hash each security answer
    return array_map('password_hash', $securityAnswers, array_fill(0, count($securityAnswers), PASSWORD_BCRYPT));
}

function insertUser($password, $hashedSecurityAnswers, $newPassword, $id)
{
    global $data, $securityQuestions;

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Update user in users table
    $sql = "UPDATE users 
            SET security_question_1 = '" . $securityQuestions[0] . "', 
                security_question_2 = '" . $securityQuestions[1] . "', 
                security_question_3 = '" . $securityQuestions[2] . "', 
                security_answer_1 = '$hashedSecurityAnswers[0]', 
                security_answer_2 = '$hashedSecurityAnswers[1]', 
                security_answer_3 = '$hashedSecurityAnswers[2]', 
                password = '$hashedPassword', 
                login_flag = 'true' 
            WHERE user_id = '$id'";
    
    if ($data->query($sql) === TRUE) {
    header("Location: ../login.php");
       
    } else {
        echo "<p class='text-danger'>Error: " . $sql . "<br>" . $data->error . "</p>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $password = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $securityAnswers = $_POST['securityAnswers'];

    // Validate that the new password and confirm password match
    if ($password === $confirmPassword) {
        // Hash security answers before inserting into the database
        $hashedSecurityAnswers = hashSecurityAnswers($securityAnswers);
        insertUser($password, $hashedSecurityAnswers, $password, $id);
    } else {
        echo "<p class='text-danger'>Error: New password and confirm password do not match.</p>";
    }
}

// Close the database connection
$data->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/halfmoon/css/halfmoon.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js" defer></script>
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 card">
        <h2>Welcome! Please answer the following security questions:</h2>

        <form method='post'>
            <?php foreach ($securityQuestions as $index => $question): ?>
                <div class='form-group'>
                    <label for='securityAnswer<?= $index + 1 ?>'><?= $question ?></label>
                    <input type='text' class='form-control' id='securityAnswer<?= $index + 1 ?>' name='securityAnswers[]' required>
                </div>
            <?php endforeach; ?>

            <div class='form-group'>
                <label for='newPassword'>Enter New Password:</label>
                <input type='password' class='form-control' id='newPassword' name='newPassword' required>
            </div>

            <div class='form-group'>
                <label for='confirmPassword'>Confirm New Password:</label>
                <input type='password' class='form-control' id='confirmPassword' name='confirmPassword' required>
            </div>

            <button type='submit' class='btn btn-primary'>Submit</button>
        </form>
    </div>
</body>
</html>


