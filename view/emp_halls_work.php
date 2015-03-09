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
                <h3 class="panel-title">Employee WorkPlaces</h3>
            </div>
            <div class="panel-body">

                <form action="show_emp_halls.php" method="post">

                    <?php

                    // connection details
                    $servername = "localhost";
                    $username = "apple";
                    $password = "pie";
                    $dbname = "mydb";

                    //get all dates
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $sql = "SELECT * FROM employee";
                    $result = mysqli_query($conn, $sql);
                    sort($result->fetch_fields());
                    /*while ($row = mysqli_fetch_assoc($result)) {
                        echo "$row[Date]"."\r\n";
                    }*/
                    ?>

                    <div class="form-group col-xs-3 user-list">
                        <label>Choose Employee</label>
                        <select class="select_dec" name="emp_id">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='".$row[idEmployee]."'>".$row[name]." ".$row[family]."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="clear"></div>
                    <div class="form-group col-xs-3 user-list">
                        <button type="submit" class="btn btn-default">Get Employee Halls</button>
                    </div>

                </form>
                <div id="emp_work" class="add_pic"></div>

            </div>

        </div>
    </main>






</div>    <!-- Close Wrapper Div -->
</body>

</html>