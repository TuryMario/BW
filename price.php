<?php

$con = mysqli_connect("localhost", "root", "mario1211", "Braworld_KPI_System");

if (mysqli_connect_errno()) {
    exit("connection FALSE");
}

// $server = 'localhost';
// $user = 'root';
// $password = 'mario1211';
// $database_name = 'braworld_kpi_system';

// $conn = new mysqli($server, $user, $password, $database_name);
//     if ($conn->connect_error) {
//         exit("connection FALSE");
//     }
    //   echo $_POST["pos_code"];
    //get employee detail from POST (sent via AJAX):
    $POS_code = $_GET["pos_code"];

    
    //here, you should test whether employee_detail matches what you expect
    //here, split $employee_detail into $first_name, $last_name and $company_name
    //now you are ready to send the MYSQL query:
    $sql = "SELECT DISTINCT Selling_price, Description FROM pdt_table 
    WHERE POS_code = '".$POS_code."' ";

    if ($result = mysqli_query($con,$sql))
    {
        if(mysqli_num_rows($result) > 0)
            {
                //echo "Exists";
                while ($row = mysqli_fetch_array($result)) {
                    $price = $row['Selling_price'];
                    // $description = $row['Description'];
                }
        }
        else
            echo "Doesn't exist";
    }
    else
        echo "Query Failed.";

    //since you expect a single matching result, you can test for num_rows == 1:
    // if ((! $result) || ($result-> num_rows !== 1)) {
    //     exit("FALSE");
    // } else {
    //     while ($row = $result->fetch_assoc()) {
    //         $price = $row['Selling_price'];
    //         $description = $row['Description'];
    //     }
    // }
    //now send $employee_id back to the AJAX call:
    echo $price ;

    
    // echo $description;

    // $data array(
    //     "price" => $price,
    //     "description" => $description,
    // );
    // echo json_encode($data);
 ?>