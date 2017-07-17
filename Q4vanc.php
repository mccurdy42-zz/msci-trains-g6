<body>
<h1> Start time, end time, Route name, and cities</h1>
<p> This table allows users to view a route between 2 cities that suits their travel requirements.</p>
<p> This can be used by all users to view specific routes includeing passengers, operators, employees, and owners of freight travelling </p>
<link rel="stylesheet" href="main_page2.css">

<?php
//Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
//mysqli connection via user-defined function
include ('./connection.php');
$mysqli = get_mysqli_conn();
?>

<?php
echo '<link rel="stylesheet" href="table_css.css">
<div class="datagrid"><table>
<thead><tr><th>Estimated Start Time</th><th>Estimated Finish Time</th><th>Route Name</th><th>Start City</th><th>End City</th></tr></thead>
<tfoot><tr><td colspan="5"><div id="paging"><ul><li><a href="#"><span>Previous</span></a></li><li><a href="#" class="active"><span>1</span></a></li><li><a href="#"><span>2</span></a></li><li><a href="#"><span>3</span></a></li><li><a href="#"><span>4</span></a></li><li><a href="#"><span>5</span></a></li><li><a href="#"><span>Next</span></a></li></ul></div></tr></tfoot>
<tbody>';
$sql = "SELECT trav.proj_start, trav.proj_end, r.name, r.start_city, r.end_city,
      FROM travels_on AS trav JOIN routes AS r ON trav.r_id = r.r_id
                       JOIN trains AS t ON trav.t_id = t.t_id
                       JOIN model AS m on m.model_id = t.model_id
                       JOIN manufacturer AS mfg on m.mfg_id = mfg.mfg_id
      WHERE trav.proj_end < '23:00' AND
            mfg.name = "Canadian Vickers" AND
            r.start_city  = "Vancouver" AND
            r.end_city = "Jasper"";
$result = $mysqli->query($sql);
if($result->num_rows>0){
 while($row = $result->fetch_assoc()){
  echo "<tr>";
  echo "<td>" . $row["proj_start"] . "</td>";
  echo "<td>" . $row["proj_end"] . "</td>";
  echo "<td>" . $row["name"] . "</td>";
  echo "<td>" . $row["start_city"] . "</td>";
  echo "<td>" . $row["end_city"] . "</td>";
  echo "</tr>";
  }
}

echo "</tbody> </table></div>";
 ?>
 </body>
