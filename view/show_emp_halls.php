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
                <h3 class="panel-title">Employee Work Places</h3>
            </div>
            <table class="table">
                <tr>
                    <th>Hall</th>
                </tr>
                <?php

                $servername = "localhost";
                $username = "apple";
                $password = "pie";
                $dbname = "mydb";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Get Hall Name From Form
                $emp_id = $_POST["emp_id"];

                // Get Hall Code
                $sql_hall_code = "SELECT works.Hall_code FROM works WHERE works.Employee_idEmployee= '$emp_id' ";
                $code_result = mysqli_query($conn, $sql_hall_code);


                //echo mysqli_num_rows($result);


                // Check If event is in range Loop, if so -> add it to range orders
                if (mysqli_num_rows($code_result) > 0) {
                    while ($row = mysqli_fetch_assoc($code_result)) {
                        // get hall Name
                        $sql_hall_name = "SELECT hall.name FROM hall WHERE hall.code= $row[Hall_code]";
                        $result = mysqli_query($conn, $sql_hall_name);
                        $hall_name = mysqli_fetch_assoc($result);

                        echo "<tr><td>" . $hall_name["name"] . "</td>" .
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