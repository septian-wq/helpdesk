<?php


$query=mysqli_query($konek, "SELECT * FROM helpdesk WHERE status='On Process'");
echo "jumlah status ".mysql_num_rows($query)." On Process.";


?>

<?php
echo "jumlah status ".mysql_num_rows($com)." On Process.";
?>

