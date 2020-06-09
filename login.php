<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
        // instead of loginusers, add your DATABASE name
        $con = mysqli_connect("localhost:3308", "root", "", "loginusers");
        // Check connection
        if($con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        // here users is my table name
        $sql = "SELECT * FROM `users` WHERE username ='$username' and password ='$password'";
        $result = mysqli_query($con, $sql);
        // $row = mysqli_fetch_array($resutl, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        if ($count == 1){
            echo "working";
            header("location: home.html");
            }else{
                header("location: error.html");
            }
        
    ?>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <form action="login.php" method="post">
                <input type="text" value="" name="username" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="submit" value="Submit">
            </form>
        </div> 
    </div> 
</body>
</html>