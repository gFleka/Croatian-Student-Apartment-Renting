<?php


use Phalcon\Loader;
use	Phalcon\Mvc\Micro;
use	Phalcon\DI\FactoryDefault;
use	Phalcon\Http\Response;
use	Phalcon\Http\Request;

include 'restclient.php';
$api = new RestClient(array(
        'base_url' => "http://jsonplaceholder.typicode.com",
        'format' => ""));

//Error
$debug = new \Phalcon\Debug();
$debug->listen();

#MySQL connection setup
$connection = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
  'host' => 'localhost',
  'username' => 'root',
  'password' => '',
  'dbname' => 'test',
 ));

 //Reconnect
$connection->connect();
$app = new Micro();

//FetchAll
/*$app->get( '/api/posts', function () use ($app, $connection) { 

	$phql = "SELECT * FROM post";
	$result = $connection->query($phql);
	$result->setFetchMode(Phalcon\Db::FETCH_ASSOC);

	$data = array();

	while ($post = $result->fetchAll()) {
		$data[] = $post;
	}

	echo json_encode($data);

} );*/

$app->get('/api/posts', function() use ($api) {

        $result = $api->get("/posts");
        if($result->info->http_code == 200)
        {
                //echo "Test";
                //var_dump($result->decode_response());
                //echo "<br>";
                //var_dump($result);
                //echo "Test end";

                $results = $result->decode_response();
                foreach ($results as $key => $value) {

                        //var_dump($value);
                        $userId = $value->userId;
                        $id = $value->id;
                        $title = $value->title;
                        $body = $value->body;

                        echo "msg id:" . $id . " <h2>" . $title . "</h2><p>User:" . $userId . "Tekst:" . $body . "</p>";
                        echo "<hr>";
                        # code...
                }

        }else echo "Greska kod api-a Kontaktirati Juresa Ivan!";


});







//Fetch by ID
//int->/{[0-9]+} => Matches an integer parameter
$app->get('/api/post/{id:[0-9]+}', function ($id) use ($app, $connection) {

	$phql = "SELECT * FROM post WHERE id = :id";


	$result = $connection->query($phql, array( 'id' => $id));
	$result->setFetchMode(Phalcon\Db::FETCH_ASSOC);

	$data = array();

	while($post = $result->fetchAll()) {
		$data[] = $post;
	}

	echo json_encode($data);

} ); 

/*$app->post('/api/post', function() use ($app, $connection) {
	$phql = "INSERT INTO post (id, naslov, datum, sadrzaj) VALUES (:id:, :naslov:, :datum:, :sadrzaj:)";

	$result = $connection->query($phql, array(
		'id' 		=>	$id,
		'naslov'	=>	$naslov,
		'datum'		=>	$datum,
		'sadrzaj'	=>	$sadrzaj
		));

} );*/
$app->post('/api/post', function() use ($app, $connection) {
	$varijable = $app->request->getJsonRawBody();

	$phql = "INSERT INTO post (naslov, datum, sadrzaj) VALUES (:naslov:, :datum:, :sadrzaj:)";
	var_dump($varijable);
	var_dump($_POST);
	var_dump($_GET);

		

	$result = $connection->execute($phql, array(
		'naslov' => $varijable->naslov,
		'datum' => $varijable->datum,
		'sadrzaj' => $varijable->sadrzaj

		));

} );


// $app->post('/api/post2', function () use ($app, $connection){

// 	$result = $connection->execute()




// });



$app->delete('/api/posts/{id:[0-9]+}', function($id) use ($app, $connection){

	//$phql = "DELETE FROM post WHERE id = ";
	$status = $connection->delete(
		"post",
		"id=" . $id);
});



//Error handler (when page is not found)
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo 'What is love, baby dont hurt me!';
});

$app->handle();



