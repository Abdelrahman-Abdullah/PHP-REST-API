<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once "../../Configration/DatabaseConnection.php";
require_once "../../Models/Post.php";

// Create Instance From a Class Post
$post = new Post(DatabaseConnection::Connect());

// Get Data From Database;
$results = $post->Read();


// Add Data For Array And Turn it to JSON
$Posts = [];
$Posts['data'] = [];

    if (!empty($results)) :

        foreach ($results as $post)
        {
            $item = [
                'id'         => $post['post_id'],
                'title'      => $post['post_title'],
                'body'       => $post['post_body'],
                'category'   => $post['cat_name'],
                'date'       => $post['created_at']
            ];
            $Posts['data'] []= $item;
        }
        echo json_encode($Posts);
    else:
        echo "No Result";
    endif;
