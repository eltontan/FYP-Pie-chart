<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include 'dbFunctions.php';
session_start();
?>

<?php
$labels = "'Potato', 'Spinach', 'Tomato'";
$labels1 = "'Corn', 'Potato'";
$labels2 = "'Cauliflower', 'Corn', 'Potato'";
$colors = "'#DEB887', '#006400', '#FF4500'";
$colors1 = "'#FFFF00', '#DEB887'";
$colors2 = "'#9ACD32', '#FFFF00', '#DEB887'";

$data = "'72', '144', '144'";
?>  


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/Chart.bundle.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {


                var pieChart = new Chart($("#pieChart"), {
                    type: 'pie',
                    data: {
                        datasets: [{
                                data: [<?php echo $data ?>],
                                backgroundColor: ['#DEB887', '#006400', '#FF4500'],
                            }],
                        labels: ['Potato', 'Spinach', 'Tomato']
                    },
                    options: {
                        responsive: true
                    }
                });


                var pieChart2 = new Chart($("#pieChart2"), {
                    type: 'pie',
                    data: {
                        datasets: [{
                                data: [0.33, 0.66],
                                backgroundColor: ['#FFFF00', '#DEB887'],
                            }],
                        labels: ['Corn', 'Potato']
                    },
                    options: {
                        responsive: true
                    }
                });

                var pieChart3 = new Chart($("#pieChart3"), {
                    type: 'pie',
                    data: {
                        datasets: [{
                                data: [0.25, 0.25, 0.5],
                                backgroundColor: ['#9ACD32', '#FFFF00', '#DEB887'],
                            }],
                        labels: ['Cauliflower', 'Corn', 'Potato']
                    },
                    options: {
                        responsive: true
                    }
                });



            });
        </script>

        <style>
            .link {
                color: #666;
                font-size: 15px;
                text-align: center;
                margin-top: 10px;
            }
            body {
                background-image: linear-gradient(180deg, #7CFC00 7%, #fff 7%);
                background-repeat: no-repeat;
                height: 100vh;
            }
            .double-border {
                background-color: #ccc;
                border: 4px solid #fff;
                padding: 2em;
                width: 16em;
                height: 16em;
                position: relative;
                margin: 0 auto;
            }
            .double-border:before {
                background: none;
                border: 4px solid #fff;
                content: "";
                display: block;
                position: absolute;
                top: 4px;
                left: 4px;
                right: 4px;
                bottom: 4px;
                pointer-events: none;
            }
            p.temp {

                border-style: solid;
                border-width: large;
                padding: 50px;
                margin-left:10px;
                background-color: white;
                text-align: center;

            }
            p.humid {

                border-style: solid;
                border-width: large;
                padding: 50px;
                margin-left:10px;
                background-color: white;
                text-align: center;

            }
            p.soil_status {

                border-style: solid;
                border-width: large;
                padding: 50px;
                margin-left:10px;
                background-color: white;
                text-align: center;

            }
            p.plant_disease {

                border-style: solid;
                border-width: large;
                padding: 50px;
                margin-left:10px;
                background-color: white;
                text-align: center;

            }

            .bottom-left {
                position: absolute;
                bottom: 8px;
                left: 16px;
            }

            .aa5 {
                position: absolute;
                top: 8px;
                left: 16px;

            }

            .top-right {
                position: absolute;
                top: 8px;
                right: 16px;
            }

            .bottom-right {
                position: absolute;
                bottom: 8px;
                right: 16px;
            }

            .centered {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .card {
                position: absolute;   
                top: 10;
                left: 10;

                background-color: rgba(245, 245, 245, 0.4) !important;
            }
            .trans_float{
                background-color: rgba(245, 245, 245, 0.4) !important;
            }
            .imgwrapper {
                position: relative;
                width: 500px;
                height : 500px;
            }
            .buttonSave {
                background-color: lightgreen; 
                color: black; 
                border: 2px solid #4CAF50;
                width: 50px;
                border-radius: 12px;
            }
            .login {
                margin-left: 50px;
            }
        </style>
        <script>
            $(document).ready(function () {
                $(".buttonSave").click(function () {

                    $.ajax({
                        type: "GET",
                        url: "http://localhost/C273_L08Ajax/getStudentsByModule.php",
                        data: "module_code=" + moduleCode,
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            var message = "<tr><th>Student ID</th><th>Class</th><th>First Name</th><th>Last Name</th></tr>";
                            for (i = 0; i < response.length; i++) {
                                message += "<tr><td>" + response[i].student_id + "</td>"
                                        + "<td>" + response[i].class + "</td>"
                                        + "<td>" + response[i].first_name + "</td>"
                                        + "<td>" + response[i].last_name + "</td></tr>";
                            }
                            $("#studentTable").html(message);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                });
            });



        </script>

    </head>
    <body>
        <?php
        if (isset($_POST['username'])) {
            if (isset($_POST['password'])) {
                // Check user is exist in the database
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                $row = mysqli_fetch_array($result);
                if ($row != null) {
                    //Store the user id and role into session
                    $_SESSION['user_id'] = $row[0];
                    $_SESSION['user_role'] = $row[4];
                }
            }
        }
        //Check if user exist in db by checking the user role
        if ($_SESSION['user_role'] == "admin") {
            //INSERT CODE FOR ADMIN PAGE HERE
        } else if ($_SESSION['user_role'] == "user") {
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            }
            ?>
            <?php
            //Create new variable for if else
            $vegetable_name = "";
            $plot_id = "";
            //To see if they is any user input
            if (isset($_POST['vegetable'])) {
                $vegetable_name = $_POST['vegetable'];
            }
            if (isset($_POST['plot_number'])) {
                $plot_id = $_POST['plot_number'];
            }
            ?>                

            <div class="container-fluid"> 
                <form action="home.php" method="post">
                    <input type='hidden' value='<?php echo $username ?>' name='username'/>
                    <input type='hidden' value='<?php echo $password ?>' name='password'/>
                    <div class="container">
                        <div class="row"> 
                            <div style="font-size: 25px;"class="col pink"><a href="home.php"><i class="fa fa-home"></i>Home</div>
                            <div style="font-size: 25px;"class="col pink"><a href="crops.php"><i class="fa fa-plus"></i>Add new crops</div> 
                            <div style="font-size: 25px;"class="col pink"><a href="history.php"><i class="fa fa-history"></i>History</div> 
                            <div style="font-size: 25px;"class="col pink"><a href="Disease.php"><i class="fas fa-syringe"></i>Disease</a></div> 
                        </div> 
                    </div>
                    <br>
                    <div style="float: right;">
                        <a href='logout.php' />Log Out</a>
                    </div>
                    </br>
                    </br>
                    </br>
                    <div class="form-group">
                        Types Of Vegetables :
                        <select name="vegetable" class="form-control" id="vegetables">
                            <?php
                            //Populate the drop down list
                            $query = "SELECT * FROM type_of_vegetable";
                            $result = mysqli_query($link, $query) or die(mysqli_error($link));
                            ?>
                            <?php
                            //Link it to the database variable or placement
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        Plot :
                        <select name="plot_number" class="form-control" id="vegetables">
                            <?php
                            //Populate the drop down list
                            $query = "SELECT * FROM plot";
                            $result = mysqli_query($link, $query) or die(mysqli_error($link));
                            ?>
                            <?php
                            //Link it to the database variable or placement
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>";
                            }
                            ?>

                        </select>

                    </div>

                    <input type="submit" value="View" class="btn btn-primary"></input>
                    </br>
                    </br>





                    <?php
                    //Getting all from database
                    if ($vegetable_name != "" && $plot_id != "") {
                        $queryVegetable = "SELECT * FROM vegetable WHERE type_of_vegetable='$vegetable_name' AND plot='$plot_id' AND user_id='" . $_SESSION['user_id'] . "'";
                        $resultVegetable = mysqli_query($link, $queryVegetable) or die(mysqli_error($link));
                        ?> 
                        <?php
                        //line 209 - 211 is to display images, fetching data and putting into an array
                        $row = mysqli_fetch_array($resultVegetable);
                        if ($row != null) {
                            ?>
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="jumbotron-fluid">
                                            <div class="card aa5" >                                              
                                                <div class="card-header trans_float"> 

                                                    <div class="lead" id="loc_aa1"><div class="imgwrapper"><img src="images/<?php
                                                            echo $row[3];
                                                            ?>" class="rounded img-fluid rack" alt="..." />
                                                        </div>
                                                        <ul class="list-group list-group-flush trans_float">
                                                            <li class="list-group-item trans_float"><i class=" fas fa-temperature-high"></i> 32.2C(temperature)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-water"></i> 55%(Humidity)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-syringe"></i> 1000(soil status)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-syringe"></i> 5%(disease)</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <br>
                            <?php
                            echo 'Vegetable ' . $vegetable_name . ' does not exist in plot ' . $plot_id;
                            echo '<br>Your occupied plots are:';
                            $queryuserplot = "SELECT * FROM vegetable WHERE user_id='$user_id'";
                            $resultuserplot = mysqli_query($link, $queryuserplot) or die(mysqli_error($link));
                            while ($row = mysqli_fetch_array($resultuserplot)) {
                                echo '<br>plot ' . $row[2] . " containing Vegetable " . $row[1];
                            }
                        }
                        ?>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/><br/>
                        <br/>
                        <br/>
                        <br/><br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/><br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/><br/>
                        <br/>
                        <br/>
                        <br/><br/>
                        <br/>
                        <br/>

                        <p><b>Plot 1</b></p>
                        <div id="canvas-holder" style="width:40%">
                            <canvas id="pieChart" />
                        </div>

                        <p><b>Plot 2</b></p>
                        <div id="canvas-holder" style="width:40%">
                            <canvas id="pieChart2" />
                        </div>

                        <p><b>Plot 3</b></p>
                        <div id="canvas-holder" style="width:40%">
                            <canvas id="pieChart3" />
                        </div>
                        <br/>
                        <br/>
                        <table class ="table">
                            <thead class =" thead-light">
                                <tr>
                                    <th>Disease</th>
                                    <th>Description</th>
                                    <th>Prevention</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <td>​Mosaic Virus</td>
                                    <td>​The middle row contains some black spots and foul odour</td>
                                    <td>​Ensure the plants have sufficient sunlight</td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </form>
                </div>
                <?php
            }
            ?>
            <?php
        } else {
            //if the role is not admin or user
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
        ?>



    </body>
</html>