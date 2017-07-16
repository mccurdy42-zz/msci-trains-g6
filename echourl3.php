<body>
<h1> Available trains, certification, and employee</h1>

<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();
?>

<?php
$cid = $_GET['cid'];


$sql = "SELECT t.t_id, t.cert_id, e.e_id FROM travels_on as trav, trains AS t, operating_comp AS c, employee AS e, conductor as conduct
 WHERE (trav.proj_start < trav.act_start OR trav.proj_end < trav.act_start) AND
      trav.t_id = t.t_id AND
      t.c_id = c.c_id AND
      c.c_id = e.c_id AND
      e.e_id = conduct.e_id AND
      t.cert_id <= conduct.cert_id AND
      c.c_id = '$cid' ";



$result = $mysqli->query($sql);



if($result->num_rows>0){
 while($row = $result->fetch_assoc()){
    echo "TRAIN ID: " . $row["t_id"]. " CERT ID: " . $row["cert_id"]. " EMPLOYEE ID: " . $row["e_id"]. "<br>";
  }
}

 ?>
 </body>
 
