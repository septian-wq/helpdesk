<?php


function loggedIn()
{
	global $SS;

	return $SS['user'] != '';
}

function gais_login($uname = null, $pass = null)
{
	global $SS;

	if(is_null($uname) || is_null($pass))
	{
		$uname = $_POST['username'];
		$pass = md5($_POST['password']);
	}

	$user = getOneRow("SELECT * FROM user WHERE username = '$uname' AND password = '$pass'");
	if($user['username'] != $uname)
	{
		return array(
			'success' => false,
			'message' => 'Username atau password tidak sesuai ' . mysql_error()
		);
	}

	$SS['user'] = $uname;
	$SS['uinfo'] = $user;
	$SS['logtime'] = time();

	return array(
		'success' => true
	);
}

function gais_logout()
{
	global $SS;

	$SS = array();
	return array('message' => 'success');
}
