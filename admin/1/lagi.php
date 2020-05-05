<?php
 mysql_connect("localhost","root");
 mysql_select_db("andd2478_spk");


$query=mysql_query("SELECT * FROM helpdesk WHERE status='On Process'");
echo "jumlah status ".mysql_num_rows($query)." On Process.";


?>

<?php
echo "jumlah status ".mysql_num_rows($com)." On Process.";
?>

