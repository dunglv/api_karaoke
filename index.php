<?php

require_once __DIR__.'/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as DB;

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

// Config url home
$ptc = ($_SERVER['SERVER_PORT']!=='80')?':'.$_SERVER['SERVER_PORT']:'';
$self = !empty($_SERVER['PHP_SELF'])?trim(str_replace('index.php', '', $_SERVER['PHP_SELF']), '/'):'';
$home_url = isset($_SERVER['HTTPS'])?'https':'http'.'://'.$_SERVER['SERVER_NAME'].$ptc.'/'.$self.'/public';	
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
// ROUTER MANAGER
$app->get('/admin', function($req, $res, $agr){
	return  $this->view->render($res, 'ui/home.php');
});
$app->get('/admin/create-lyric', function($req, $res){
	 $res =  $this->view->render($res, 'admin/create.php');
	 return $res;
})->setname('song.create');
$app->post('/admin/create-lyric', function($req, $res) use ($app, $home_url){
	// return $res->withRedirect($home_url); 
	$title =  $req->getParsedBodyParam('title');
	$desc =  $req->getParsedBodyParam('description');
	$dur =  $req->getParsedBodyParam('duration');
	$lines =  $req->getParsedBodyParam('line');
	$starts = $req->getParsedBodyParam('start');
	$stops = $req->getParsedBodyParam('stop');
	$song = DB::select('SELECT * FROM songs');
	// $res =  $this->view->render($res, 'admin/create.php');
	return $song;
})->setName('song.store');
// ROUTER UI FRONT
$app->get('/', function($req, $res){
	$res =  $this->view->render($res, 'ui/home.php');
	return $res;
});

$app->get('/about', function($req, $res){
	echo  'About';
});
$app->run();
