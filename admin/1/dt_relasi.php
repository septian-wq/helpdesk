				<thead>
					<tr>
						<th>ID Gejala</th>
						<th>ID Kerusakant</th>
						<th>Nilai CF</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$queryrelasi = mysqli_query ($konek, "SELECT id_gejala,id_kerusakan,nilai_cf FROM relasi");
						if($queryrelasi == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($relasi = mysqli_fetch_array ($queryrelasi)){
							
							echo "
								<tr>
									<td>$relasi[id_gejala]</td>
									<td>$relasi[id_kerusakan]</td>
									<td>$relasi[nilai_cf]</td>
									<td>
										<a href='#' class='open_modal' id_gejala='$relasi[id_gejala]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"relasi_delete.php?id_gejala=$relasi[id_gejala]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>