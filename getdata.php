<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fyp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Get all data from historyy table
$sql = "SELECT * FROM historyy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row['type_vegetable']." | ".$row["time"]." | ".$row["temperature_number"]." | ";
  }
                                    
} else {
  echo "0 results";
}
$conn->close();
?>