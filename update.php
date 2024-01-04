<?php
@include 'config.php';

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    // $cpass = md5($_POST['confirm_password']);
    // $user_type = $_POST['user_type'];
    $id= $_GET['id'];
    $query = "UPDATE user_form set name='$name', email='$email' WHERE id='$id'";

    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script>alert('Record Updated')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/Bus_Management_System/admin_page.php" />

        <?php
    }else{
        echo "failed update";
    }

    /*$select = "SELECT * FROM user_form WHERE email = '$email' && password='$pass' ";*/

    /*$result = mysqli_query($conn, $select);*/

    /*if(mysqli_num_rows($result)>0){
        $error[]= 'user alrady exist!';
    }else{
        if($pass != $cpass){
            $error[]='Password not matched!';
        }else{
            /*$insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn,$insert);
            header('location:login_form.php');*/
        }
$id= $_GET['id'];
$query = "SELECT * FROM user_form WHERE id= '$id'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form_container">
        <form action="#" method="post">
            <h3>Update</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" value="<?php echo $result['name']; ?>" required placeholder="enter your name please">
            <input type="email" name="email" value="<?php echo $result['email'] ?>" required placeholder="enter your email please">
            <input type="password" name="password" value="<?php echo $result['password'] ?>" required placeholder="enter a password">
            <input type="password" name="confirm_password" required placeholder="confirm password">
            <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="update" value="update" class="form_btn">
            <!-- <button type="submit" name="submit" value="register now" class="form_btn">
                Register Now
            </button> -->
            <!-- <p>already have an account?<a href="login_form.php">Login Now</a> </p> -->
        </form>
    </div>
</body>
</html>