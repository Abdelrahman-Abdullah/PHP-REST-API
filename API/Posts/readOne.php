<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once "../../Configration/DatabaseConnection.php";
require_once "../../Models/Post.php";

// Create Instance From a Class Post
$post = new Post(DatabaseConnection::Connect());

// Get Data From Database;
if (isset($_GET['id']))
{
    $result = $post->ReadOne($_GET['id']);
    $err    = $post->getErr(); // Check IF There Is As Error Or Not
    if (!$err){

        $onePost['id'] = $result['post_id'];
        $onePost['title'] = $result['post_title'];
        $onePost['body'] = $result['post_body'];
        $onePost['created_at'] = $result['created_at'];
        $onePost['category'] = $result['cat_name'];
        print_r(json_encode($onePost));
    } else {
        echo "Id Not Exist";
    }
} else {
    echo "Not Found";
}