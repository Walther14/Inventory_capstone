<?php

include("./db.php");

$id = $_GET['id'];

$select = "SELECT Current_Property_Number 
FROM inventory_db 
WHERE Asset_Category = '$id' 
ORDER BY id DESC 
LIMIT 1";

$query = mysqli_query($data, $select);

$fetch = mysqli_fetch_assoc($query);

echo json_encode($fetch);


