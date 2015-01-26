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
$hall_code = $_POST["code"];
$hall_name = $_POST["name"];
$hall_capacity = $_POST["cpcty"];
// Making The Query
$sql = "INSERT INTO hall (code,name,capacity)
        VALUES ($hall_code,'$hall_name',$hall_capacity)";

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