<?php

class Post
{
    private $PDO;
    private $err;
    private $tableName = "posts";

    function __construct($PDO)
    {
        $this->PDO = $PDO;
    }

    // Methods To Secure
    public function getErr(){return $this->err;}
    public static function Validate($data)
    {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = trim($data);
        return $data;
    }

    // CRUD Methods
    public  function  Read()
    {
        $Query = "SELECT * , cat_name
                  FROM {$this->tableName} P
                  LEFT JOIN categories C 
                  ON P.post_category = C.cat_id";

        try {

            $stat = $this->PDO->prepare($Query);
            $stat->execute();
           $result = $stat->fetchAll(PDO::FETCH_ASSOC);
            if ($result){
                return $result;
            }else{
                $this->err = true;
            }
        } catch (PDOException $e){
             echo "Error Happened {$e->getMessage()}";
        }

    }

    public function ReadOne($id)
    {
        $Query = "SELECT * , cat_name
                  FROM {$this->tableName} P
                  LEFT JOIN categories C 
                  ON P.post_id = C.cat_id
                  WHERE P.post_id = ?";

        try {

            $stat = $this->PDO->prepare($Query);
             $x = $stat->execute([$id]);
            $result = $stat->fetch(PDO::FETCH_ASSOC);
            if ($result){
                return $result;
            }else{
                $this->err = true;
            }
        }catch (PDOException $e){
            echo "Error Happened {$e->getMessage()}";
        }
    }

    public function createPost($data)
    {
        $Query = "INSERT INTO {$this->tableName} 
                  SET posts.post_title    = :title ,
                      posts.post_body     = :body  ,
                      posts.post_category = :category";
        try {
            $stat = $this->PDO->prepare($Query);
            return (bool) $stat->execute($data); // To Return Ture If IT Added And Vica Verse

        }catch (PDOException $e)
        {
            echo "Error Happened {$e->getMessage()}";
        }
    }

    public function updatePost($data){
        $Query = "UPDATE {$this->tableName}
                  SET   posts.post_title    = :title ,
                        posts.post_body     = :body  ,
                        posts.post_category = :category
                  WHERE posts.post_id       = :id";
        try {
            $stat = $this->PDO->prepare($Query);
            return (bool) $stat->execute($data); // To Return Ture If IT Updated And Vica Verse

        }catch (PDOException $e)
        {
            echo "Error Happened {$e->getMessage()}";
        }

    }

    public function deletePost($id){
        $Query = "DELETE FROM {$this->tableName}
                  WHERE posts.post_id = :id";
        try {
            $stat = $this->PDO->prepare($Query);
            return (bool) $stat->execute($id); // To Return Ture If IT Updated And Vica Verse

        }catch (PDOException $e)
        {
            echo "Error Happened {$e->getMessage()}";
        }
    }

}

