<?php

include "../koneksi.php";

$no_tiket = $_GET["no_tiket"];

if($delete = mysqli_query($konek, "DELETE FROM helpdesk WHERE no_tiket='$no_tiket'")){
	header("Location: gejala.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>