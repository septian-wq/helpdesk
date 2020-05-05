<!DOCTYPE html>
 <html>
      <head>
           <title>Develindo | PHP AJAX Bootstrap - Menampilkan Data Record Menggunakan Bootstrap Popover</title>
           <!-- Bootstrap core CSS -->
           <link href="css/bootstrap.css" rel="stylesheet">
           <!-- Bootstrap core JavaScript-->
           <script src="js/jquery.min.js"></script>
           <script src="js/bootstrap.js"></script>

      </head>
      <body>
           <br /><br />
           <div class="container" style="width:800px;">
                <h2 align="center">PHP AJAX Bootstrap - Menampilkan Data Record Menggunakan Bootstrap Popover</h2>
                <h3 align="center">Data Seluruh Siswa</h3>
                <br /><br />
                <div class="table-responsive">
                     <table class="table table-bordered">
                          <tr>
                               <th>NIS</th>
                               <th>NISN</th>
                               <th>Nama Lengkap</th>
                               <th>Gender</th>
                          </tr>
                          <?php
                          //panggil fungsi koneksi.php
                          include "koneksi.php";
                          //ambil data dari tb_siswa dan lakukan perulangan dengan while
                          $ambildata=mysql_query("select*from tb_siswa order by id_siswa");
                          while($a = mysql_fetch_array($ambildata))
                          {
                          ?>
                          <tr>
                               <td>
                              
 <a tab-index="0" href="javascript:void(0);" class="hover" 
id="<?php echo $a['id_siswa']; ?>" rel="popover" data-placement=""
 data-original-title="" data-content="">
                               <strong><?php echo $a['id_siswa']; ?></strong>
                               </a>
                               </td>
                               <td><?php echo $a['nisn'];?></td>
                               <td><?php echo $a['nama_siswa'];?></td>
                               <td><?php echo $a['gender_siswa'];?></td>
                          </tr>
                          <?php
                          }
                          ?>
                     </table>
                </div>
           </div>
      </body>
 </html>
<script>
/*popover bootstrap*/

$(document).ready(function () {
    $(document).on('click', '.hover', function (e) {
        e.preventDefault();
        $(this).popover({
            title: "Detail Informasi Siswa",
            html: true,
            placement: 'right',
            trigger: 'focus',
            content: function () {
                var fetch_data = '';
                var element = $(this);
                var id = element.prop("id");
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    async: false,
                    data: { id: id },
                    success: function (data) {
                        fetch_data = data;
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                });
                return fetch_data;
            }

        });
        $(this).popover('show');
    });

});

 </script>