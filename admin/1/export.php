
<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "andd2478_spk");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM helpdesk";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                        <th>No Tiket</th>
						<th>NIK</th>
						<th>Nama</th>
                        <th>NO HP</th>
                        <th>Email</th>

                        <th>Tanggal Tiket</th>
						<th>Unit</th>
						<th>Jalur Helpdesk</th>
						<th>Kategori Masalah</th>
						<th>deskripsi Masalah</th>

						<th>status</th>
						<th>follow up</th>
						<th>Tanggal Close tiket</th>
						
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                       

									<td>'.$row["no_tiket"].'</td>
									<td>'.$row["nik"].'</td>
									<td>'.$row["nama"].'</td>
									<td>'.$row["no_hp"].'</td>
									<td>'.$row["email"].'</td>

									<td>'.$row["tgl_tiket"].'</td>
									<td>'.$row["unit"].'</td>
									<td>'.$row["jalur_helpdesk"].'</td>
									<td>'.$row["kategori"].'</td>
									<td>'.$row["deskripsi"].'</td>

									<td>'.$row["status"].'</td>
									<td>'.$row["follow_up"].'</td>
									<td>'.$row["tgl_close"].'</td>



                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Tiket_TCU.xls');
  echo $output;
 }
}
?>