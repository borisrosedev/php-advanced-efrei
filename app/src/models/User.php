<?php
namespace App\Models;

use App\Database\Database;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';
class User {
    private $db;

    public function __construct(Database $db) {
        if($this->$db == null) {
            $this->db = $db;
        }
    }

    public function getUserById(string| int $id) {
        if(is_string($id)){
            $id = (int)$id;
        }
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM it_creator.users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    
}