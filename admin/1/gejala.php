<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include "../koneksi.php";
include "auth_user.php";

$query = "SELECT max(no_tiket) as maxKode FROM helpdesk";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$noTiket = $data['maxKode'];
$noUrut = (int) substr($noTiket, 5, 5);
$noUrut++;
$char = "TCU";
$noTiket = $char . sprintf("%05s", $noUrut);

$sql = "SELECT * FROM helpdesk";  
$result = mysqli_query($konek, $sql);

$sub=mysqli_query($konek, "SELECT * FROM helpdesk WHERE status='Submitted'"); // untuk Submited
$com=mysqli_query($konek, "SELECT * FROM helpdesk WHERE status='Completed'"); // untuk Completed
$pro=mysqli_query($konek, "SELECT * FROM helpdesk WHERE status='On Process'"); // untuk On Process
$clo=mysqli_query($konek, "SELECT * FROM helpdesk WHERE status='Closed'"); // untuk Closed

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Helpdesk TCU</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu">
              <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
              <li class="active"><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
			        <li><a href="gejala.php"><i style="font-size:15px" class="fa">&#xf07c;</i></i><span>Helpdesk TCU</span></a></li>
			         <!-- <li><a href="kerusakan.php"><i style="font-size:16px" class="fa">&#xf013;</i><span>Kerusakan</span></a></li>
			        <li><a href="relasi.php"><i class="fa fa-university"></i><span>Relasi</span></a></li> -->
				
			        </ul>
 			</section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Helpdesk TCU
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-users"></i> Helpdesk TCU </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                 <form method="post" action="export.php">	
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button>
				</a>

				<input type="submit" name="export" class="btn btn-success" value="Download To Excel" />
		
						
				<a href="#" class="but1" ><button class="btn btn-default" type="button" ><i class=""></i> Submited  <br><?php
				echo "".mysqli_num_rows($sub)."";
				?></br></button></a>

				<a href="#" class="but2"><button class="btn btn-danger" type="button" ><i class=""></i> On Process  <br><?php
				echo "".mysqli_num_rows($pro)."";
				?></br></button></a>

				<a href="#" class="but3"><button class="btn btn-info" type="button" ><i class=""></i> Completed  <br><?php
				echo "".mysqli_num_rows($com)."";
				?></br></button></a>

				<a href="#" class="but4"><button class="btn btn-primary" type="button" ><i class=""></i> Closed  <br><?php
				echo "".mysqli_num_rows($clo)."";
				?></br></button></a>

    			</form>	
				<br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable" tabindex="-1">
						<?php
							include "dt_gejala.php"; 
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup guru -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Tiket</h4>
					</div>
					<div class="modal-body">
						<form action="gejala_add.php" name="modal_popup" enctype="multipart/form-data" method="post">

							<div class="form-row">
								<div class="form-group col-xs-12">
								<label>No Tiket</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="no_tiket" type="text" class="form-control" value="<?php echo $noTiket; ?>" readonly />
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
										<input name="nik" type="text" class="form-control" placeholder="NIK"/>
									</div>
								</div>
						
							<div class="form-group col-md-6">
								<label>No HP</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="no_hp" type="text" class="form-control" placeholder="No HP"/>
									</div>
								</div>
							</div>
													
                            <div class="form-group col-xs-12">
								<label>Nama</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="nama" type="text" class="form-control" placeholder="Nama"/>
									</div>
							</div>

							<div class="form-group col-xs-12">
								<label>email</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="email" type="text" class="form-control" placeholder="email"/>
									</div>
							</div>

							<div class="form-row">
                         	<div class="form-group col-md-6">
								<label>Tanggal Tiket</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="tgl_tiket" type="datetime-local"  placeholder="Tanggal Tiket" class="form-control datetimepicker" required />
									</div>
									
							</div>


                         	<div class="form-group col-md-6">
								<label>Unit</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<select name="unit" class="form-control" id="unit" required>
										  <option value=""> -Pilih Unit- </option>
									     
										  <option>Business Enabler Academy</option>
										  <option>NITS Academy</option>
										  <option>WINS Academy</option>
										  <option>Enterprise Academy</option>
									      <option>Consumer Academy</option>
									      <option>Leadership Academy</option>

									      <option>DSP Academy</option>
									      <option>Mobile Academy</option>
										  <option>General Support</option>
									      <option>Planning & Controlling</option>
										  <option>KMCS</option>
									      <option>Learning Operation/Learning Area</option>
									      <option>GOFM</option>

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
										<select name="jalur_helpdesk" class="form-control" id="jalur_helpdesk" required>
										 
										  <option value=""> -Pilih Jalur- </option>
									      <option>Direct</option>
									      <option>Call</option>
									      <option>WhatsApp</option>
									      <option>Telegram</option>
									      <option>Email</option>
									    </select>	
										<!-- <input name="jalur_helpdesk" type="text" class="form-control" placeholder="Jalur Helpdesk"/> -->
									</div>
							</div>
							<div class="form-group col-md-6">
								<label>Kategori Masalah</label>
									<div class="input-group">
										<div class="input-group-addon">
										<i class="fa fa-flag"></i>
										</div>
											
										<input name="kategori" type="text" class="form-control" list="Masalah" placeholder="-pilih kategori-">
										    <datalist id="Masalah">
										      <option value="Adm & Service">										      	
										      <option value="Career & Development">
										      <option value="HR Consulting">
										    </datalist>
									</div>
							</div>
							</div>
							


							<div class="form-group col-xs-12">
								<label>Deskripsi</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<textarea name="deskripsi" type="text" class="form-control" placeholder="deskripsi"></textarea>
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
										  <option value=""> -Pilih Status- </option>
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
										<input name="tgl_close" type="datetime-local" class="form-control" placeholder="Tanggal Close"/>
									</div>
							</div>
							</div>

							<div class="form-row">
							<div class="form-group col-xs-12">
								<label>Follow Up</label>
									<div class="input-group ">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<textarea name="follow_up" type="text" class="form-control" placeholder="Follow Up"></textarea>
										<!-- <input name="follow_up" type="text" class="form-control" placeholder="Follow Up"/> -->
									</div>
							</div>
							</div>



                         	<div class="modal-footer">
								<button class="btn btn-success" type="submit" name="send" >
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Modal Popup Edit -->
		<div id="ModalEditgejala" class="modal fade" tabindex="-1" role="dialog"></div>
		
		<div id="ModalTriger" class="modal fade" tabindex="-1" role="dialog"></div>
		

		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>

		</div>
		
    </div><!-- /.content-wrapper -->

    <?php
		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
