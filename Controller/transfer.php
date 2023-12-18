<?php 
include('./db.php');

$id = $_POST['id'];
$issued_to = $_POST['issued_to'];
$message = $_POST['message'];

echo $id;
echo $issued_to;
echo $message;

$insert = "INSERT INTO transfer_db (message, item_id, user_id) VALUES ('$message', '$id', '$issued_to')";

if ($data->query($insert) === TRUE) {


    $_SESSION['user_id'] = $id;
    $_SESSION['user_username'] = $db_username;



        header("Location: index_custodian.php");



    header("Location: ../index_custodian.php");
    exit();
} else {
    echo "Error: " . $insert . "<br>" . $data->error;
}

$data->close();
?>


