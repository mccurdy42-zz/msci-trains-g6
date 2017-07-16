<!--This was previously allisons labeled as eid_index.php-->

<body>
<h1>Select Operating Company </h1>

<form action="echourl.php" method="get">
<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();
?>

<?php
$sql = "SELECT c.c_id, c.c_name "
	. "FROM operating_comp c";

  /*$stmt = $mysqli->query($sql);*/
  $stmt = $mysqli->prepare($sql);

  // Prepared statement, stage 2: execute
  $stmt->execute();

  // Bind result variables
  $stmt->bind_result($cid,$cname);
//fetch values
echo '<label for="cid">Choose Operating Company to view delayed trains: </label>';
echo '<select name="cid">';

while ($stmt->fetch())
{
	printf('<option value ="%s">%s</option>',$cid,$cname);
}
echo '</select><br>';
/*while($row = $stmt->fetch_assoc()){
 echo "<option value ='" . $row["c_name"] . "'>" . $row["c_name"] . "</option>";
}
echo "</select><br>";*/

$stmt->close();
$mysqli->close();
 ?>

 <br>
 <input type="submit" value="Continue"/>
 </br>
 </form>
 </body>
