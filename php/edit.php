<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <h2>User Profile</h2>
  <form action="../controllers/user/user_proc.php" method="post">
    <div>
      <label>Enter your preffered username:</label>
      <input type="text" name="username" id="username" value="<?php echo $_SESSION['userdata']->username; ?>">
      <input type="hidden" name="id" value="<?php echo $_SESSION['userdata']->id ?>">
      <input type="hidden" name="id" value="<?php echo $_SESSION['lastId'] ?>">
    </div>
    <div>
      <label>Create a new password:</label>
      <input type="text" name="password" id="password">
    </div>
    <input type="submit" name="action" value="Edit" id="button">
  </form>
</body>
</html>