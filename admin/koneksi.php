<?php

$konek = mysqli_connect("localhost", "helpdesk", "helpdesk@corpu", "helpdesk");
if(mysqli_connect_errno()){
	printf ("Gagal terkoneksi : ".mysqli_connect_error());
	exit();	
}
	
?>
