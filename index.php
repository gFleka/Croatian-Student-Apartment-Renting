
<?php

use Phalcon\Mvc\Micro;

$app = new Micro();

include 'restclient.php';
$api = new RestClient(array(
        'base_url' => "http://vinkovic.riteh.hexis.hr",
        'format' => "json"));

$app->get('/api/posts', function() use ($api) {

        $result = $api->get("/api/posts");
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
                        $id = $value->id;
                        $naslov = $value->naslov;
                        $datum = $value->datum;
                        //$sadrzaj = $value->sadrzaj;

                        echo "msg id:" . $id . " <h2>" . $naslov . "</h2><p>Datum:" . $datum . "</p>";
                        echo "<hr>";
                        # code...
                }

        }else echo "Greska kod api-a Kontaktirati Juresa Ivan!";


});

$app->get('/api/posts/{idx}', function($idx) use ($api) {

        $result = $api->get("/api/posts/" . $idx);
        if($result->info->http_code == 200)
        {
                /*echo "Test";
                var_dump($result->decode_response());
                echo "Test end";*/

                $results = $result->decode_response();
                foreach ($results as $key => $value) {

                        //var_dump($value);
                        $id = $value->id;
                        $naslov = $value->naslov;
                        $datum = $value->datum;
                        //$sadrzaj = $value->sadrzaj;

                        echo "msg id:" . $id . " <h2>" . $naslov . "</h2><p>Datum:" . $datum . "</p>";
                        echo "<hr>";
                        # code...
                }
        }else echo "Greska kod api-a Kontaktirati Juresa Ivan!";


});

$app->post('/api/post', function() use ($api){

        $result = $api->post("/api/post",json_encode(array('id' => '38', 'naslov' => 'SDP uuuu!', 'datum' => '1.12.2015')), array('Content-Type' => 'application/json'));
        if($result->info->http_code == 201){

        	echo "Uspjesno upisano u bazu pod id: 38";
        }

});

$app->put('/api/post/{idx}', function($idx) use ($api){

        $result = $api->put("/api/post/".$idx,json_encode(array('id' => $idx, 'naslov' => 'Neki kul id!' . $idx, 'datum' => '1.12.2011')), array('Content-Type' => 'application/json'));
        if($result->info->http_code == 201){

        	echo "Uspjesno upisano u bazu pod id:". $idx;
        }

});

$app->delete('/api/post/{idx}', function($idx) use ($api){

        $result = $api->delete("/api/post/".$idx);
        if($result->info->http_code == 201){

        	echo "Uspjesno upisano u bazu pod id:". $idx;
        }

});


$app->handle();

