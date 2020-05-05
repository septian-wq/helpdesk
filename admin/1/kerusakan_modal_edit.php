<?php

include "../koneksi.php";

$id_kerusakan	= $_GET["id_kerusakan"];

$queryguru = mysqli_query($konek, "SELECT * FROM kerusakan WHERE id_kerusakan='$id_kerusakan'");
if($queryguru == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($guru = mysqli_fetch_array($queryguru)){

?>
	
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Modal Popup guru -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Kerusakan</h4>
					</div>
					<div class="modal-body">
						<form action="kerusakan_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>ID Kerusakan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="id_kerusakan" type="text" class="form-control" value="<?php echo $guru["id_kerusakan"]; ?>"  />
									</div>
							</div>
							<div class="form-group">
								<label>Nama Kerusakan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="nm_kerusakan" type="text" class="form-control" value="<?php echo $guru["nm_kerusakan"]; ?>"/>
									</div>
							</div>
                            <div class="form-group">
								<label>Deskripsi</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="deskripsi" type="text" class="form-control" value="<?php echo $guru["deskripsi"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Pencegahan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input name="pencegahan" type="text" class="form-control" value="<?php echo $guru["pencegahan"]; ?>"/>
									</div>
							</div>
								<div class="form-group">
								<label>Url Image</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="url_foto" type="file" class="form-control" placeholder="Url Foto"/>
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