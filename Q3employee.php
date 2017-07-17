<body>
<h1>Employee's with more than 10 years experience</h1>
<p> Loyalty to an employer is valuable and important for dynamic companies into the future.</p>
<p> This identifies the operating companies' employees with more than 10 years of service</p>
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
<thead><tr><th>Employee Name</th><th>Years of Experience</th></tr></thead>
<tfoot><tr><td colspan="2"><div id="paging"><ul><li><a href="#"><span>Previous</span></a></li><li><a href="#" class="active"><span>1</span></a></li><li><a href="#"><span>2</span></a></li><li><a href="#"><span>3</span></a></li><li><a href="#"><span>4</span></a></li><li><a href="#"><span>5</span></a></li><li><a href="#"><span>Next</span></a></li></ul></div></tr></tfoot>
<tbody>';
$sql = "SELECT e.e_id, e.yrs_exp FROM employee e
WHERE e.c_id = '$cid'
GROUP BY e.yrs_exp
HAVING(e.yrs_exp>=10)";



$result = $mysqli->query($sql);



if($result->num_rows>0){
 while($row = $result->fetch_assoc()){
   echo "<tr>";
   echo "<td>" . $row["e_id"] . "</td>";
   echo "<td>" . $row["yrs_exp"] . "</td>";
   echo "</tr>";
    //echo "EMPLOYEE ID: " . $row["e_id"]. " YEARS OF EXPERIENCE: " . $row["yrs_exp"]. "<br>";
  }
}
echo "</body> </table></div>";
 ?>
 </body>
