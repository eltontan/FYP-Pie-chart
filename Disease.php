<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        </style>
    </head>
    <body>
         <div class="container-fluid"> 
        <form action="home.php" method="post">
        <div class="container">
                <div class="row"> 
                   <div style="font-size: 25px;"class="col pink"><a href="home.php"><i class="fa fa-home"></i>Home</div>
                  <div style="font-size: 25px;"class="col pink"><a href="crops.php"><i class="fa fa-plus"></i>Add new crops</div> 
                  <div style="font-size: 25px;"class="col pink"><a href="history.php"><i class="fa fa-history"></i>History</div> 
                  <div style="font-size: 25px;"class="col pink"><a href="Disease.php"><i class="fas fa-syringe"></i>Disease</a></div>  
                </div> 
            </div>
        </br>
        </br>
        <table class ="table">
    <thead class =" thead-light">
        <tr>
            <th>Confidence Level</th>
            <th>Time Stamp</th>
            <th>Disease Name</th>
            <th>Description</th>
            <th>Prevention</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>80%</td>
            <td>8:00 AM</td>
            <td>Powdery Mildew</td>
            <td>Powdery mildew leaves a telltale white dusty coating on leaves, stems and flowers</td>
            <td>Give plants good drainage and ample air circulation. Avoid overhead watering at night</td>
        </tr>
        <tr>
            <td>70%</td>
            <td>9:00 AM</td>
            <td>Downy Mildew</td>
            <td>The upper portion of leaves to discolor, while the bottoms develop white or gray mold.</td>
            <td>The upper portion of leaves to discolor, while the bottoms develop white or gray mold.</td>
        </tr>
        <tr>
            <td>50%</td>
            <td>10:00 AM</td>
            <td>Mosaic Virus</td>
            <td>Some plants exhibit yellowing, stunted growth</td>
            <td>Remove and destroy infected plants, roots and all, and avoid planting susceptible plants in the same area for two years.</td>
        </tr>
    </tbody>
    </table>
        
        <?php
  
        ?>
    </form>
        
    </body>
</html>
