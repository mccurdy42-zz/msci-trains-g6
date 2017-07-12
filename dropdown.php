<!--This was previously allisons labeled as eid_index.php-->

<body>
<h1>Select Operating Company </h1>

<form action="a_enter.php" method="get">
<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();
?>

<?php
$sql = "SELECT c_name "
	. "FROM operating_comp";
$result = $mysqli->query($sql);
//fetch values
echo "<label for='c_name'>Choose Operating Company to view delayed trains: </label>";
echo "<select c_name='c_name'>";
while($row = $result->fetch_assoc()){
 echo "<option value ='" . $row["c_name"] . "'>" . $row["c_name"] . "</option>";
}
echo "</select>";
$mysqli->close();
 ?>

 <br>
 <input type="submit" value="Continue"/>
 </br>
 </form>
 </body>
