<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bra World POS</title>

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

    <!-- Firebase Authentication -->
    <script src="https://www.gstatic.com/firebasejs/4.4.0/firebase.js"></script>
    <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyDBGUjJUeQBWwkT8ssE0Q2SB-c692D5GWQ",
        authDomain: "braworld-e1ab5.firebaseapp.com",
        databaseURL: "https://braworld-e1ab5.firebaseio.com",
        projectId: "braworld-e1ab5",
        storageBucket: "braworld-e1ab5.appspot.com",
        messagingSenderId: "475788712099"
      };
      firebase.initializeApp(config);

       // var btnLogout = document.getElementById("btnLogout");
        var user = firebase.auth().currentUser;
        var email;

        //Firebase real time listener
        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
              console.log(user.email);
              if(user.email == "mario@gmail.com"){
                document.getElementById("salesRep").value = "Mariotury";
                // document.getElementById("email").value = user.email;
                document.getElementById("account").innerHTML = "Mariotury";
              }
        }else{
            console.log("Wrong user logged in....");
            window.location.replace("http://localhost/bw/account/index.html");
        }
    });

    function logout(){
        firebase.auth().signOut();
        window.location.replace("http://localhost/bw/account/index.html");}


    </script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- Converting a Javascript array into JSON format is easy to do with jQuery-json which is a free jQuery plugin. Include this plugin on the page running your Javascript script.-->
    <script src="jquery-json-master/jquery-json-master/dist/jquery.json.min.js"></script>
    <script type="text/javascript" src="assets/js/table.js"></script>
    <script type="text/javascript" src="assets/js/form.js"></script>
    <script type="text/javascript">

    //  retrieving the price from the database
      $(document).ready(function(){


            $(document).on("change", ".pos_code" ,function(){

                //   $(document).on("blur", ".pos_code" ,function(){
                console.log(this.value);
                
                $.ajax({
                     method: "GET",
                     url: "price.php",
                     data: {
                    pos_code: $("#product").val(),
                     },
                     success: function(response){
                        if (response == "FALSE") {
                            var message = "ERROR: That POS code doesn't exist in the system";
                            alert(message);
                        } else {
                        

                            $("input.price-from-ajax").val(response);
                            //  $("#description").val(response);
                        }
                     },
                     error: function(jqXHR, textStatus, errorThrown){
                        var message = "ERROR: something went wrong with the AJAX call - " + textStatus + " - " + errorThrown;
                        alert(message);
                     }
                  });
             });
       



          });

    </script>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        	<div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        BRAWORLD CONTACT KPI
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
                            <i class="pe-7s-graph"></i>
                            <p>Update data</p>
                        </a>
                    </li>
                     <li>
                        <a href="updatetable1.php">
                            <i class="pe-7s-note2"></i>
                            <p>SAMIYA</p>
                        </a>
                    </li>
                    <!-- <li>
                        <a onclick="logout();">
                            <i class="pe-7s-note2"></i>
                            <p>Logout</p>
                        </a>
                    </li> -->

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
                        <a class="navbar-brand" href="#">Dashboard</a>
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
                                   <p id="account"> Account </p>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>



            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card"  style=" width: 1000px;">
                                <div class="header">
                                    <h4 class="title">Enter Sales Data</h4>
                                </div>

                                <div class="content">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <label >Date</label>
                                                   <!-- date info code -->
                                                    <?php  $da=date("d-m-Y"); 
                                                    date_default_timezone_set("Africa/Kampala"); 
                                                    $time = date("h:i-A");
                                                   ?>
                                                   <!-- end -->
                                                    <input id ="date1" class="form-control" placeholder="date"  type="text" name="date" label="date" value = "<?php echo $da; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label >Time</label>
                                                    <input id="time1" type="text" class="form-control" placeholder="time"  name="time" label="time" value ="<?php echo $time; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label >Location</label>
                                                    <!-- drop down for the location -->                     
                                                    <select id="location" name= "location"     class="form-control" type="text" required >
                                                              
                                                        <option value="">Selet location</option>
                                                        <option value= "kampalaRoad" > kampala Road</option> 
                                                        <option value= "Naalya" > Naalya</option> 
                                                      </select>
                                                </div>
                                            </div>

                                            <!-- end -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label onLoad="ShowTime()" >Sales Representative</label>
                                                    <!-- drop down for the location -->     
                                                    <!-- <select id="salesRep" name= "location"     class="form-control" type="text" required readonly>
                                                        <option value="">Selet representative</option>
                                                        <option value= "Monica" > Monica</option><option value= "Claudia" > Claudia</option> 
                                                        <option value= "Suzan" > Susan</option>
                                                        <option value= "Nadia" > Nadia</option>
                                                    </select> -->
                                                    <input id="salesRep" type="text" class="form-control" placeholder="Sales Representative"  name="salesRep" label="salesRep" value="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- product info -->

                                        <div class="header">
                                            <h4 class="title">Enter Product Information</h4>
                                        </div>

                                        <div class="row package-row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label >Product</label>
                                                    <input type='text' name='item'  placeholder='item' id ="product" class='form-control pos_code' />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label >Coupon</label>
                                                        <!--<input type="text" name='discount[]' id= 'discount' placeholder='Discount' class='form-control discount amount' /> -->
                                                        <!-- <input type="checkbox"  name='coupon[]' id= 'coupon' placeholder='coupon' class='form-control discount' value='30000' /> -->
                                                    <select name= "coupon"   id= 'coupon' placeholder='coupon'   class="form-control" type="text" required >
                                                        <option value="">Selet coupon</option>
                                                        <option value= "0" > No coupon</option> 
                                                        <option value= "30000" > 30,000</option> 
                                                    </select>
                                                </div>
                                            </div> 

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label >Quantity</label>
                                                        <!-- <input type="text" name='quantity[]' id= 'quantity' placeholder='Quantity' class="form-control " /> -->
                                                    <select    name='quantity' id= 'quantity' placeholder='Quantity' class="form-control" type="text" required >
                                                        <option value="">Selet quantity</option>
                                                        <option value= "1" > 1</option> 
                                                        <option value= "2" > 2</option> 
                                                        <option value= "3" > 3</option> 
                                                        <option value= "4" > 4</option>
                                                        <option value= "5" > 5</option> 
                                                        <option value= "6" > 6</option>
                                                        <option value= "7" > 7</option> 
                                                        <option value= "8" > 8</option>
                                                        <option value= "9" > 9</option> 
                                                        <option value= "10"> 10</option>
                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label  >Price</label>
                                                        <!-- drop down for the location -->
                                                        <input type='text' name='price[]'  placeholder='Price' id="price"  class='form-control price price-from-ajax amount' />
                                                    </div>
                                                </div>
                                            </div>

                                        <a id="add1" type="reset" class="btn btn-default pull-left resetbtn" onclick="updateForm('1');" style="background: #337ab7; color: white;" >Add Product</a>

                                        <a id='add2' class="pull-right btn btn-default" onclick="updateForm('2');" style="background: red; color: white;">Delete Product</a>
                                        <!-- product info -->
                                        <div class="container">
                                            <div class="row clearfix">
                                        		<div class="col-md-8 column">
                                        			<table class="table table-bordered table-hover" id="results">
                                        				<thead>
                                        					<tr >
                                        						<!-- <th class="text-center">
                                        							#
                                        						</th> -->
                                        						<th class="text-center">
                                        							Item
                                        						</th>
                                        						<!-- <th class="text-center">
                                        							Coupon
                                        						</th> -->
                                        						<th class="text-center">
                                        							Quantity
                                                                </th>
                                                                <th class="text-center">
                                        							Price
                                                                </th>
                                                                <th class="text-center">
                                        							Amount
                                                                </th>
                                                                <th class="text-center">
                                        							Amount Saved with Coupon
                                                                </th>
                                                                <th class="text-center">
                                        							Amount to be Paid
                                        						</th>
                                                                <!-- <th class="text-center" style=" color: red;">
                                        							TOTAL AMOUNT 
                                        						</th>  -->
                                        					</tr>
                                        				</thead>
                                        				<tbody id ="package "> </tbody> 
                                        			</table> 
                                        		</div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                    		<div class="col-md-3 column">
                                    			<div class="form-group">
                                                    <label style="font-size: 14px;">Number of Items:</label>
                                                        <input id ="qty" class="form-control" style=" color: blue;" placeholder="0"  type="text" name="qty" label="qty" value="" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label style="font-size: 14px;">Total:</label>
                                                        <input id ="tot" class="form-control" style=" color: red;" placeholder="0"  type="text" name="tot" label="Total" value="" readonly>
                                                </div>
                                    		</div>
                                        </div> 
                                    </form>
                                </div>

                                        

                                <!-- enter customer information -->
                                <!-- product information -->
                                <div class="header">
                                    <h4 class="title">Enter Customer Information</h4>
                                </div>

                                <div class="row package-row">
                                    <!-- <div class="row"> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label >First name</label>
                                            <input id="fname" type="text" class="form-control" placeholder="firstname" 
                                                     name="firstname" label="firstname">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label >Last name</label>
                                            <input id="lname" type="text" class="form-control" placeholder="last name" 
                                                      name="lastname" label="lastname">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label >Phone number</label>
                                            <input id="phoneNo" type="text" class="form-control" placeholder="phone number" 
                                                      name="phonenumber" label="phonenumber">
                                             <!-- drop down for the location -->            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label >Email</label>
                                            <input id="email" type="text" class="form-control" placeholder="email" 
                                                      name="email" label="email">
                                            <!-- drop down for the location -->          
                                        </div>
                                    </div>
                                </div>

                                <br><br>

                                <div class="row package-row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >Customer Type</label>
                                            <select id="customerType" name= "customertype"     class="form-control" type="text" required >
                                                <option value="">Selet type</option>
                                                <option value= "ExistingCustomer" > Existing Customer</option> 
                                                <option value= "NewCustomer" > New Customer</option>
                                            </select>
                                             <!-- drop down for the location -->         
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label >How did the customer get to know about us?</label>
                                            <select id="refferal" name= "refferal"     class="form-control" type="text" required >
                                                <option value="">Selet one from drop down</option>
                                                <option value= "Billboard" > Bill Board</option> 
                                                <option value= "Facebook" > Facebook</option>
                                                 <option value= "ExistingCustomer" > Existing Customer</option> 
                                                <option value= "NewCustomer" > New Customer</option>
                                                <option value= "Instagram" > Instagram</option> 
                                                <option value= "Twitter" > Twitter</option>
                                                <option value= "Sistersbridalshop" > From Sisters Bridal Shop</option> 
                                                <option value= "RefferedByFormerCustomer" > Reffered by former Customer</option>
                                            </select>
                                             <!-- drop down for the location --> 
                                        </div>
                                    </div>


                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >Birth month?</label>
                                            <select id="birthmonth" name= "birthmonth"     class="form-control" type="text" required >
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                            <!-- drop down for the location -->           
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label > Day?</label>
                                            <select id="day" name= "birthmonth"     class="form-control" type="text" required >
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>        
                                            </select>
                                             <!-- drop down for the location -->           
                                        </div>
                                    </div> 
                                </div>

                                <button type="button" id="submit" class="btn btn-info btn-fill pull-right">Print Receipt</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left"></nav>
                        <p class="copyright pull-right">
                            &copy; 2016 <a href="http://www.Braworldug.com">Braworld</a>, made with love for a better web
                        </p>
                        <a id='logout' class="pull-right btn btn-default" onclick="logout()" style="background:#31708f; color: white;">Logout</a>
                </div>
            </footer>
    </div>
</body>

</html>

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
    
    <!-- this is for the dynamic form -->
    <script type="text/javascript" src="assets/js/Sales_entryv33.js"></script>

    <!-- <script type="text/javascript" src="customer_details.js"></script> -->

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->


<!-- Mariotury -->

<!-- Added this class = "package-row" at line  234-->
<!-- Changed eventlistner to onchange to call the getValues() -->
<!-- Added class attribute to all fields involved in the calculations that would universally be refrenced fro the JavaScript file -->
<!-- Javascript file: values.js -->