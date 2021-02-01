<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change thisnis template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include 'dbFunctions.php';
session_start();
header('Refresh: 30');
?>

<?php
$user_id = "";
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
$labels = "'Potato', 'Spinach', 'Tomato'";
$labels1 = "'Corn', 'Potato'";
$labels2 = "'Cauliflower', 'Corn', 'Potato'";
$colors = "'#DEB887', '#006400', '#FF4500'";
$colors1 = "'#FFFF00', '#DEB887'";
$colors2 = "'#9ACD32', '#FFFF00', '#DEB887'";

//Declare total of vege array to be used to store the type of vege there are in the plot
$p1_TOVArray = array();
$p2_TOVArray = array();
$p3_TOVArray = array();

//Declare an array for the total number of a particular vege in the plot
$p1_Array = array();
$p2_Array = array();
$p3_Array = array();

//To be used for while loop
$i = 0;
$z = 0;

//Start of plot 1 pie
//Find out what vege are in each plots
$p1_query = "SELECT DISTINCT type_of_vegetable FROM vegetable WHERE user_id='" . $_SESSION['user_id'] . "' AND plot='1'";
$p1_result = mysqli_query($link, $p1_query) or die(mysqli_error($link));
while ($row = mysqli_fetch_array($p1_result)) {
    $p1_vege = $row[0];
    array_push($p1_TOVArray, $p1_vege);
    $p1_CountQuery = "SELECT COUNT(type_of_vegetable) From vegetable WHERE user_id='" . $_SESSION['user_id'] . "' AND type_of_vegetable='$p1_vege' AND plot='1'";
    $p1_Countresult = mysqli_query($link, $p1_CountQuery) or die(mysqli_error($link));
    while ($rowCount = mysqli_fetch_array($p1_Countresult)) {
        array_push($p1_Array, $rowCount[0]);
    }
}
$data = "";
$label = "";
$BGColour = "";
while ($i < sizeof($p1_Array)) {
    $data .= strval($p1_Array[$i]) . ", ";
    $i = $i + 1;
}

while ($z < sizeof($p1_TOVArray)) {
    $label .= "'" . strval($p1_TOVArray[$z]) . "'" . ", ";
    $BGColour .= "'#" . substr(str_shuffle('ABCDEF0123456789'), 0, 6) . "'" . ", ";
    $z = $z + 1;
}
//end of plot 1 pie

$p2_query = "SELECT DISTINCT type_of_vegetable FROM vegetable WHERE user_id='" . $_SESSION['user_id'] . "' AND plot='2'";
$p2_result = mysqli_query($link, $p2_query) or die(mysqli_error($link));
while ($row = mysqli_fetch_array($p2_result)) {
    $p2_vege = $row[0];
    array_push($p2_TOVArray, $p2_vege);
    $p2_CountQuery = "SELECT COUNT(type_of_vegetable) From vegetable WHERE user_id='" . $_SESSION['user_id'] . "' AND type_of_vegetable='$p2_vege' AND plot='2'";
    $p2_Countresult = mysqli_query($link, $p2_CountQuery) or die(mysqli_error($link));
    while ($rowCount = mysqli_fetch_array($p2_Countresult)) {
        array_push($p2_Array, $rowCount[0]);
    }
}
$data2 = "";
$label2 = "";
$BGColour2 = "";
$ii = 0;
$zz = 0;
while ($ii < sizeof($p2_Array)) {
    $data2 .= strval($p2_Array[$ii]) . ", ";
    $ii = $ii + 1;
}

while ($zz < sizeof($p2_TOVArray)) {
    $label2 .= "'" . strval($p2_TOVArray[$zz]) . "'" . ", ";
    $BGColour2 .= "'#" . substr(str_shuffle('ABCDEF0123456789'), 0, 6) . "'" . ", ";
    $zz = $zz + 1;
}

$p3_query = "SELECT DISTINCT type_of_vegetable FROM vegetable WHERE user_id='" . $_SESSION['user_id'] . "' AND plot='3'";
$p3_result = mysqli_query($link, $p3_query) or die(mysqli_error($link));
while ($row = mysqli_fetch_array($p3_result)) {
    $p3_vege = $row[0];
    array_push($p3_TOVArray, $p3_vege);
    $p3_CountQuery = "SELECT COUNT(type_of_vegetable) From vegetable WHERE user_id='" . $_SESSION['user_id'] . "' AND type_of_vegetable='$p3_vege' AND plot='3'";
    $p3_Countresult = mysqli_query($link, $p3_CountQuery) or die(mysqli_error($link));
    while ($rowCount = mysqli_fetch_array($p3_Countresult)) {
        array_push($p3_Array, $rowCount[0]);
    }
}
$data3 = "";
$label3 = "";
$BGColour3 = "";
$iii = 0;
$zzz = 0;
while ($iii < sizeof($p3_Array)) {
    $data3 .= strval($p3_Array[$iii]) . ", ";
    $iii = $iii + 1;
}

