<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 16.02.2015
 * Time: 11:58
 */
namespace Model\Model;

class Model {

    public $prefix = 'my_';
    public $db = null;

    /** SQL query string
     * @var string
     */
    public $query = '';

    public $table_full_name = '';

    public function __construct($table){

        $dsn = 'mysql:dbname=myFrame;host=127.0.0.1';
        $user = 'root';
        $password = 'root_access';

        $this->table_full_name = strtolower($this->prefix.$table);

        try {
            $this->db = new \PDO($dsn, $user, $password);
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

    public function select($fields){
        $this->query .= "SELECT $fields ";
        return $this;
    }

    public function from($table=null){
        $table = (!empty($table) ? strtolower($this->prefix.$table) : $this->table_full_name);
        $this->query .= "FROM $table ";
        return $this;
    }

    public function where($conditions){
        $this->query .= "WHERE $conditions ";
        return $this;
    }

    public function limit($count, $offset = null){
        if (!empty($offset)){
            $this->query .= "LIMIT $offset,$count";
        } else {
            $this->query .= "LIMIT $count";
        }
        return $this;
    }

    public function exec(){
        $statement = $this->db->prepare( $this->query);
        $statement->execute(); //array(':name' => "Jimbo")
        return $statement->fetchAll();
    }


} 