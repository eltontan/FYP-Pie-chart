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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script
                      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      
       <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:"dd/mm/yy"});
  } );
  </script>
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
       
        <div class="container">
                <div class="row"> 
                       <div style="font-size: 25px;"class="col pink"><a href="home.php"><i class="fa fa-home"></i>Home</div>
                    <div style="font-size: 25px;"class="col pink"><a href="crops.php"><i class="fa fa-plus"></i></button>Add new crops</div> 
                    <div style="font-size: 25px;"class="col pink"><a href="history.php"><i class="fa fa-history"></i></button>History</div> 
                    <div style="font-size: 25px;"class="col pink"><a href="Disease.php"><i class="fas fa-syringe"></i></button>Disease</a></div> 
                </div> 
            </div>
        </br>
        </br>
        
   
       

       
    
</form>
        <form method="post" action="doHistory.php">
       

            <label for="idPlot">Plot</label>
            <select id="idPlot" name="plot">
                <option value="" selected>Please select...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select><br/>
            <label for="idVeg">Type of vegetable</label>
            <select id="idVeg" name="type">
                <option value="" selected>Please select...</option>
                <option value="potato">potato</option>
                <option value="corn">corn</option>
                <option value="tomato">tomato</option>
                <option value="spinach">spinach</option>
            </select><br/>
            <p>Date: <input type="text" id="datepicker" name="date"></p>
     
        

          

            <input type="submit" value="SEND" id="btnSubmit">&nbsp;
            <input type="reset" value="CLEAR" id="btnReset">

        </form>
        <?php
       
        ?>
        
        </form>
        </div>
    </body>
    
</html>