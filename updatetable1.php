
<?php
session_start();

$uname = $_SESSION['login_user'];

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Braworld</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper" >
    <div class="sidebar"  data-color="purple" data-image="assets/img/sidebar-5.jpg" >

    <!--
    data-color="purple" data-image="assets/img/sidebar-5.jpg"

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                 <img src="assets/img/logo.png" width = "150px " height = "40px" alt=""/>
                   <br> CONTACTS KPI SYSTEM
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="updatetable1.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li class="active">
                    <a href="submitform.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Update data</p>
                    </a>
                </li>
                 <li>
                    <a href="updatetable1.php">
                        <i class="pe-7s-note2"></i>
                        <p>SAMIYA</p>
                    </a>
                </li>
                   <li>
                    <a href="updatetable2.php">
                        <i class="pe-7s-note2"></i>
                        <p>CISSY</p>
                    </a>
                </li>
            
                   <li>
                    <a href="updatetable1.php">
                        <i class="pe-7s-note2"></i>
                        <p>NADIA</p>
                    </a>
                </li>
                   <li>
                    <a href="updatetable1.php">
                        <i class="pe-7s-note2"></i>
                        <p>MONICA</p>
                    </a>
                </li>
                   
                 

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Charts.html">Pie chart</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <?php echo $uname; ?>
                            </a>
                        </li>

                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Logout
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="index.php">logout</a></li>
                               
                              </ul>
                        </li>
                        </ul>

                </div>
            </div>
        </nav>


<?php

$con = mysql_connect("localhost","root", "");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("Braworld_KPI_System", $con);



$query = "SELECT * FROM samiya_contact_list WHERE Comment != '' ";

    $results= mysql_query($query);

      echo'  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Active contacted Customers</h4>
                                <p class="category">Samiya</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Full Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                         <th>Style Number</th>
                                          <th>ID</th>
                                         <th>Comment</th>
                                        <th>Status</th>
                                        <th>Contact date</th>
                                    </thead> ';
                                            while($row = mysql_fetch_array($results)) {
echo '


                                    <tbody>
                                    <tr><td>'.$row['fullname'].'</td>
                                    <td>'.$row['phoneNumber'].'</td>
                                        <td>'.$row['Email'].'</td>
                                        <td>'.$row['Code'].'</td>
                                      <td>'.$row['contact_id'].'</td>
                                        <td>'.$row['comment'].'</td>
                                        <td>'.$row['Successful'].'</td>
                                    <td>'.$row['date_contact'].'</td></tr>
';}
                                    echo '</tbody>
                                </table>

                            </div>
                        </div>
                    </div>'; 



$query = "SELECT COUNT(*) AS total FROM samiya_contact_list WHERE Comment != ''  ";

$result = mysql_query($query);
$values = mysql_fetch_assoc($result);

$number_of_contacted_customers = $values['total'];

//$total_value_ofpayments = $values['total_payment'];

$query = "SELECT COUNT(*) AS total1 FROM samiya_contact_list  ";


$result = mysql_query($query);
$values = mysql_fetch_assoc($result);

$number_of_all_customers = $values['total1'];



/* CUSTOMERS WHO TURNED UP*/
$query = "SELECT COUNT(*) AS total2 FROM samiya_contact_list WHERE Successful != ''  ";

$result = mysql_query($query);
$values = mysql_fetch_assoc($result);

$turnedup_customers = $values['total2'];








                     
                    echo'

                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Statistics</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Number of customers contacted</th>
                                        <th>Number of all customers</th>
                                        <th>Customers who turned up</th>
                                       
                                    </thead>';

                                                echo'
                                    <tbody>
                                        
                                        <tr><td>'.
$number_of_contacted_customers.'</td>
                                    <td>'.$number_of_all_customers.'</td>
                                        <td>'.$turnedup_customers.'</td>
                                        <td>'.$row['Code'].'</td>
                                      <td>'.$row['contact_id'].'</td>
                                           
</tr>';

echo'
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

';



?>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.Braworldug.com">Braworld</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
