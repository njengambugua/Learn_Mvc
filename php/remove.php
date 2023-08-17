<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/remove.css">
</head>

<body>
  <?php include('dashboard.php') ?>
  <article class="del_page">
    <div class="main_cont">
      <form action="../controllers/user/user_proc.php" method="post">
        <h2>Confirm Delete Account</h2>
        <input type="hidden" name="id" value="<?php echo $_SESSION['userdata']->id ?>">
        <div>
          <label name="username">Username:</label>
          <input type="text" name="username" value="<?php echo $_SESSION['userdata']->username ?>">
        </div>
        <input type="submit" name="action" value="Remove" id="submit">
      </form>
    </div>
  </article>
</body>

</html>