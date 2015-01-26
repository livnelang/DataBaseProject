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

    <main>
        <div class="panel panel-default data-content">
            <div class="panel-heading">
                <h3 class="panel-title">Add New Employee</h3>
            </div>
            <div class="panel-body">
                <form action="../control/add_emp.php" method="post">
                    <div class="form-group col-xs-3 user-list">
                        <label>Employee Id</label>
                        <input type="number" required="Must enter a value" class="form-control" name="id" placeholder="Enter Id">
                    </div>
                        <div class="form-group col-xs-3 user-list">
                            <label>First Name</label>
                            <input type="text" required="Must enter a value" class="form-control" name="fname" placeholder="Enter Name">
                        </div>

                            <div class="form-group col-xs-3 user-list">
                                <label>Last Name</label>
                                <input type="text" required="Must enter a value" class="form-control" name="lname" placeholder="Enter Last Name">
                            </div>

                                <div class="form-group col-xs-3 user-list">
                                    <label>Address</label>
                                    <input type="text" required="Must enter a value" class="form-control" name="adrs" placeholder="Enter Address">
                                </div>
                                    <div class="form-group col-xs-3 user-list">
                                        <label>Phone</label>
                                        <input type="number" required="Must enter a value" class="form-control" name="phone" placeholder="Enter Phone">
                                    </div>
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
                                                echo "<option value='".$row[idManager]."'>".$row["idManager"]."</option>";
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

                        <div class="clear"></div>
                        <div class="form-group col-xs-3 user-list">
                            <button type="submit" class="btn btn-default">Add Employee</button>
                        </div>

                    </form>
                </div>
        </div>
    </main>






</div>    <!-- Close Wrapper Div -->
</body>

</html>