<?php
session_start();

if (isset($_SESSION['id']) && isset ($_SESSION['user'])){
    ?>


<h1>Espace Admin</h1>
<a href="./connexion/logout.php">Logout</a>
<?php 
} else {
    header("Location: ./Connexion/connexion.php");
            exit();
}
 ?>