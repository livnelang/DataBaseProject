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
                <a class="navbar-brand" href="../view/index.php">Home</a>
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
            <?php
            // Gets URL Parameter
            if (isset($_GET['emp_id']))
            {
                $id = $_GET['emp_id'];
            }

           echo  "<div class=\"panel-heading\">".
                "<h3 class=\"panel-title\">Edit Employee Details       <span class=\"span_right\"> Employee ID: $id</span></h3>";
            ?>
            </div>
            <div class="panel-body">
                <form action="../control/update_employee.php" method="post">

                    <?php
                    $servername = "localhost";
                    $username = "apple";
                    $password = "pie";
                    $dbname = "mydb";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);


                    // Get Current Updated Employee Details
                    $sql = "SELECT * FROM employee WHERE idEmployee=$id ";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $curr_emp = mysqli_fetch_assoc($result);
                    }

                    ?>
                    <!-- Hidden Input Field (ID) -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                   <?php echo $id ?>
                    <div class="form-group col-xs-3 user-list">
                        <label>Manager</label> <br>
                        <select name="managers" class="select_dec">
                            <?php
                            $servername = "localhost";
                            $username = "apple";
                            $password = "pie";
                            $dbname = "mydb";
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            $sql = "SELECT * FROM manager";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='".$row[idManager]."'>".$row["name"]." ".$row["family"]."</option>";
                                }
                            }
                            else {
                                echo "0 results";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-xs-5 user-list">
                        <label>Position</label> <br>
                        <select name="position" class="select_dec">
                            <?php
                            $sql = "SELECT * FROM position";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='".$row["code"]."'>".$row["description"]."</option>";
                                }
                            }
                            else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div>
                        <div class="form-group col-xs-3 user-list">
                            <label>Phone</label>
                            <input type="number" placeholder= <?php echo"$curr_emp[phone]"; ?>. required="Must enter a value" class="form-control" name="phone" placeholder="Enter Phone">
                        </div>
                            <div class="clear"></div>
                                <div class="form-group col-xs-3 user-list">
                                    <button type="submit" class="btn btn-default">Update Employee</button>
                                </div>

                </form>
                <div id="emp_update_pic" class="add_pic"></div>
            </div>
        </div>
    </main>






</div>    <!-- Close Wrapper Div -->
</body>

</html>