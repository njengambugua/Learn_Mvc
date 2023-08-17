<?php
include('../../models/user/user_class.php');

$user = new User;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $obj = (object)$_POST;
  $id = $obj->id;
  if ($_POST['action'] == 'Register') {
    if ($user->create($obj)) {
      $_SESSION['lastId'] = $user->lastInsertId;
      $_SESSION['userdata'] = $obj;
      header('Location: ../../php/dashboard.php');
    } else {
      $_SESSION['error'] = $user->error;
      header("Location: ../../php/register.php?error=" . $_SESSION['error']);
    }
  }

  if ($_POST['action'] == 'Login') {
    if ($user->retrieve($obj)) {
      if ($user->numRows) {
        $_SESSION['userdata'] = $user->data;
        header('Location: ../../php/dashboard.php');
      } else {
        header("Location: ../../index.php");
      }
    } else {
      $_SESSION['error'] = $user->error;
    }
  }

  if ($_POST['action'] == 'Edit') {
    if($user->edit($obj, $id)){
      echo "Updated successfully";
      print_r($obj);
    } else{
      echo "Record not updated";
    }
  }

  if ($_POST['action'] == 'Remove') {
    if($user->remove($id)){
      header('Location: ../../logout.php');
    } else{
      echo "Record not deleted";
    }
  }
}
