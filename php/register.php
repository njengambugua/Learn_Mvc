<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="error">
        <p><?php echo $_GET['error'] ?></p>
    </div>
    <h2>Registration Form</h2>
    <form action="../controllers/user/user_proc.php" method="post">
        <div>
            <label>Enter your preffered username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label>Create a password:</label>
            <input type="text" name="password" id="password">
        </div>
        <!-- <div>
                <label>Retype password:</label>
                <input type="text" name="repass" id="repass">
            </div> -->
        <input type="submit" name="action" value="Register" id="button">
        <span>
            <label for="">Already have an account?</label>
            <a href="../index.php">Login</a>
        </span>
    </form>
</body>

</html>