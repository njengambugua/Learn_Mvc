<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Role</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="error">
    <p><?php echo $_SESSION['error'] ?></p>
  </div>
  <form method="post" action="controllers/user/user_proc.php">
    <!-- <div class="role">
      <label>Role:</label>
      <select name="role">
        <option selected>Choose role</option>
        $roles = array('User', 'Admin');

        foreach ($roles as $role) {
          $selected = ($obj->roles == $role) ? 'selected' : '';
          echo "<option value='$role' $selected>$role</option>";
        }
      </select>
    </div> -->
    <div>
      <label name="username">Username:</label>
      <input type="text" name="username">
    </div>
    <div>
      <label>Enter password:</label>
      <input type="password" name="password" id="password">
    </div>
    <input type="submit" name="action" id="button" value="Login">
    <span>
      <label for="">Don't have an account?</label>
      <a href="./php/register.php">Sign Up</a>
    </span>
  </form>
</body>

</html>