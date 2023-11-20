<?php
include('../Controller/db.php');




$id = $_POST['id'];

$name = $_POST['name'];
$department = $_POST['department'];
$position_designation = $_POST['position_designation'];

$sql = "UPDATE staff_db SET name='$name', department='$department',  position_designation='$position_designation'
WHERE staff_ID='$id'";

if ($data->query($sql) === TRUE) {
  header("Location: ../staff.php");
  
} else {
  echo "Error updating record: " . $data->error;
}

$data->close();
?>
