<?php
/**
 * Created by PhpStorm.
 * User: Livne
 * Date: 25/01/2015
 * Time: 20:25
 */

/**
 * Function to write to Browser Console
 * @param $data
 */
function debug_to_console($data) {
    if(is_array($data)) {
        echo("<script>console.log('PHP: ".implode(',', $data)."');</script>");
    }
    else {
        echo("<script>console.log('PHP: ".$data."');</script>");
    }
}




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
$ord_event_code = $_POST["event_code"];
$ord_hall = $_POST["hall"];
$ord_date = $_POST["date"];
$ord_menu = $_POST["menu"];
$ord_c = $_POST["customer"];
$ord_manager = $_POST["mngr_id"];

// About to check whether the Hall & Date Are Available
$sql_check = "SELECT * FROM tackplacein";
$result = mysqli_query($conn, $sql_check);
$occupied = false;
if (mysqli_num_rows($result) > 0) {
    // Iterate Threw the rows to check if available
    $occupied = true;
    while ($row = mysqli_fetch_assoc($result)) {
        if($row["Hall_code"] == $ord_hall) {
            if($row["Date_Date"] == $ord_date) {
                echo "<script>alert('Hall & Date Are Alreay Taken')</script>";

                return;
            }
        }

        }
    }

// Making The Queries For The Tables
$sql_order = "INSERT INTO mydb.order VALUES (0,$ord_event_code,$ord_hall,'$ord_date',$ord_menu,$ord_c,$ord_manager)";
$sql_t = "INSERT INTO mydb.tackplacein VALUES ($ord_hall,'$ord_date')";

$rs = mysqli_query($conn,$sql_t);

// Commit update_tackplacein table
if( $rs) {
    echo"wow";
}
else{
    echo "Error: " . mysqli_error($conn);
}



//Commit The Query For Order & Check For Results
if(occupied == true) {
    if (mysqli_query($conn, $sql_order)) {
        header('Location: ../view/success_record.html');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
     }
}




        mysqli_close($conn);
?>