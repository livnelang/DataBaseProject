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
echo "$emp_id";
$emp_phone = $_POST["phone"];
$emp_mngr = $_POST["managers"];
$emp_pos = $_POST["position"];
// Making The Query
$sql = "UPDATE employee
        SET phone= $emp_phone,Manager_idManager=$emp_mngr,Position_code=$emp_pos
        WHERE idEmployee =$emp_id ";

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