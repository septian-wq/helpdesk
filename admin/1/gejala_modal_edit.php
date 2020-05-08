<?php

include "../koneksi.php";

$no_tiket	= $_GET["no_tiket"];

$querymhs = mysqli_query($konek, "SELECT * FROM helpdesk WHERE no_tiket='$no_tiket'");
if($querymhs == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($mhs = mysqli_fetch_array($querymhs)){




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
<!-- Modal Popup Helpdesk -->
			<div class="modal-dialog" tabindex="-1" role="dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Update Tiket</h4>
					</div>
					<div class="modal-body">
						<form action="gejala_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							


								<div class="form-row">
								<div class="form-group col-xs-12">
								<label>No Tiket</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="no_tiket" type="text" class="form-control" value="<?php echo $mhs["no_tiket"]; ?>" readonly />
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
								<label>NIK</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="nik" type="text" class="form-control" value="<?php echo $mhs["nik"]; ?>"/>
									</div>
								</div>
						
							<div class="form-group col-md-6">
								<label>No HP</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="no_hp" type="text" class="form-control" value="<?php echo $mhs["no_hp"]; ?>"/>
									</div>
								</div>
							</div>
	
							<div class="form-group col-xs-12">
								<label>Nama</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="nama" type="text" class="form-control" value="<?php echo $mhs["nama"]; ?>" />
									</div>
							</div>
							
							<div class="form-group col-xs-12">
								<label>email</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="email" type="text" class="form-control" value="<?php echo $mhs["email"]; ?>"/>
									</div>
							</div>
							
							<div class="form-row">
                         	<div class="form-group col-md-6">
								<label>Tanggal Tiket</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="tgl_tiket" type="datetime-local"  placeholder="Tanggal Tiket" class="form-control datetimepicker" value="<?php echo date('Y-m-d\TH:i:s', strtotime($mhs["tgl_tiket"]));?>" required />
									</div>
									
							</div>


                         	<div class="form-group col-md-6">
								<label>Unit</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<select name="unit" class="form-control" id="unit" <?php echo $mhs["unit"]; ?> required>
										  
									      <option>AMA CopU</option>
									      <option>AMMEERRA</option>
									      <option>BKM</option>
									      <option>BTP-KMCS</option>
										
										  <option>Business Enabler Academy</option>
									      <option>Consumer Academy</option>
									      <option>DSP Academy</option>
									      <option>Enterprise Academy</option>

										  <option>General Support</option>
									      <option>GeoFM</option>
									      <option>GSD-BM</option>
									      <option>GSD-Cleaning Service</option>

									      <option>GSD-Security</option>
									      <option>GSD-Teknisi CorpU</option>
									      <option>GSD-Umum</option>
									      <option>Infomedia</option>
											
										  <option>IS</option>
									      <option>ISH-Infomedia</option>
									      <option>KMCS</option>
									      <option>Kopegtel Divlat Medan</option>
										
										  <option>Koperasi Jakarta</option>
									      <option>Koperasi Makasar</option>
									      <option>Koperasi Saraswati</option>
									      <option>Koperasi Semarang</option>

										  <option>Koperasi Surabaya</option>
									      <option>Leadership Academy</option>
									      <option>Learning Area 1</option>
									      <option>Learning Area 2</option>
										  <option>Learning Area 3</option>
									      <option>Learning Area 4</option>
											

									      <option>Learning Area 5</option>
									      <option>Learning Area 7</option>
									      <option>Learning Operation</option>
									      <option>Mobile Academy</option>
									    	
									      <option>NITS Academy</option>
									      <option>Outsource Internal</option>
									      <option>PNC</option>
									      <option>PT.Panah Dunia Perkasa</option>

										  <option>PT.Humanika Sarana Mandiri</option>
									      <option>PT.Kurnia Oryza Reksa Perkasa</option>
									      <option>SGM</option>
									      <option>WINS Academy</option>
									    </select>	
										<!-- <input name="unit" type="text" class="form-control" placeholder="unit"/> -->
									</div>
								</div>
							</div>

							<div class="form-row">
							<div class="form-group col-md-6">
								<label>Jalur Helpdesk</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<select name="jalur_helpdesk" class="form-control" id="jalur_helpdesk" <?php echo $mhs["jalur_helpdesk"];?> required>
									      <option>Website</option>
									      <option>Telephone</option>
									      <option>WhatsApp</option>
									      <option>Email</option>
									      <!-- <option>5</option> -->
									    </select>	
										<!-- <input name="jalur_helpdesk" type="text" class="form-control" placeholder="Jalur Helpdesk"/> -->
									</div>
							</div>
							<div class="form-group col-md-6">
								<label>Kategori</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<select name="kategori" class="form-control" id="kategori" <?php echo $mhs["kategori"]; ?> required>
										  
									      <option>Komunikasi</option>
									      <option>Informasi</option>
									     <!--  <option>3</option>
									      <option>4</option>
									      <option>5</option> -->
									    </select>						
											<!-- <input name="kategori" type="text" class="form-control" placeholder="kategori"/> -->
									</div>
							</div>
							</div>

							<div class="form-group col-xs-12">
								<label>Deskripsi</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<textarea name="deskripsi" type="text" class="form-control" rows="2"><?php echo $mhs["deskripsi"];?></textarea>
										<!-- <input name="deskripsi" type="text" class="form-control" placeholder="deskripsi"/> -->
									</div>
							</div>

							
							<div class="form-row">
							<div class="form-group col-md-6">
								<label>Status</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<select name="status" class="form-control" id="status" required>
										  <option><?php echo $mhs["status"];?></option>
									      <option>Submitted</option>
									      <option>On Process</option>
									      <option>Completed</option>
									      <option>Closed</option>
									    </select>	
										<!-- <input name="status" type="text" class="form-control" placeholder="status"/> -->
									</div>
							</div>
							<div class="form-group col-md-6">
								<label>Tanggal Close</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div> 
										<input name="tgl_close" type="datetime-local" class="form-control" 
										value="<?php echo date('Y-m-d\TH:i:s', strtotime($mhs["tgl_close"]));?>" />


									</div>
							</div>
							</div>	

							<div class="form-group col-xs-12">
								<label>Follow Up</label>
									<div class="input-group ">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<textarea name="follow_up" class="form-control" rows="2"><?php echo $mhs["follow_up"];?></textarea>
										<!-- <input name="follow_up" type="text" class="form-control" placeholder="Follow Up"/> -->
									</div>
							</div>
							


                          	<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Save
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
<?php
			}

?>