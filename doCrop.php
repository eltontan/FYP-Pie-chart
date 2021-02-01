<?php
session_start();
include 'dbFunctions.php';
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
$count = 0;
//check how many Vegetable is in the plot
$query = "SELECT COUNT(type_of_vegetable) FROM vegetable WHERE plot='$plot_id' AND user_id='" .$_SESSION['user_id']."'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
while ($row = mysqli_fetch_array($result)) {
    $count = $row[0];
}

if ($count < 5) {
    //Link vegetables to its images
    if ($vegetable_name == "Potato") {
        $rint = rand(1,2);
        $image = strtolower($vegetable_name) . $rint .".jpg";
    } else {
    $image = strtolower($vegetable_name).".jpg";
    }
    //Insert new vegetable and plot number 
    $queryInsert = "INSERT INTO vegetable (type_of_vegetable, plot, image, user_id) VALUES ('$vegetable_name', '$plot_id', '$image', '".$_SESSION['user_id']."')";
    $resultInsert = mysqli_query($link, $queryInsert);
    ?>

    <html>
        <head>
            <title></title>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>
      
        </head>
        <body>

            <div style='color: green; font-size: 20px; margin-left: 475px;'><?php echo 'Vegetable ' . $vegetable_name . ' in plot ' . $plot_id . ' is added successfully' ?></div>
        <li><a href='home.php'>Back to Home</a></li>
        <br>
        <li><a href='crops.php'>Add New Crops</a></li>

    <?php
    } else {
        ?>       
        <form method="POST" action="home.php">
        <div style='color: red; font-size: 25px; margin-left: 475px;'>Plot is already filled with 5 Vegetables</div>
        <li><a href='home.php'>Back to Home</a></li>
        <br>
        <li><a href='crops.php'>Add New Crops</a></li>
        </br>
            <input type="hidden" value="<?php echo $vegetable_name ?>" name='vegetable' id='vegetable'></input>
            <input type="hidden" value="<?php echo $plot_id ?>" name='plot_number'></input>
            <input type="submit" value="View Vegetable in Plot" style=' border: 2px solid #4CAF50; width: 150px;  border-radius: 12px; background-color: lightgreen; margin-left: 575px; height: 50px; margin-top: 200px;'/>
            </li>
    </form>
<?php } ?>
</body>
</html>