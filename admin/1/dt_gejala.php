				<thead>
					<tr bgcolor="#66CDAA">
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
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querymhs = mysqli_query ($konek, "SELECT no_tiket, nik, nama, no_hp, email, tgl_tiket, unit, jalur_helpdesk, kategori, deskripsi, status, follow_up, tgl_close FROM helpdesk");
						if($querymhs == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
							
						while ($mhs = mysqli_fetch_array ($querymhs)){
							
							echo "
								<tr bgcolor='#DCDCDC'>

									<td>$mhs[no_tiket]</td>
									<td>$mhs[nik]</td>
									<td>$mhs[nama]</td>
									<td>$mhs[no_hp]</td>
									<td>$mhs[email]</td>

									<td>$mhs[tgl_tiket]</td>
									<td>$mhs[unit]</td>
									<td>$mhs[jalur_helpdesk]</td>
									<td>$mhs[kategori]</td>
									<td>$mhs[deskripsi]</td>

									<td>$mhs[status]</td>
									<td>$mhs[follow_up]</td>
									<td>$mhs[tgl_close]</td>

									<td>
									<a href='#' class='open_modal' no_tiket='$mhs[no_tiket]'>View</a> |
									<a href='#' onClick='confirm_delete(\"gejala_delete.php?no_tiket=$mhs[no_tiket]\")'>Delete</a> |
									<a href='#' class='hover' no_tiket='$mhs[no_tiket]'>History</a>|
									</td>
								</tr>";
						}
					?>

				</tbody>