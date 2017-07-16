<body>
<h1> Available trains, certification, and employee</h1>
<?php
$cid = $_GET['cid'];
echo $cid;

//$name = mysql_real_escape_string($name);

echo $cid;

echo "before everything else in php";

error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function

include('./connection.php');
$mysqli = get_mysqli_conn();

echo "before sql";

$sql = "SELECT c_name FROM operating_comp WHERE c_id =?";

$cid = $cid;
$stmt = $mysqli->prepare($sql);
//mysqli_stmt_bind_param($stmt, 'i', $cid);



//printf("%d Statement queried.\n", mysqli_stmt_affected_rows($stmt));


$stmt = bind_param('i',$cid);

$stmt->execute();

$stmt->bind_result($c_name);

echo "After execute";

//$stmt->bind_result($cname);

//$result -> bind_param('s',$name);
$result = $mysqli->query($stmt);
echo "before printing statement";
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo "c_name" . $row["c_name"]. "<br>";
  }
} else {
  echo "0 results";
}
 ?>
</body>
