<?php
@include 'config.php';
error_reporting(0);
session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <style>
        .update{
            background-color: green;
            color: #fff;
            border: none;
            outline: none;
            border-radius: 5px;
            padding: 3px 5px;
            font-weight: 500;
        }
        .delete{
            background-color: blue;
            color: #fff;
            border: none;
            outline: none;
            border-radius: 5px;
            padding: 3px 5px;
            font-weight: 500;
        }
        table{
            margin-left: 130px;
        }
    </style>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/ad.css">
</head>
<body>
    <div class="acontainer">
    <header>
        <div class="div1">
            <span>BD TRANSPORT</span>
        </div>
        <div class="div2">
            <div class="home">Home</div>
            <div class="about">About US</div>
            <div class="contact">Contact US</div>
        </div>
        <div class="div3">
            <a href="logout.php">
                <button type="button">Logout</button>
            </a>
            <a href="#">
                <button type="button">Home</button>
            </a>
            <a href="user_page.php">
                <button type="button">User</button>
            </a>
        </div>
    </header>
     <div class="user_form">
     <!-- <table border="2" cellspacing="5" cellpadding="10">
                <thead>
                    <caption>
                       <h3>User Information</h3>
                    </caption>
                </thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Operations</th>
                </tr> -->
        <?php
        $query = "SELECT * FROM user_form";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        // $result = mysqli_fetch_assoc($data);
        // eta un comment korle 1 no record ta show!
        // echo $result['id']." ".$result['name']." ".$result['email'];
        // echo $total;

        if($total !=0){
            ?>
            <table border="2" cellspacing="10" cellpadding="10">
                <thead>
                    <caption>
                       <h3 class="headding">User Information</h3>
                    </caption>
                </thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Operations</th>
                </tr>
                <?php
            while($result = mysqli_fetch_assoc($data))
            {
                echo "<tr>
                <td>".$result['id']."</td>
                <td>".$result['name']."</td>
                <td>".$result['email']."</td>
                <td>".$result['user_type']."</td>

                <td><a href='update_user.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>

                <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return anis()'></a> </td>

                </tr>
                ";
            }
        }
        else{
            echo "No records found!";
        }
        ?>
            </table>
     </div>
     <div class="Bus_info">
     <?php
        $query = "SELECT * FROM bus_info";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        // $result = mysqli_fetch_assoc($data);
        // eta un comment korle 1 no record ta show!
        // echo $result['id']." ".$result['name']." ".$result['email'];
        // echo $total;

        if($total !=0){
            ?>
            <table border="2" cellspacing="5" cellpadding="10">
                <thead>
                    <caption>
                       <h3 class="headding">Bus Information</h3>
                    </caption>
                </thead>
                <tr>
                <th>Bus ID</th>
                <th>Bus Number</th>
                <th>Model</th>
                <th>Capacity</th>
                <!-- <th>Operations</th> -->
                </tr>
                <?php
            while($result = mysqli_fetch_assoc($data))
            {
                echo "<tr>
                <td>".$result['bus_id']."</td>
                <td>".$result['bus_num']."</td>
                <td>".$result['model']."</td>
                <td>".$result['capacity']."</td>

                </tr>
                ";
            }
        }
        else{
            echo "No records found!";
        }
        ?>
            </table>
     </div>
     <div class="driver_info">
     <?php
        $query = "SELECT * FROM driver_info";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        // $result = mysqli_fetch_assoc($data);
        // eta un comment korle 1 no record ta show!
        // echo $result['id']." ".$result['name']." ".$result['email'];
        // echo $total;

        if($total !=0){
            ?>
            <table border="2" cellspacing="5" cellpadding="10">
                <thead>
                    <caption>
                       <h3 class="headding">Driver Information</h3>
                    </caption>
                </thead>
                <tr>
                <th>Driver ID</th>
                <th>Driver Name</th>
                <th>Contact</th>
                <th>Licensens Number</th>
                <!-- <th>Operations</th> -->
                </tr>
                <?php
            while($result = mysqli_fetch_assoc($data))
            {
                echo "<tr>
                <td>".$result['driver_id']."</td>
                <td>".$result['driver_name']."</td>
                <td>".$result['contact']."</td>
                <td>".$result['licensen_number']."</td>

                </tr>
                ";
            }
        }
        else{
            echo "No records found!";
        }
        ?>
            </table>
     </div>
     <div class="route">
     <?php
        $query = "SELECT * FROM route_info";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        // $result = mysqli_fetch_assoc($data);
        // eta un comment korle 1 no record ta show!
        // echo $result['id']." ".$result['name']." ".$result['email'];
        // echo $total;

        if($total !=0){
            ?>
            <table border="2" cellspacing="5" cellpadding="10">
                <thead>
                    <caption>
                       <h3 class="headding">Route Information</h3>
                    </caption>
                </thead>
                <tr>
                <th>Route ID</th>
                <th>Route Name</th>
                <th>Stopes</th>
                <th>Timing</th>
                <!-- <th>Operations</th> -->
                </tr>
                <?php
            while($result = mysqli_fetch_assoc($data))
            {
                echo "<tr>
                <td>".$result['route_id']."</td>
                <td>".$result['route_name']."</td>
                <td>".$result['stopes']."</td>
                <td>".$result['timing']."</td>

                </tr>
                ";
            }
        }
        else{
            echo "No records found!";
        }
        ?>
            </table>
     </div>
     <div class="passerger_info">
     <?php
        $query = "SELECT * FROM passenger_info";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        // $result = mysqli_fetch_assoc($data);
        // eta un comment korle 1 no record ta show!
        // echo $result['id']." ".$result['name']." ".$result['email'];
        // echo $total;

        if($total !=0){
            ?>
            <table border="2" cellspacing="5" cellpadding="10">
                <thead>
                    <caption>
                       <h3 class="headding">Passenger Information</h3>
                    </caption>
                </thead>
                <tr>
                <th>Passenger ID</th>
                <th>Passenger Name</th>
                <th>Contact</th>
                <!-- <th></th> -->
                <!-- <th>Operations</th> -->
                </tr>
                <?php
            while($result = mysqli_fetch_assoc($data))
            {
                echo "<tr>
                <td>".$result['passenger_id']."</td>
                <td>".$result['passenger_name']."</td>
                <td>".$result['contact']."</td>
                </tr>
                ";
            }
        }
        else{
            echo "No records found!";
        }
        ?>
            </table>
     </div>
     <div class="booking">
     <?php
        $query = "SELECT * FROM booking_info";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        // $result = mysqli_fetch_assoc($data);
        // eta un comment korle 1 no record ta show!
        // echo $result['id']." ".$result['name']." ".$result['email'];
        // echo $total;

        if($total !=0){
            ?>
            <table border="2" cellspacing="5" cellpadding="10">
                <thead>
                    <caption>
                       <h3 class="headding">Booking Information</h3>
                    </caption>
                </thead>
                <tr>
                <th>Booking ID</th>
                <th>Passenger ID</th>
                <th>Bus ID</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Seat Number</th>
                <!-- <th>Operations</th> -->
                </tr>
                <?php
            while($result = mysqli_fetch_assoc($data))
            {
                echo "<tr>
                <td>".$result['booking_id']."</td>
                <td>".$result['passenger_id']."</td>
                <td>".$result['bus_id']."</td>
                <td>".$result['booking_date']."</td>
                <td>".$result['booking_time']."</td>
                <td>".$result['seat_num']."</td>
                </tr>
                ";
            }
        }
        else{
            echo "No records found!";
        }
        ?>
            </table>
        <div class="payme">
        <?php
        $query = "SELECT * FROM payment_info";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        // $result = mysqli_fetch_assoc($data);
        // eta un comment korle 1 no record ta show!
        // echo $result['id']." ".$result['name']." ".$result['email'];
        // echo $total;

        if($total !=0){
            ?>
            <table border="2" cellspacing="5" cellpadding="10">
                <thead>
                    <caption>
                       <h3 class="headding">Payment Information</h3>
                    </caption>
                </thead>
                <tr>
                <th>Payment ID</th>
                <th>Booking ID</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <!-- <th>Operations</th> -->
                </tr>
                <?php
            while($result = mysqli_fetch_assoc($data))
            {
                echo "<tr>
                <td>".$result['payment_id']."</td>
                <td>".$result['booking_id']."</td>
                <td>".$result['amount']."</td>
                <td>".$result['payment_date']."</td>
                </tr>
                ";
            }
        }
        else{
            echo "No records found!";
        }
        ?>
            </table>
            </div>
            <script>
                function anis(){
                    return confirm('Are you sure you want to delete this record?');
                }
            </script>
     </div>
    </div>
    <!-- <div class="container">
        <div class="content">
            <h3>Hi, <span>admin</span></h3>
            <h1>Welcome<span>
                <?php
                echo $_SESSION['admin_name']
                ?>
            </span></h1>
            <p>This is an admin page</p>
            <a href="login_form.php" class="btn">Login</a>
            <a href="register_form.php" class="btn">Register Form</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div> -->
</body>
</html>