<?php
				session_start();
			include "../koneksi.php";
					include "auth_user.php";
					mysql_connect("localhost","root");
					mysql_select_db("andd2478_spk");

						$no_tiket = $_GET["no_tiket"];
						$querymhs = mysqli_query ($konek, "SELECT helpdesk.no_tiket, helpdesk.nik, helpdesk.nama, log.ket, log.old_data, log.tgl_proses, log.date, log.new_data, log.noti
							FROM helpdesk INNER JOIN log ON helpdesk.no_tiket = log.noti WHERE no_tiket='$no_tiket' ");
						if($querymhs == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
							
						while ($mhs = mysqli_fetch_array ($querymhs)){

						
						
					?>
					<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		  $('#Tanggal_Lahir2').daterangepicker({
			  singleDatePicker: true,
			  showDropdowns: true,
			  format: 'YYYY-MM-DD'
		  });
      });
    </script>
<!-- Modal Popup Dosen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">History</h4>
					</div>
					<div class="modal-body">
						<form action="triger.php" name="modal_popup" enctype="multipart/form-data" method="post">
								
								<div class="form-row">
								<div class="ol-xs-12">
								 <body>
								 	<p> Nomer Tiket : <?php echo $mhs["noti"]; ?></p>
								 	<p> Tangga Update : <?php echo date('l', strtotime($mhs["date"])).", ". $mhs["date"]; ?></p>
									<p> Tanggal Submit : <?php echo $mhs["tgl_proses"]; ?> </p>
								 	<p> This request is : <?php echo $mhs["old_data"]; ?> by <?php echo $mhs["ket"]; ?> </p>
									<p> Dengan Follow Up : <?php echo $mhs["new_data"]; ?> </p>

								 </body>
							</div>

                          	<div class="modal-footer">
								
								<button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">
									OK
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
<?php
			}

?>
	</table>





