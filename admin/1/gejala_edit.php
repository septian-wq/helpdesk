<?php

include "../koneksi.php";
mysql_connect("localhost","root");
 mysql_select_db("andd2478_spk");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';


$no_tiket 		= $_POST["no_tiket"];
$nik 			= $_POST["nik"];
$nama 			= $_POST["nama"];
$no_hp 			= $_POST["no_hp"];
$email			= $_POST["email"];
$tgl_tiket  	= date('Y-m-d H:i:s', strtotime($_POST["tgl_tiket"]));
$unit 			= $_POST["unit"];
$jalur_helpdesk = $_POST["jalur_helpdesk"];
$kategori 		= $_POST["kategori"];
$deskripsi 		= $_POST["deskripsi"];
$status 		= $_POST["status"];
$follow_up		= $_POST["follow_up"];
$tgl_close 		= date('Y-m-d H:i:s', strtotime($_POST["tgl_close"]));


if($edit = mysqli_query($konek, "UPDATE helpdesk SET no_tiket='$no_tiket', nik='$nik', nama='$nama', no_hp='$no_hp', email='$email', tgl_tiket='$tgl_tiket', unit='$unit', jalur_helpdesk='$jalur_helpdesk', kategori='$kategori', deskripsi='$deskripsi', status='$status', follow_up='$follow_up', tgl_close='$tgl_close' WHERE no_tiket='$no_tiket'")){


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'soykoola@gmail.com';                 // SMTP username
    $mail->Password = '083878382918';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('soykoola@gmail.com', 'Helpdesk');
    $mail->addAddress($email, 'namapenerima');     // Add a recipient
    
    $body             = 
        "<body style='margin: 10px;'>
        <div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
        <br>

        <strong>Tiket Nomer </strong>".$no_tiket."<strong>, dengan status </strong>".$status."<p>
        <b>Dengan Hormat,</b><br>
        <b>Bapak/Ibu </b>".$nama."<p>

        <b>Tiket incident telah </b>".$status."<b> dengan informasi sebagai berikut:</b><p>
	
		<b>No Tiket     	 : </b>".$no_tiket."<br>
		<b>Progres / Solusi  : </b>".$follow_up."<p>
		

        <b>Helpdesk TCUC<b><br>
        <b>Jika ada pertanyaan lebih lanjut, silahkan menghubungi HR Helpdesk TCUC.</b><br>
       
        <strong>* NOTES: Notifikasi ini terkirim secara otomatis, sehingga dimohon untuk tidak balas ke email ini. *</strong><p>
        <b>Terima Kasih,</b><br>
        <b>HR Helpdesk TCUC</b>
        <br>
        </div>
        </body>";
    $body             = eregi_replace("[\]",'',$body);
   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Helpdesk TCU'; 
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->MsgHTML($body);
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


		header("Location: gejala.php");
		exit();
		
	}

die ("Terdapat kesalahan : ". mysqli_error($konek));

?>