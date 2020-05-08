<?php
include "../koneksi.php";
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


if ($add = mysqli_query($konek, "INSERT INTO helpdesk (no_tiket, nik, nama, no_hp, email, tgl_tiket, unit, jalur_helpdesk, kategori, deskripsi, status, follow_up, tgl_close) VALUES 
	('$no_tiket', '$nik', '$nama','$no_hp', '$email', '$tgl_tiket', '$unit', '$jalur_helpdesk','$kategori', '$deskripsi', '$status', '$follow_up', '$tgl_close' )"))



{
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings


  	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->SMTPDebug = 2; //Alternative to above constant
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hrconsulting.tcu@gmail.com';                 // SMTP username
    $mail->Password = 'Sekre123';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('hrconsulting.tcu@gmail.com', 'Helpdesk');
    $mail->addAddress($email, $nama);     // Add a recipient
    
    $body             = 
        "<body style='margin: 10px;'>
        <div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
        <br>

        <strong>Tiket Nomer </strong>".$no_tiket."<strong>, untuk masalah tersebut sudah kami terima dan sedang dikerjakan.</strong><br> 
        <strong>[MOHON UNTUK TIDAK REPLY EMAIL INI]</strong><p>
        <b>Dengan Hormat,</b><br>
        <b>Bapak/Ibu </b>".$nama."<p>

        <b>Tiket incident telah diterima dan sedang dikerjakan dengan informasi sebagai berikut:</b><p>
	
		<b>No Tiket     : </b>".$no_tiket."<br>
		<b>NIK 		    : </b>".$nik."<br>
        <b>Nama 	    : </b>".$nama."<br>
        <b>Unit		 	: </b>".$unit."<br>
        <b>Nomer Kontak : </b>".$no_hp."<br>
        <b>Status 		: </b>".$status."<br>
        <b>Problem 		: </b>".$kategori."<br>
        <b>Description  : </b>".$deskripsi."<p>
		

        <b>Helpdesk TCUC<b><p>
        <b>Selamat pagi rekan HR Helpdesk,</b><br>
        <b>Anda akan mendapatkan pemberitahuan dari perkembangan tiket Anda melalui email. Jika ada pertanyaan, silahkan menghubungi HR Helpdesk TCUC.</b><br>
        <br>
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
    $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
		header("Location: gejala.php");
		exit();

	}


die ("Terdapat kesalahan : ". mysqli_error($konek));

?>