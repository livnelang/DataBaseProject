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
$cstmr_id = $_POST["id"];
$cstmr_fname = $_POST["fname"];
$cstmr_lname = $_POST["lname"];
$cstmr_phone = $_POST["phone"];
// Making The Query
$sql = "INSERT INTO customer (idCustomer,name,family,phone)
        VALUES ($cstmr_id,'$cstmr_fname','$cstmr_lname',$cstmr_phone)";

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