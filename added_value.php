<!--webpage after the table is updated-->

<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();
?>

<h1>ENTRY HAS BEEN ADDED!</h1>
  <br> Please see updated table below:<br>
<?php

$sql = "SELECT * "
	. "FROM model";

$result = $mysqli->query($sql);

if($result->num_rows>0){
  //output each row of data
  while($row = $result->fetch_assoc()){
    echo "Model ID: ". $row["model_id"]. " Sleeper: ".$row["sleeper"]. " Max Speed: " .$row["max_speed"]. " Cost: " . $row["cost"]. " Weight: " . $row["weight"]. " Max Distance: " . $row["max_distance"]. " Mfg ID: " .$row["mfg_id"]. "<br>";
  }
}else{
  echo "O Results";
}

$mysqli->close();

 ?>
