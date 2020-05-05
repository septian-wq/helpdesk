<?php
$connect = mysqli_connect("localhost", "root", "", "andd2478_spk");
$sql = "SELECT * FROM helpdesk";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  <title>Export MySQL data to Excel in PHP</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    <table class="table table-bordered">
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
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
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
     ?>
    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div>  
 </body>  
</html>