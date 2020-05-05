<?php


function hitungCF($g){
	$perkiraan = array();

	if(!is_array($g))
		return $perkiraan;
	
	foreach($g as $id)
	{
		$faktorkerusakan = cariKerusakanDariGejala($id);
		foreach($faktorkerusakan as $p)
		{
			$idp = $p['id_kerusakan'];
			if(!isset($perkiraan[$idp]))
				$perkiraan[$idp] = array();
				
			$cf = cariCF($id, $idp);
			$perkiraan[$idp][] = $cf;
		}
	}

	$cfAkhir = array();
	foreach($perkiraan as $p => $c)
	{
		sort($c);
		$cfAkhir[$p] = calcTotCF($c) * 100; // jadikan persen
	}

	arsort($cfAkhir);
	return $cfAkhir;
}

function cariCF($idGejala, $idkerusakan){
	$sql = "SELECT nilai_cf FROM relasi WHERE id_gejala = '$idGejala' AND id_kerusakan = '$idkerusakan'";
	$res = getOneRow($sql);
	
	return $res['nilai_cf'];
}

function cariKerusakanDariGejala($idGejala){
	$sql = "SELECT * FROM relasi a JOIN kerusakan b ON a.id_kerusakan = b.id_kerusakan WHERE a.id_gejala = '$idGejala'";
	return getRows($sql);
}

function calcCF($x, $y)
{
	$t = $x + ($y * (1 - $x));
	return $t;
}

function calcTotCF($g)
{
	if(count($g) <= 1)
		return $g[0];	

	$cfIJ = null;
	$n = count($g);
	for($i = 0; $i < $n - 1; $i++)
	{
		$j = $i + 1;
		if($cfIJ == null)
			$cfIJ = $g[$i];
			
		$cfIJ = calcCF($cfIJ, $g[$j]);
	}
	
	return $cfIJ;
}

function getKerusakan($idkerusakan){
	return getOneRow("SELECT * FROM kerusakan WHERE id_kerusakan = '$idkerusakan'");
}

function gais_sispak_cf($keluhan = null){
	if($keluhan == null){
		$keluhan = explode(';', $_POST['selected']);
	}
	$hasil = hitungCF($keluhan);

	$res = array();
	foreach ($hasil as $idkerusakan => $persentase) {
		$rsk = getKerusakan($idkerusakan);
		$rsk['_PERSENTASE_'] = number_format($persentase, 2);
		$res[] = $rsk;
	}

	return $res;
}