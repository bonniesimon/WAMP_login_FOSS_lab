<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
        $status = false;
        // instead of loginusers, add your DATABASE name
        $con = mysqli_connect("localhost:3308", "root", "", "loginusers");
        // Check connection
        if($con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        
        $username = mysqli_real_escape_string($con, (isset($_POST['username']) ? $_POST['username'] : ''));
        $password = mysqli_real_escape_string($con, (isset($_POST['password']) ? $_POST['password'] : ''));

        if($username != '' && $password != ''){

            // here users is my table name
            $sql = "SELECT * FROM `users` WHERE username ='$username' and password ='$password'";
            $result = mysqli_query($con, $sql);
            // $row = mysqli_fetch_array($resutl, MYSQLI_ASSOC);
    
            $count = mysqli_num_rows($result);
            if($count == 1) $status = true;
            if ($count == 1){
                echo "working";
                header("location: home.html");
                }
            else if(!$status){
                // echo('<p class="bd-notification is-primary">wrong password or username<p/>');
                echo('<div class="notification is-danger">
                <button class="delete"></button>
                Login Failed
              </div>');
                }
        }
        
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/bulma@0.8.0/css/bulma.min.css,npm/bulma@0.8.0/css/bulma.min.css">
</head>
<body>
    <div class="columns is-desktop is-centered is-vcentered">
        <div class="column is-one-quarter">
            <!-- <form action="login.php" method="post">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="submit" value="Submit">
            </form> -->
            <form action="login.php" method="post">
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="text" placeholder="username" name="username">
                    <!-- <input type="text" value="" name="username" placeholder="Username"> -->
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Password" name="password">
                    <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <input type="submit" value="Login" class="button is-success">
                </p>
            </div>
        </form>
        </div> 
        </div> 
</body>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
</script>
</html>