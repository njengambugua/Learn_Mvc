<?php
 session_start();
 if (empty($_SESSION)) {
  header("location:../index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>

<!-- <body>
  <main class="main"> -->
    <header class="header">
      <div class="logo">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_xWwaQOu8zw0ViJqLhCJcLlpYt92i3XTV8Q&usqp=CAU" alt="John's logo">
      </div>
      <div class="navigation">
        <ul class="nav_list">
          <div>
            <a href="./dashboard.php"><i class="bi bi-house"></i></a>
            <a href="./dashboard.php">
              <li>Home</li>
            </a>
          </div>
          <div>
            <a href="./edit.php"><i class="bi bi-person-circle"></i></a>
            <a href="./edit.php">
              <li>Profile</li>
            </a>
          </div>
          <div>
            <a href="./remove.php"><i class="bi bi-trash"></i></a>
            <a href="./remove.php">
              <li>Delete</li>
            </a>
          </div>
          <div>
            <a href="../logout.php"><i class="bi bi-box-arrow-right"></i></a>
            <a href="../logout.php">
              <li>Logout</li>
            </a>
          </div>
        </ul>
      </div>
      <div class="search">
        <i class="bi bi-search"></i>
        <input type="search" name="search" id="search">
      </div>
    </header>
  <!-- </main>
</body> -->

</html>