<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?php 
    if (isset($_SESSION['user']))
    {
        echo "Vous connectez en tant qu'Admin";
    } else {
        ?>
        <div class="login-box">
  <h2>Login</h2>
  <form method="POST" action="login.php">
    <?php if (isset($_GET['error'])) {?> 
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <div class="user-box">
      <input type="text" name="user" >
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="pass" >
      <label>Password</label>
    </div>
    
      <span></span>
      <span></span>
      <span></span>
      <span></span>
     <button name="submit">Submit</button> 
    </a>
  </form>
</div>
    }
    

</body>
</html>


<?php  } ?>