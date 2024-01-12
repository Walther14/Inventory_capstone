<?php

include("./db.php");

$id = $_GET['id'];

$select = "SELECT * 
FROM inventory_db 
WHERE Current_Property_Number = '$id'";

$query = mysqli_query($data, $select);

$fetch = mysqli_fetch_assoc($query);

echo json_encode($fetch);


