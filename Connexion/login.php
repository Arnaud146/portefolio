
<?php
session_start();
include "db_connect.php";


if (isset($_POST['user']) && isset ($_POST['pass'])) {
    function validate($data){
        $data = trim ($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $user = validate($_POST['user']);
    $pass = validate($_POST['pass']);

    if(empty($user)) {
        header("Location: connexion.php?error= User Name is required");
        exit();
    } else if (empty($pass)){
        header("Location: connexion.php?error= password is required");
        exit();
    } else {

       $sql = "SELECT * FROM login WHERE user = '$user' AND pass = '$pass'";
       
       $result = mysqli_query($conn, $sql);

       if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['user'] === $user && $row['pass'] === $pass) {
            $_SESSION['user'] = $row['user'];
            $_SESSION['id'] = $row['id'];
            header("Location: /projet_fil");
            exit();
        } else {
            header("Location: connexion.php?error= User ou mdp incorrecte");
        exit();
        }
       } else {
        header("Location: connexion.php?error= User ou mdp incorrecte");
        exit();
       }

    }
} else {
    header("Location: connexion.php");
    exit();
}
   

?>