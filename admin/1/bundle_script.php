
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/app.min.js"></script>
	<!-- Daterange Picker -->
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../aset/plugins/select2/select2.full.min.js"></script>
	<script src="../aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		$('#Tanggal_Lahir').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'YYYY-MM-DD'
		});
		
		  // Data Table
        $("#data").dataTable({
			scrollX: true
		});		
      });
    </script>
	
	<!-- Date Time Picker -->

	
	<!-- Javascript Edit--> 
	<script type="text/javascript">
		$(document).ready(function () {

	moment().format("dddd, MMMM Do YYYY, h:mm:ss a");

		$(".open_modal").click(function(e) {
			var m = $(this).attr("id_kerusakan");
				$.ajax({
					url: "kerusakan_modal_edit.php",
					type: "GET",
					data : {id_kerusakan: m,},
					success: function (ajaxData){
					$("#ModalEditkerusakan").html(ajaxData);
					$("#ModalEditkerusakan").modal('show',{backdrop: 'true'});
					}
				});
			});
		
		
		$("body").on("click",".open_modal",function(e) {
			var m = $(this).attr("no_tiket");
				$.ajax({
					url: "gejala_modal_edit.php",
					type: "GET",
					data : {no_tiket: m,},
					datatype:"json",
					success: function (ajaxData){
					$("#ModalEditgejala").html(ajaxData);
					$("#ModalEditgejala").modal('show',{backdrop: 'true'});
					}
				});
			});
			

			// $(".open_modal").click(function(e) {
			// var m = $(this).attr("id_gejala");
			// 	$.ajax({
			// 		url: "relasi_modal_edit.php",
			// 		type: "GET",
			// 		data : {id_gejala: m,},
			// 		success: function (ajaxData){
			// 		$("#ModalEditrelasi").html(ajaxData);
			// 		$("#ModalEditrelasi").modal('show',{backdrop: 'true'});
			// 		}
			// 	});
			// });
		
		$("body").on("click",".hover",function(e)  {
			var m = $(this).attr("no_tiket");
				$.ajax({
					url: "triger.php",
					type: "GET",
					data : {no_tiket: m,},
					success: function (ajaxData){
					$("#ModalTriger").html(ajaxData);
					$("#ModalTriger").modal('show',{backdrop: 'true'});
					}
				});
			});
	});
	

	</script>

	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>