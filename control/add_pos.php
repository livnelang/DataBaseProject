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
$pos_code = $_POST["code"];
$pos_desc = $_POST["desc"];
$pos_sal = $_POST["salary"];
// Making The Query
/*$sql = "call positionInsert
        USING
        $pos_code,
        $pos_desc,
        $pos_sal";*/
$mysqli = new mysqli();
$sql =" CALL positionInsert('$pos_code', '$pos_desc', '$pos_sal') ";

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