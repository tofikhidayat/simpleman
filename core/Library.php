<?php
class Library  {
    public function __construct() {
      try {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_EMULATE_PREPARES => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->db =  new PDO('mysql:host=127.0.0.1;port=3306;dbname=simpleman', 'root', '', $options);
      } catch(Exception $e) {
          die($e);
      }
    }

    public function register($email, $name, $password) {
        $valid =  "SELECT * FROM users WHERE email='$email'";
        $check =  $this->db->query($valid);
        try {
            $check =  $check->fetch(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            $check = false;
        }
        if($check) {
           return 'Email sudah terdaftar';
        } else {
            $sql =  "INSERT INTO users (name, email, password) VALUES('$email', '$name', '$password')";
            $query  = $this->db->query($sql);
            if($query) {
                $sql = "SELECT id FROM users WHERE email='$email' LIMIT 1";
                $prepare =  $this->db->query($sql)->fetch(PDO::FETCH_OBJ);
                return (object)$prepare;
            } else {
                return 'failed';
            }
        }
    }

    public function login($email) {
        $sql =  "SELECT id, password FROM users WHERE email='$email' LIMIT 1";
        try {
            $query =  $this->db->query($sql)->fetch(PDO::FETCH_OBJ);
            return (object) $query;
        } catch(Exception $e) {
            return 'failed';
        }
    }

}
