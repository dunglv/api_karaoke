<?php
include_once __DIR__.'/../Db/Db.php';
// use admin\Db;
$cn = Db::connect;
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['line'] && $_POST['start'] && $_POST['stop'] ) {
	for ($i=0; $i < count($_POST['line']) ; $i++) { 
		echo $_POST['line'][$i];
	}
}else{
	var_dump(json_decode('{"Error":"Don\'t allow request."}'));
}