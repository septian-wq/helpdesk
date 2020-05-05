<?php

//include database configuration

include 'con.php';

//selecting rords

$query=mysqli_query($con,"select id_wadul, image, alamat, nama,no_hp,status from tbl_mbonk");

//count how many records fou

$num=mysqli_num_rows($query);

if($num>0){ //check if more than 0 record found

?>

<table border='1'>

<tr>

<th>Image</th>

<th>Alamat Lokasi</th>

<th>Nama Pelapor</th>
<th>No Telp</th>
<th>Status</th>

<th>Action</th>

</tr>

<?php

//retrieve our table contents

while($row=mysqli_fetch_array($query)){

//extract row

//this will make $row['firstname'] to

//just $firstname only

extract($row);

//creating new table row per record

?>

<tr>

<td width="20%"><img src="<?php echo $image; ?>" width="50" height="50"/></td>

<td><?php echo $alamat; ?></td>

<td><?php echo $nama; ?></td>
<td><?php echo $no_hp; ?></td>
<td><?php echo $status; ?></td>

<!--we will have the edit link here-->

<td>

<a href="edit.php?id_wadul=<?php echo $id_wadul; ?>">Tanggapi</a>

</td>

</tr>

<?php

}

?>

</table>

<?php

}else{ //if no records found

echo "No records found.";

}

?>