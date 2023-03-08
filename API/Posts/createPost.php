<?php
header("Access-Control-Allow-Origin: *"); // Define Who Can Get The Data From My API
header("Content-Type: application/json"); // Type Of Content We Need
header("Access-Control-Allow-Methods: POST"); // Define Method

require_once "../../Configration/DatabaseConnection.php";
require_once "../../Models/Post.php";

// Create Instance From a Class Post
$post = new Post(DatabaseConnection::Connect());

// To Get The Data We Posted IT and Turn it from Json Object to Normal Object
$dataPosted = json_decode(file_get_contents("php://input"));

// Check If There Are Data
if (! empty($dataPosted)):

    $data  = []; // Data To Be Sent To Database
    foreach ($dataPosted as $key => $value)
    {
        $data[$key] = Post::Validate($value); // Validate Data
    }
    if($post->createPost($data)):
        print_r(json_encode(['Message' => 'Post Added']));
    else:
        print_r(json_encode(['Message' => 'Error Happened']));
    endif;
else:
    echo "Can't Create Empty Post";
endif;