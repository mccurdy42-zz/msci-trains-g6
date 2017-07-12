<h1>Update Employee's Certification</h1>

<form action="modify.php" method="get"/>

<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();

$sql = "SELECT c.e_id, c.cert_id "
. "FROM conductor c "
. "WHERE c.e_id = ?";

$stmt = $mysqli->prepare($sql);
$eid = $_GET['e_id'];

$stmt->bind_param('s',$eid);
$stmt->execute();

$stmt->bind_result($eid,$cert_id);

if($stmt->fetch()){
echo '<input type="hidden" name="eid" value="' . $eid . '"/>';
echo '<label for="cert_id">Update Certification for Employee #' . $eid . ', currently '.$cert_id.' to: </label>';
echo '<input type="text" name="cert_id" value="'.$cert_id.'"/><br>';
}
else{
echo '<label for="cert_id">Record not found</label>';
}
$mysqli->close();
?>
<br>
<input type="submit" value="Update"/>
</br>
</form>
