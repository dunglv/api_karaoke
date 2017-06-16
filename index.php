<?php

require_once __DIR__.'/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as DB;
use App\Core;
use Carbon\Carbon;
$config['displayErrorDetails'] = true;
$config['db']  = array(
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'api_karaoke',
            'username' => 'root',
            'password' => '',
            'charset'   => 'utf8',
            'collation' => '',
            'prefix'    => ''
        );
$app = new \Slim\App(['settings' => $config]);
$core = new Core;
// Config url home
$ptc = ($_SERVER['SERVER_PORT']!=='80')?':'.$_SERVER['SERVER_PORT']:'';
$self = !empty($_SERVER['PHP_SELF'])?trim(str_replace('index.php', '', $_SERVER['PHP_SELF']), '/'):'';
$home_url = isset($_SERVER['HTTPS'])?'https':'http'.'://'.$_SERVER['SERVER_NAME'].$ptc.'/'.$self;	
// Dependencies
$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer("./views/",
	array('base_url' => $home_url)
	);
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};
$conn = new PDO('mysql:host=localhost;dbname=api_karaoke', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ROUTER MANAGER
$app->get('/admin', function($req, $res, $agr){
	return  $this->view->render($res, 'ui/home.php');
});
$app->get('/admin/create-lyric', function($req, $res){
	 $res =  $this->view->render($res, 'admin/create.php');
	 return $res;
})->setname('song.create');
$app->post('/admin/create-lyric', function($req, $res) use ($app, $home_url, $conn, $core){
	// return $res->withRedirect($home_url); 
	$title =  $req->getParsedBodyParam('title');
	$desc =  $req->getParsedBodyParam('description');
	$dur =  $req->getParsedBodyParam('duration');
	$line =  $req->getParsedBodyParam('line');
	$start = $req->getParsedBodyParam('start');
	$stop = $req->getParsedBodyParam('stop');
	$alias = $core->convert_alias($title);
	$sis = $core->rand_str(null, null);
	$sql_query = "SELECT * FROM songs WHERE alias='".$alias."'";
	$rst = $conn->query($sql_query);

	$songs = $rst->fetchAll(PDO::FETCH_OBJ);
	$created_at = Carbon::now();
	if (count($songs) < 1) {
		$js_lr = '[';
		for ($i=0; $i < count($line); $i++) { 
			if ($i === count($line)-1) {
				$js_lr .= '{"line":"'.$line[$i].'", "start":"'.$start[$i].'", "stop":"'.$stop[$i].'"}';
				break;
			}
			$js_lr .= '{"line":"'.$line[$i].'", "start":"'.$start[$i].'", "stop":"'.$stop[$i].'"},';
		}

		$js_lr .= ']';

		$sqli = "INSERT INTO songs(title, description, duration, sis, alias, lyrics, status, created_at) VALUES('".$title."', '".$desc."', '".$dur."','".$sis."', '".$alias."', '".$js_lr."', 1, '".$created_at."')";
		
		if ($conn->query($sqli)) {
			return $res->withRedirect($this->router->pathFor('song.create', array('success'=> 'Ok')));
			// return array('success' => 'Add new song successed');
		}else{
			return json_encode(array('error' => 'Add new song failed'));
		}
	}

	
	 // echo(Carbon::now());
})->setName('song.store');

$app->get('/admin/create-karaoke/{sis}', function($req, $res, $args) use ($conn){
	$sis = $args['sis'];
	$query = "SELECT * FROM songs WHERE sis = '".$sis."'";
	$rst = $conn->query($query);
	$song = $rst->fetchAll(PDO::FETCH_OBJ);
	$res =  $this->view->render($res, 'admin/create-karaoke.php', array('song' => $song));
	return $res;
});

$app->post('/admin/create-karaoke/{sis}', function($req, $res, $args) use ($conn){
	$sis = $args['sis'];
	$query = "SELECT * FROM songs WHERE sis = '".$sis."'";
	$rst = $conn->query($query);
	$song = $rst->fetchAll(PDO::FETCH_OBJ);
	$kr = $req->getParsedBodyParam('kr');
	if (count($song) > 0) {
		$usql = "UPDATE songs SET karaoke = '".$kr."' WHERE sis = '".$sis."'";
		if ($conn->query($usql)) {
			return '{"success":"Update success song '.$sis.'"}';
		}else{
			return '{"error":"Error to process update data"}';
		}
		// $res =  $this->view->render($res, 'admin/create-karaoke.php', array('song' => $song));
		// return $res;
	}else{
		return '{"error":"Not found your song"}';
	}
});
//*************************************************
// ROUTER UI FRONT
//*************************************************
// 
$app->get('/', function($req, $res) use ($conn){
	$query = "SELECT * FROM songs";
	$rst = $conn->query($query);
	$songs = $rst->fetchAll(PDO::FETCH_OBJ);

	$res =  $this->view->render($res, 'ui/home.php', array('songs' => $songs));
	return $res;
});

$app->get('/song/{sis}', function($req, $res, $args) use ($conn){
	$sis = $args['sis'];
	$query = "SELECT * FROM songs WHERE sis = '".$sis."'";
	$rst = $conn->query($query);
	$song = $rst->fetchAll(PDO::FETCH_OBJ);

	
	$res =  $this->view->render($res, 'ui/song.php', array('song' => $song));
	return $res;
});

$app->get('/about', function($req, $res){
	echo  'About';
});
$app->run();
