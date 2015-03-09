<!DOCTYPE html>                                        					<!-- Livne Lang -->
<head xmlns="http://www.w3.org/1999/html">
    <title>DataBaseProject
    </title>
    <meta charset = "utf-8";>
    <!-- Include all Jquery files as needed -->
    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <!-- Bootstrap-CSS & General CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
<div id=wrapper>

    <div id=header>
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="show_positions.php" class="dropdown-toggle" data-toggle="dropdown">Position <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="show_position.php">Show Positions</a></li>
                            <li><a href="add_position.html">Add Position</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="show_positions.php" class="dropdown-toggle" data-toggle="dropdown">Employee<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="show_employee.php">Show Employees</a></li>
                            <li><a href="show_emp_pos.php">Employee-Position</a></li>
                            <li><a href="add_employee.php">Add Employee</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="show_positions.php" class="dropdown-toggle" data-toggle="dropdown">Halls<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="show_halls.php">Show Halls</a></li>
                            <li><a href="add_hall.html">Add Hall</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="show_positions.php" class="dropdown-toggle" data-toggle="dropdown">Events<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="biggest_event.php">Biggest Event</a></li>
                            <li><a href="time_events.php">Events By Time</a></li>
                            <li><a href="hall_events.php">Events By Hall</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="show_positions.php" class="dropdown-toggle" data-toggle="dropdown">Customers<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="show_cstmrs.php">Show Customers</a></li>
                            <li><a href="add_cstmr.html">Add Customer</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a  href="show_positions.php" class="dropdown-toggle" data-toggle="dropdown">Orders<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="show_orders.php">Show Orders</a></li>
                            <li><a href="add_order.php">Add Order</a></li>
                        </ul>
                    </li>
                    <li id="side_title"><a disable="disabled" href="#">DataBase Project 2015</a></li>
                </ul>
            </div>
        </div>

    </div>
    <main>
        <div class="panel panel-default data-content">
            <div class="panel-heading">
                <h3 class="panel-title">Employees On Current Event</h3>
            </div>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Family</th>
                    <th>Position</th>
                </tr>
                    <?php

                    $servername = "localhost";
                    $username = "apple";
                    $password = "pie";
                    $dbname = "mydb";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    // Get order id from form
                    $order_id = $_POST["order_id"];

                    // 1.Get Order Details
                    $sql_order = "SELECT * FROM mydb.order WHERE order.idOrder= $order_id ";
                    $code_result = mysqli_query($conn, $sql_order);
                    $order_row = mysqli_fetch_assoc($code_result);

                    // 2.Get Hall Code Where date & hall matches our specific order
                    $sql_hall_code = "SELECT tackplacein.Hall_code FROM tackplacein WHERE
                                      Date_Date= '$order_row[Date_date]' AND Hall_code='$order_row[Hall_Code]' ";
                    $code_result = mysqli_query($conn, $sql_hall_code);
                    $code_row = mysqli_fetch_assoc($code_result);
                    echo "hall code: ".$code_row['Hall_code'];

                    // 3. Get All Employees from works On Current Event
                    $sql_emp_list = "SELECT works.Employee_idEmployee FROM works WHERE works.Hall_Code= $code_row[Hall_code]";
                    $orders_result = mysqli_query($conn, $sql_emp_list);

                    if ($orders_result) {


                    // Gets all Employees One By One
                    if (mysqli_num_rows($orders_result) > 0) {
                        while ($row = mysqli_fetch_assoc($orders_result)) {
                            // get Employee FullName + Position code
                            $sql_employee_details = "SELECT employee.name, employee.family,employee.Position_code FROM mydb.employee WHERE idEmployee= $row[Employee_idEmployee]";
                            $result = mysqli_query($conn, $sql_employee_details);
                            $employee_row = mysqli_fetch_assoc($result);
                            // get Position Name
                            $sql_position_name = "SELECT position.description FROM position WHERE position.code= $employee_row[Position_code]";
                            $position_result = mysqli_query($conn, $sql_position_name);
                            $position_name = mysqli_fetch_assoc($position_result);

                            echo "<tr><td>" . $employee_row["name"] . "</td>" .
                                "<td>" .  $employee_row["family"]."</td>" .
                                "<td>" . $position_name["description"] . "</td>" .
                                "</tr>";
                            }
                        }
                    }


                        else {
                            echo "No Employees Registered Yet";
                        }

                    mysqli_close($conn);
                    ?>

            </table>
        </div>
        <div id="emp_list" class="add_pic"></div>
    </main>






</div>    <!-- Close Wrapper Div -->
</body>

</html>