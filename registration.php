<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Registration</title>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>
        <style>
            body {
                background: #3e4144;
            }
            .form {
                margin: 50px auto;
                width: 300px;
                padding: 30px 25px;
                background: white;
            }
            h1.login-title {
                color: #666;
                margin: 0px auto 25px;
                font-size: 25px;
                font-weight: 300;
                text-align: center;
            }
            .login-input {
                font-size: 15px;
                border: 1px solid #ccc;
                padding: 10px;
                margin-bottom: 15px;
                height: 35px;
                text-align: start;
            }

            .login-button {
                color: #fff;
                background: #55a1ff;
                border: 0;
                outline: 0;
                width: 100%;
                height: 50px;
                font-size: 16px;
                text-align: center;
                cursor: pointer;
            }
            .link {
                color: #666;
                font-size: 15px;
                text-align: center;
                margin-bottom: 0px;
            }
            .link a {
                color: #666;
            }
            h3 {
                font-weight: normal;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
        include 'dbFunctions.php';
//To see if they is any user input
        if (isset($_POST['registered_id'])) {
            $registered_id = $_POST['registered_id'];
        } else {
            $registered_id = "0";
        }
        if ($registered_id == "1") {
            if (isset($_POST['username'])) {
                if (isset($_POST['password'])) {

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    //check if user is in the plot
                    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                    $row = mysqli_fetch_array($result);
                    if ($row == null) {
                        //Insert username and password
                        $queryInsert = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
                        $resultInsert = mysqli_query($link, $queryInsert);
                        $registered_id = 1;
                        echo "<div class='form'>
                <h3>You are registered successfully.</h3><br/>
                <p class='link'>Click <a href='login.php'>here</a> to login</p>
            </div>";
                    } else {
                        echo 'Username is taken.';
                    }
                }
            }
        } else { ?>
          <div style="align-content: center; text-align: center;">
            <form class="form" action="registration.php" method="post">
                <div style="align-: center;">
                    <h1 class="login-title">Registration</h1>
                    <input type="text" class="login-input" name="username" placeholder="Username" required />
                    <input type="text" class="login-input" name="email" placeholder="Email Adress(optional)">
                    <input type="password" class="login-input" name="password" placeholder="Password" required>
                    <input type="submit" name="submit" value="Register" class="login-button">
                    <input type='hidden' value='1' name='registered_id' />
                    <p style="margin-top: 5px;">Already a user? <a href="login.php">Log In</a></p>
                </div>
            </form>
        </div>
        <?php    
        }
        ?>
      
    </body>
</html>