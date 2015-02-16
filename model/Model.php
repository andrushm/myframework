<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 16.02.2015
 * Time: 11:58
 */

class Model {

    public $prefix = 'my_';
    public $db = null;

    public $table_full_name = '';

    public function __construct($table){

        $dsn = 'mysql:dbname=myFrame;host=127.0.0.1';
        $user = 'root';
        $password = 'root_access';

        $this->table_full_name = strtolower($this->prefix.$table);

        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'DB connect error: ' . $e->getMessage();
        }

    }

    public function find(){
        $statement = $this->db->prepare("select id, name from $this->table_full_name"); // where name = :name
        $statement->execute(); //array(':name' => "Jimbo")
        return $statement->fetchAll(); // Use fetchAll()
//        return $this->table_full_name;
    }

} 