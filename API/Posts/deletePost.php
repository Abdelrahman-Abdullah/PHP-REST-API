<?php
header("Access-Control-Allow-Origin: *"); // Define Who Can Get The Data From My API
header("Content-Type: application/json"); // Type Of Content We Need
header("Access-Control-Allow-Methods: DELETE"); // Define Method

require_once "../../Configration/DatabaseConnection.php";
require_once "../../Models/Post.php";

// Create Instance From a Class Post
$post = new Post(DatabaseConnection::Connect());

// To Get The Data We Posted IT and Turn it from Json Object to Normal Object
$dataDeleted = json_decode(file_get_contents("php://input"));

// Check If There Are Data
if (! empty($dataDeleted)):

    $data['id']  = Post::Validate($dataDeleted->id); // Data To Be Deleted From Database
    if($post->deletePost($data)):
        print_r(json_encode(['Message' => 'Post Deleted']));
    else:
        print_r(json_encode(['Message' => 'Error Happened']));
    endif;
else:
    echo "Can't Delete Empty Post";
endif;