while ($zzz < sizeof($p3_TOVArray)) {
    $label3 .= "'" . strval($p3_TOVArray[$zzz]) . "'" . ", ";
    $BGColour3 .= "'#" . substr(str_shuffle('ABCDEF0123456789'), 0, 6) . "'" . ", ";
    $zzz = $zzz + 1;
    //testing
}


//to get a random double value b/w 13 to 24(inclusive)
//rand() converted to string so that it can be concat
$temp = strval(mt_rand(13, 24)) . "." . strval(mt_rand(0, 9));
//Convert string to float
$temp = strval(floatval($temp));
$humid = strval(mt_rand(40, 60));
$soil = strval(mt_rand(0, 100));
$disease = strval(mt_rand(0, 100));
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
                                backgroundColor: [<?php echo $BGColour ?>],
                            }],
                        labels: [<?php echo $label ?>]
                    },
                    options: {
                        responsive: true
                    }
                });


                var pieChart2 = new Chart($("#pieChart2"), {
                    type: 'pie',
                    data: {
                        datasets: [{
                                data: [<?php echo $data2 ?>],
                                backgroundColor: [<?php echo $BGColour2 ?>],
                            }],
                        labels: [<?php echo $label2 ?>]
                    },
                    options: {
                        responsive: true
                    }
                });

                var pieChart3 = new Chart($("#pieChart3"), {
                    type: 'pie',
                    data: {
                        datasets: [{
                                data: [<?php echo $data3 ?>],
                                backgroundColor: [<?php echo $BGColour3 ?>],
                            }],
                        labels: [<?php echo $label3 ?>]
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
        </script>

    </head>
    <body>
        <?php
        //Check if user exist in db by checking the user role
        if ($_SESSION['user_role'] == "admin") {
            //INSERT CODE FOR ADMIN PAGE HERE
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
                    <div style="width: 100%; margin-left: auto; margin-right: auto; text-align: center">
                        <div class="row"> 
                            <div style="font-size: 25px;"class="col pink"><a href="home.php"><i class="fa fa-home"></i>Home</div>
                            <div style="font-size: 25px;"class="col pink"><a href="crops.php"><i class="fa fa-plus"></i>Add new crops</div> 
                            <div style="font-size: 25px;"class="col pink"><a href="history.php"><i class="fa fa-history"></i>History</div> 
                            <div style="font-size: 25px;"class="col pink"><a href="Disease.php"><i class="fas fa-syringe"></i>Disease</a></div>
                        </div>
                        <div style="float: right; margin-top: 10px;"><a style="float: right;" href='logout.php' /><b>Log Out</b></a></div>
                    </div>
                    <br>
                    </br>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <img src="images/Logo.PNG" class="rounded img-fluid rack" alt="..."/>

                    </div>
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
                    <div class="container-fluid" style="margin-bottom: 800px;">
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
                                                            <li class="list-group-item trans_float"><i class=" fas fa-temperature-high"></i> <?php echo $temp; ?>C(temperature)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-water"></i> <?php echo $humid; ?>%(Humidity)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-syringe"></i> <?php echo $soil; ?>(soil status)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-syringe"></i> <?php echo $disease; ?>%(disease)</li>
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
                    </form>
            </div>
            <?php
        } ?>
        <div>
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
                </div>
      <?php  //Code for user 
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
                <div style="width: 100%; margin-left: auto; margin-right: auto; text-align: center">
                    <div class="row"> 
                        <div style="font-size: 25px;"class="col pink"><a href="home.php"><i class="fa fa-home"></i>Home</div>
                        <div style="font-size: 25px;"class="col pink"><a href="crops.php"><i class="fa fa-plus"></i>Add new crops</div> 
                        <div style="font-size: 25px;"class="col pink"><a href="history.php"><i class="fa fa-history"></i>History</div> 
                        <div style="font-size: 25px;"class="col pink"><a href="Disease.php"><i class="fas fa-syringe"></i>Disease</a></div>
                    </div>
                    <div style="float: right; margin-top: 10px;"><a style="float: right;" href='logout.php' /><b>Log Out</b></a></div>
                </div>
                <br>
                </br>
                <div style="text-align: center; margin-bottom: 10px;">
                    <img src="images/Logo.png" class="rounded img-fluid rack" alt="..."/>

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
                       <div class="container-fluid" style="margin-bottom: 800px;">
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
                                                            <li class="list-group-item trans_float"><i class=" fas fa-temperature-high"></i> <?php echo $temp; ?>C(temperature)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-water"></i> <?php echo $humid; ?>%(Humidity)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-syringe"></i> <?php echo $soil; ?>(soil status)</li>
                                                            <li class="list-group-item trans_float"><i class=" fas fa-syringe"></i> <?php echo $disease; ?>%(disease)</li>
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