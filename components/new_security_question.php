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
$newQuestion = $securityQuestions[$randomQuestionKey];

echo $newQuestion;
?>
