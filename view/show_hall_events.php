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
                        <a href="show_positions.php" class="dropdown-toggle" data-toggle="dropdown">Customers<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="show_cstmrs.php">Show Customers</a></li>
                            <li><a href="add_cstmr.html">Add Customer</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="show_positions.php" class="dropdown-toggle" data-toggle="dropdown">Orders<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="show_orders.php">Show Orders</a></li>
                            <li><a href="add_order.php">Add Order</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Dropdown header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    <!-- <li class="col-xs-push-4"><img src="img/mysql_logo1.png"></li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <main>
        <div class="panel panel-default data-content">
            <div class="panel-heading">
                <h3 class="panel-title">Events By Hall</h3>
            </div>
            <table class="table">
                <tr>
                    <th>Order Id</th>
                    <th>Customer Name</th>
                    <th>Event Type</th>
                    <th>Date</th>
                    <th>Capacity</th>
                </tr>
                <?php

                $servername = "localhost";
                $username = "apple";
                $password = "pie";
                $dbname = "mydb";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Get Hall Name From Form
                $hall_name = $_POST["hall_name"];

                // Get Hall Code
                $sql_hall_code = "SELECT hall.code FROM hall WHERE hall.name= '$hall_name' ";
                $code_result = mysqli_query($conn, $sql_hall_code);
                $code_row = mysqli_fetch_assoc($code_result);

                // Get All Orders with That Code
                $sql = "SELECT * FROM mydb.order WHERE order.Hall_Code= $code_row[code]";
                $orders_result = mysqli_query($conn, $sql);

                //echo mysqli_num_rows($result);


                // Check If event is in range Loop, if so -> add it to range orders
                if (mysqli_num_rows($orders_result) > 0) {
                    while ($row = mysqli_fetch_assoc($orders_result)) {
                        // get Customer Name
                        $sql_customer_fullname = "SELECT customer.name, customer.family FROM mydb.customer WHERE idCustomer= $row[Customer_idCustomer]";
                        $result = mysqli_query($conn, $sql_customer_fullname);
                        $customer_row = mysqli_fetch_assoc($result);
                        // get Event Name
                        $sql_event_name = "SELECT event.name FROM event WHERE eventCode= $row[Event_eventCode]";
                        $event_result = mysqli_query($conn, $sql_event_name);
                        $event_name = mysqli_fetch_assoc($event_result);
                        // get Capacity Number
                        $sql_capacity_num = "SELECT hall.capacity FROM hall WHERE hall.code= $row[Hall_Code]";
                        $capacity_result = mysqli_query($conn, $sql_capacity_num);
                        $capacity_num = mysqli_fetch_assoc($capacity_result);

                        echo "<tr><td>" . $row["idOrder"] . "</td>" .
                            "<td>" .  $customer_row["name"]." ". $customer_row["family"]."</td>".
                            "<td>" . $event_name["name"] . "</td>" .
                            "<td>" . $row["Date_date"] . "</td>" .
                            "<td>" . $capacity_num["capacity"]. "</td>" .
                            "</tr>";
                    }
                }

                mysqli_close($conn);
                ?>

            </table>
        </div>
    </main>






</div>    <!-- Close Wrapper Div -->
</body>

</html>