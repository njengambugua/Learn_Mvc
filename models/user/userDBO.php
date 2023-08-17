<?php
include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

class UserDBO
{
  private $conn;
  public $stmt;
  public $lastInsertId;
  public $error;
  public $sql;
  public $numRows;
  public $res;
  public function __construct()
  {
    $db = new DatabaseConnection();
    $this->conn = $db->getConnection();
  }

  function insert($obj)
  {
    try {
      $this->sql = "INSERT INTO user(username, password)VALUES(:username, :password)";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':username', $obj->username);
      $this->stmt->bindParam(':password', $obj->password);
      $this->stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function select($obj){
    try {
      $this->sql = "SELECT * FROM user WHERE username=:username AND password=:password";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':username', $obj->username);
      $this->stmt->bindParam(':password', $obj->password);
      $this->stmt->execute();
      $this->numRows = $this->stmt->rowCount();
      $this->res = $this->stmt->fetch(PDO::FETCH_OBJ);
      if (!$this->res) {
        $_SESSION['error'] = 'This account does not exist';
      }else{
        $_SESSION['error'] = 'Login success';

      }
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function update($obj, $id){
    try {
      $this->sql = "UPDATE user SET username=:username, password=:password WHERE id=:id";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':id',$id);
      $this->stmt->bindParam(':username',$obj->username );
      $this->stmt->bindParam(':password',$obj->password);
      $this->stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function delete($id){
    try {
      $this->sql = "DELETE FROM user WHERE id=:id";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':id',$id);
      $this->stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
}
