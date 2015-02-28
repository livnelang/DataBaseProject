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
                <h3 class="panel-title">Biggest Event</h3>
            </div>
            <div class="panel-body">
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
                    $sql = "SELECT * FROM mydb.order";

                    // prepared SQL Statement
                    $sql_hall_cap = $conn->prepare("SELECT hall.capacity FROM hall WHERE code=?");
                    $result = mysqli_query($conn, $sql);
                    $max_order_code;
                    $max_cap = 0;
                    $cap;
                    // get all hall codes from Hall
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sql_hall_cap->bind_param("s",$row["Hall_Code"]);
                            /* execute query */
                            $sql_hall_cap->execute();
                            /* bind result variables */
                            $cap = $sql_hall_cap->get_result()->fetch_row();
                            $cap = $cap[0];
                            if($cap>$max_cap) {
                                $max_cap = $cap;
                                $max_order_code = $row["idOrder"];
                            }
                        }
                        //get order details
                        $sql_select_max_order = "SELECT * FROM mydb.order WHERE idOrder='$max_order_code'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        // get Customer Name
                        $sql_customer_fullname = "SELECT customer.name, customer.family FROM mydb.customer WHERE idCustomer= $row[Customer_idCustomer]";
                        $result = mysqli_query($conn, $sql_customer_fullname);
                        $customer_row = mysqli_fetch_assoc($result);


                        echo "<td>" . $row["idOrder"] . "</td>" .
                            "<td>" . $customer_row["name"]." ". $customer_row["family"]. "</td>" .
                            "<td>" . $row["Event_eventCode"] . "</td>" .
                            "<td>" . $row["Date_date"] . "</td>" .
                            "<td>" .$max_cap. "</td>" .
                            "</tr>";
                    }



                    else {
                        echo "0 results";
                    }

                    mysqli_close($conn);

                    ?>
                </table>
                <article id="big_event">

                </article>
                </div>
        </div>
    </main>






</div>    <!-- Close Wrapper Div -->
</body>
</html>