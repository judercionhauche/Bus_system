<?php
session_start();
require '../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and store in variables
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    // Prepare a query
    $region = $connection->prepare("SELECT * FROM regions");
    
    // Execute the query
    $region->execute();
    
    // Fetch results
    $regionResult = $region->get_result();
    $allRegions = $regionResult->fetch_all(MYSQLI_ASSOC);
    }





?>