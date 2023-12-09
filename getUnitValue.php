<?php
// getUnitValue.php

// Include your database connection file
@include('Controller/db.php');

// Fetch unit value and unit measure based on the provided description
if (isset($_GET['description'])) {
    $description = $_GET['description'];
    $query = "SELECT Unit_value, Unit_Measure, Asset_Number, Current_Property_Number FROM inventory_db WHERE Property_Description = ?";
    
    $stmt = $data->prepare($query);
    $stmt->bind_param('s', $description);
    $stmt->execute();
    $stmt->bind_result($unitValue, $unitMeasure, $assetNum, $PropertyNum);
    
    if ($stmt->fetch()) {
        echo json_encode(['unit_value' => $unitValue, 'unit_measure' => $unitMeasure, 'asset_number' => $assetNum, 'current_property_number' => $PropertyNum]);
    } else {
        echo json_encode(['unit_value' => '', 'unit_measure' => '' , 'asset_number' => '', 'current_property_number' => '']); // Return empty strings if no matching record found
    }

    $stmt->close();
} else {
    echo json_encode(['unit_value' => '', 'unit_measure' => '', 'asset_number' => '', 'current_property_number' => '']); // Return empty strings if no description provided
}
?>
