
<body>
<h1>Select Employee</h1>

<form action="enter.php" method="get">
<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();
?>

<?php
$sql = "SELECT e_id "
	. "FROM conductor";

$result = $mysqli->query($sql);

//fetch values
echo "<label for='e_id'>Choose Employee to Update: </label>";
echo "<select name='e_id'>";
while($row = $result->fetch_assoc()){
 echo "<option value ='" . $row["e_id"] . "'>" . $row["e_id"] . "</option>";
}
echo "</select>";

$mysqli->close();

 ?>

 <br>
 <input type="submit" value="Continue"/>
 </br>
 </form>
 </body>
