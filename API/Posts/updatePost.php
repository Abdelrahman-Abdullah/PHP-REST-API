<?php
header("Access-Control-Allow-Origin: *"); // Define Who Can Get The Data From My API
header("Content-Type: application/json"); // Type Of Content We Need
header("Access-Control-Allow-Methods: PUT"); // Define Method

require_once "../../Configration/DatabaseConnection.php";
require_once "../../Models/Post.php";

// Create Instance From a Class Post
$post = new Post(DatabaseConnection::Connect());

// To Get The Data We Posted IT and Turn it from Json Object to Normal Object
$dataUpdated = json_decode(file_get_contents("php://input"));


// Check If There Are Data
if (! empty($dataUpdated)):

    $data  = []; // Data To Be Updated In Database
    foreach ($dataUpdated as $key => $value)
    {
        $data[$key] = Post::Validate($value); // Validate Data
    }
    if($post->updatePost($data)):
        print_r(json_encode(['Message' => 'Post Updated']));
    else:
        print_r(json_encode(['Message' => 'Error Happened']));
    endif;
else:
    echo "Can't Update Empty Post";
endif;