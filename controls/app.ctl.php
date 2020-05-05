<?php


function gais_admin(){
	return fetch("admin/{$_POST['page']}");
}

function gais_kerusakan_list(){
	//return getRows("SELECT * FROM komponen ORDER BY id_komponen ASC");
	$sql = "SELECT * FROM kerusakan ORDER BY id_kerusakan ASC";
        if(isset($_POST['groups']))
                $sql = "SELECT * FROM kerusakan GROUP BY nm_kerusakan ORDER BY id_kerusakan ASC";
        return getRows($sql);
}


function gais_spk_list(){
	return getRows("SELECT * FROM spk ORDER BY id_spk ASC");
}

// function gais_handphone_hapus(){
// 	$id = mysql_real_escape_string($_POST['id_handphone']);
// 	$sql = "DELETE FROM handphone WHERE id_handphone = '$id'";
// 	if(executeQuery($sql))
// 		return "Data Berhasil dihapus";
// 	else
// 		return "Data Gagal dihapus: " + mysql_error();
// }
//============

//=================gejala

function gais_pertanyaan_list(){
	$filter = '';
	

	return getRows("
		SELECT
			*
		FROM
			gejala a
		LEFT JOIN spk b ON a.id_spk = b.id_spk
		$filter
		ORDER BY a.id_gejala ASC");
}

function gais_relasi_list(){
	return getRows("SELECT
		*
		FROM relasi a
		LEFT JOIN gejala b ON a.id_gejala = b.id_gejala
		LEFT JOIN kerusakan c ON a.id_kerusakan = c.id_komponen
		LEFT JOIN spk d ON b.id_spk = d.id_handphone
	");
}

