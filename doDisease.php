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
        <?php
        
       $searchName = $_POST["memberName"];
      
        
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "fyp";
        
        $link = mysqli_connect($host, $user, $pass, $db);
        
        $query = "SELECT date,time,plot_number,type_vegetable,disease_confidence,disease_description,disease_prevention FROM historyy WHERE plot_number = '$searchName' && disease_prevention !='NIL' && disease_confidence!='0%'";
        
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        
        mysqli_close($link);
        
        $ids = "date";
        $usernames = "time";
        $emails = "plot";
        $ages = "vegetable type";
        $usernams = "disease confidence";
       $description = "disease description";
       $prevention = "disease prevention";
        
        echo "<table border = '3px'>";
        
        echo"<td> {$ids}   </td>";
             echo"<td>  {$usernames}    </td>";
              echo"<td>   {$emails}   </td>";
               echo"<td>  {$ages}   </td>";
                   echo"<td>  {$usernams}    </td>";
                   echo"<td>  {$description}    </td>";
                   echo"<td>  {$prevention}    </td>";
            
               
        while ($row = mysqli_fetch_array($result))
            {
            $id = $row[0];
            $username = $row[1];
            $email = $row[2];
            $age= $row[3];
             $one = $row[4];
            $description = $row[5];
            $prevention = $row[6];
            
            echo "<tr>";
            echo"<td> {$id}   </td>";
             echo"<td>  {$username}    </td>";
              echo"<td>   {$email}   </td>";
               echo"<td>  {$age}   </td>";
                echo"<td>  {$one}    </td>";
            echo"<td>  {$description}   </td>";
                echo"<td>  {$prevention}    </td>";
               
               
            echo "</tr>";
            
            
            
        }
        echo"</table>";
        
        $message = "";
        
        if(!empty($row)){
            $type_vegetable = $row["type_vegetable"];
            $plot_number = $row["plot_number"];
            $temperature = $row["temperature"];
            $soilstatus = $row["soilstatus"];
            
            $message .= "vegetable: $type_vegetable<br/>plot number: $plot_number<br/>temperature: $temperature<br/>soil status: $soilstatus";
        }else{
            $message .= "no matching record found";
        
        }
        
        ?>
        
       
    </body>
</html>
