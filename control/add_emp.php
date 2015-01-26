<?php
/**
 * Created by PhpStorm.
 * User: Livne
 * Date: 25/01/2015
 * Time: 20:25
 */
// Define Configuration
$servername = "localhost";
$username = "apple";
$password = "pie";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get Parameters From Request
$emp_id = $_POST["id"];
$emp_fname = $_POST["fname"];
$emp_lname = $_POST["lname"];
$emp_adrs = $_POST["adrs"];
$emp_phone = $_POST["phone"];
$emp_mngr = $_POST["managers"];
$emp_pos = $_POST["position"];
// Making The Query
$sql = "INSERT INTO employee (idEmployee,name,family,address,phone,Manager_idManager,Position_code)
        VALUES ($emp_id,'$emp_fname','$emp_lname','$emp_adrs',$emp_phone,$emp_mngr,$emp_pos)";

//Commit The Query & Check For Results
if (mysqli_query($conn, $sql)) {
    header('Location: ../view/success_record.html');
    exit;
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);
?>