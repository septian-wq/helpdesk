<?php

$konek = mysqli_connect("localhost", "root", "", "andd2478_spk");
if(mysqli_connect_errno()){
	printf ("Gagal terkoneksi : ".mysqli_connect_error());
	exit();	
}
	
?>