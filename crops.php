<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include 'dbFunctions.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>

        <style>

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
        </style>
    </head>
    <body>
        <?php //form is to send user input?>
        <div class="container-fluid" style="overflow-y:scroll;">
        <form action="doCrop.php" method="post">
                <div style="width: 100%; margin-left: auto; margin-right: auto; text-align: center">
                        <div class="row"> 
                            <div style="font-size: 25px;"class="col pink"><a href="home.php"><i class="fa fa-home"></i>Home</div>
                            <div style="font-size: 25px;"class="col pink"><a href="crops.php"><i class="fa fa-plus"></i>Add new crops</div> 
                            <div style="font-size: 25px;"class="col pink"><a href="history.php"><i class="fa fa-history"></i>History</div> 
                            <div style="font-size: 25px;"class="col pink"><a href="Disease.php"><i class="fas fa-syringe"></i>Disease</a></div>
                        </div>
                        <div style="float: right; margin-top: 10px;"><a style="float: right;" href='logout.php' /><b>Log Out</b></a></div>
                    </div>
            </br>
            <div class="form-group">
                Enter Vegetable type :
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
                Enter Plot :
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
            
            <input type="submit" value="Add new vegetables" class="btn btn-primary"></input>

                        </form>
         </div>
                        </body>
                        </html>