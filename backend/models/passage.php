<?php

class Passage{
    public static $tableName = "calendar";

    public $id;
    public $passageName;
    public $passageReference;
    public $url;
    public $baseURL;
    public $date;

    function copyFromRow($row){
        $this->id =$row['id'];
        $this->passageName =$row['passageName'];
        $this->passageReference =$row['passageReference'];
        $this->url =$row['url'];
        $this->baseURL =$row['baseURL'];
        $this->date =$row['date'];
    }

    function save($db){
        if(!$this->id){
            $sql = "INSERT INTO " . Passage::$tableName . " (passageName, passageReference, url, baseURL, date) VALUES (?,?,?,?,?)";

            $stmt = $db->prepare($sql);
            $stmt->bind_param("sssss", $this->passageName, $this->passageReference, $this->url, $this->baseURL, $this->date);

            $stmt->execute();

            $this->id = $db->insert_id;
        }
    }

    function findByDate($db, $date){
        $sql = "SELECT id, passageName, date  FROM " . Passage::$tableName . " WHERE date=?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $date);
        $stmt->execute();

        $result = $stmt->get_result();
        $arr = array();
        while($row = $result->fetch_array()) {
            $arr[] =  $row;
        }
        return $arr;
    }

    function findByID($db, $id){
        $sql = "SELECT id, passageName, date FROM " . Passage::$tableName . " WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $arr = array();
        while($row = $result->fetch_array()) {
            return $row;
        }
        return $arr;
    }

    function getAll($db){
        $sql = "SELECT id, passageName, date  FROM " . Passage::$tableName;
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $arr = array();
        while($row = $result->fetch_array()) {
            $arr[] =  $row;
        }
        return $arr;
    }
}

?>