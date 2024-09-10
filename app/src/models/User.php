<?php
class User {
    private $db;

    public function __construct($db) {
        if($this->$db == null) {
            $this->db = $db;
        }
    }

    public function getUserById(string| int $id) {
        if(is_string($id)){
            $id = (int)$id;
        }
        $stmt = $this->db->prepare("SELECT * FROM it_creator.users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
}