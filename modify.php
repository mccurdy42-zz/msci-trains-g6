<body>

<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();

$sql = "UPDATE conductor c "
. "SET c.cert_id = ? "
. "WHERE c.e_id = ?";

$stmt = $mysqli->prepare($sql);

$eid = $_GET['eid'];
$cert_id = $_GET['cert_id'];

$stmt->bind_param('ss', $cert_id, $eid);

if($stmt->execute()){
  echo '<h1>Employee Certification Successfully Updated!</h1>';
  echo '<p>Employee Number #' . $eid . ' certification updated to ' . $cert_id . '.</p>';
}else{
  echo 'Execute failed: (' . $stmt->errno . ') ' . $stmt->error;
}

$stmt->close();
$mysqli->close();

   ?>

   <p>
   <a href="eid_index.php">Return to Main Menu </a>
   </p>
   </body>
