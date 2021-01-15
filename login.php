<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Login</title>
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
                margin-bottom: 25px;
                height: 35px;
                width: calc(100% - 5px);
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
                margin-top: 10px;
            }


        </style>
    </head>
    <body>
        <?php
        include 'dbFunctions.php';
        session_start();
        // When form submitted, check and create user session.?>
        <form class="form" method="post" name="login" action="home.php">
                <h1 class="login-title">Login</h1>
                <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required=""/>
                <input type="password" class="login-input" name="password" placeholder="Password" required=""/>
                <input type="submit" value="Login" name="submit" class="login-button"/>
                <p class="link"><a href="registration.php">New Registration</a></p>
            </form>
    </body>
</html>