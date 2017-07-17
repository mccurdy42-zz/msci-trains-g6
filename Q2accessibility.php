<body>
<h1>Stations Without Food and Accessibility</h1>
<p> This table allows operating companies to identify stations that do not have any restaurants or accessibility serivces.</p>
<p>This allows companies to identify high priority improvements</p>
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
<thead><tr><th>Location</th><th>Number of Tracks</th></tr></thead>
<tfoot><tr><td colspan="2"><div id="paging"><ul><li><a href="#"><span>Previous</span></a></li><li><a href="#" class="active"><span>1</span></a></li><li><a href="#"><span>2</span></a></li><li><a href="#"><span>3</span></a></li><li><a href="#"><span>4</span></a></li><li><a href="#"><span>5</span></a></li><li><a href="#"><span>Next</span></a></li></ul></div></tr></tfoot>
<tbody>';
$sql = " SELECT DISTINCT S.location, S.num_tracks
FROM stations AS S, runs_through AS R, operating_comp AS C, food F
WHERE C.c_id = '$cid' AND
      C.c_id = R.c_id AND
      R.s_id = S.s_id AND
      S.accessibility = 'No' AND
      S.s_id NOT IN  ( SELECT F2.s_id
                      FROM food AS F2)";



$result = $mysqli->query($sql);

if($result->num_rows>0){
 while($row = $result->fetch_assoc()){
   echo "<tr>";
   echo "<td>" . $row["location"] . "</td>";
   echo "<td>" . $row["num_tracks"] . "</td>";
   echo "</tr>";
  //echo "LOCATION: " . $row["location"]. " NUMBER OF TRACKS: " . $row["num_tracks"]. "<br>";
  }
}
echo "</body> </table></div>";
 ?>
 </body>
