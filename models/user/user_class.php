<?php
include('userDBO.php');

class User
{
  public $username;
  public $password;
  public $sql;
  public $stmt;
  public $lastInsertId;
  public $error;
  public $userObject;
  public $obj;
  public $data;
  public $numRows;

  public function __construct()
  {
    $this->userObject = new UserDBO;
    $this->lastInsertId = $this->userObject->lastInsertId;
    $this->error = $this->userObject->error;
  }

  function setObj($obj)
  {
    $this->obj = new stdClass;
    $this->obj->id = $obj->id;
    $this->obj->username = $obj->username;
    $this->obj->password = $obj->password;
  }

  function getObj()
  {
    return $this->obj;
  }

  function validate($obj)
  {
    foreach ($obj as $key => $value) {
      if (empty($value)) {
        $this->error = "The $key field is required";
        return false;
      } elseif (preg_match("/[0-9]/", $obj->username)) {
        $this->error = "Name can only contain letters";
        return false;
      } elseif (strlen($obj->password) < 7) {
        $this->error = "Password should have at least eight characters";
        return false;
      } elseif (!preg_match("/[A-Z]/", $obj->password)) {
        $this->error = "Password should have at least one uppercase letter";
        return false;
      } elseif (!preg_match("/[0-9]/", $obj->password)) {
        $this->error = "Password should at least have one digit";
        return false;
      } else {
        return true;
      }
    }
  }

  function create($obj)
  {
    $this->setObj($obj);
    $this->getObj();
    if ($this->validate($obj)) {
      $this->userObject->insert($obj);
      $this->lastInsertId = $this->userObject->lastInsertId;
      return true;
    } else {
      $this->error = $this->userObject->error;
      return false;
    }
  }

  function retrieve($obj)
  {
    $this->setObj($obj);
    $this->getObj();
    if ($this->userObject->select($obj)) {
      $this->data = $this->userObject->res;
      $this->numRows = $this->userObject->numRows;
      return true;
    } else {
      $this->error = $this->userObject->error;
      return false;
    }
  }

  function edit($obj, $id)
  {
    $this->setObj($obj);
    $this->getObj();
    if ($this->validate($obj)) {
      $this->userObject->update($obj, $id);
      return true;
    } else {
      $this->error = $this->userObject->error;
      return false;
    }
  }

  function remove($id)
  {
    if ($this->userObject->delete($id)) {
      return true;
    } else {
      $this->error = $this->userObject->error;
      return false;
    }
  }
}
