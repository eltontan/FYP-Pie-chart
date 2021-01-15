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
        
         <?php //form is to send user input?>
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
        
   
         <div class="form-group">
  <label for="sel1">Types Of Vegetables :</label>
  <select class="form-group" id="vegetables">
    <option>Potato</option>
    <option>Tomato</option>
    <option>Corn</option>
    
  </select>
</div>
         <div class="form-group">
  <label for="sel1">Plot :</label>
  <select class="form-group" id="vegetables">
    <option>Plot 1</option>
    <option>Plot 2 </option>
    <option>Plot 3</option>
    
  </select>
  
</div>
         <input type="submit" class="btn btn-primary"></input>
         </br>
         </br>
<table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Time</th>
                    <th>Vegetable</th>
                    <th>Plot Number</th>
                    <th>Indicator</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12pm</td>
                    <td>Potato</td>
                    <td>1</td>
                    <td>Warning</td>
                </tr>
                <tr>
                    <td>1pm</td>
                    <td>Potato</td>
                    <td>2</td>
                    <td>Healthy</td>
                </tr>
                <tr>
                    <td>2pm</td>
                    <td>Tomato</td>
                    <td>1</td>
                    <td>Warning</td>
                </tr>
                <tr>
                    <td>3pm</td>
                    <td>Corn</td>
                    <td>2</td>
                    <td>Critical</td>
                </tr>
                <tr>
                    <td>4pm</td>
                    <td>Corn</td>
                    <td>1</td>
                    <td>Healthy</td>
                </tr>
            </tbody>
        </table>
        <?php
        // put your code here
        ?>
        </form>
        </div>
    </body>
    
</html>
