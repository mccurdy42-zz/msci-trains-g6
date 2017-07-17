<body>
<h1> Delayed trains, certification level, and available employees</h1>
<p> This table allows operating companies to identify trains that either depart late or arrive late.</p>
<p>Only certain conductors have the qualifications to drive so all trains return the potential qualified conductor </p>
<link rel="stylesheet" href="main_page2.css">

<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();
?>

<?php
$cid = $_GET['cid'];

echo '<link rel="stylesheet" href="table_css.css">
<div class="datagrid"><table>
<thead><tr><th>Train ID </th><th>Certification ID(Lowest)</th><th>Employee ID</th></tr></thead>
<tfoot><tr><td colspan="3"><div id="paging"><ul><li><a href="#"><span>Previous</span></a></li><li><a href="#" class="active"><span>1</span></a></li><li><a href="#"><span>2</span></a></li><li><a href="#"><span>3</span></a></li><li><a href="#"><span>4</span></a></li><li><a href="#"><span>5</span></a></li><li><a href="#"><span>Next</span></a></li></ul></div></tr></tfoot>
<tbody>';
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
  echo "<tr>";
  echo "<td>" . $row["t_id"] . "</td>";
  echo "<td>" . $row["cert_id"] . "</td>";
  echo "<td>" . $row["e_id"] . "</td>";
  echo "</tr>";
    //echo "TRAIN ID: " . $row["t_id"]. " CERT ID: " . $row["cert_id"]. " EMPLOYEE ID: " . $row["e_id"]. "<br>";
  }
}
echo "</body> </table></div>";
 ?>
 </body>
