<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "site";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

// Vérifiez la connexion
if (!$conn) {
    exit("La connexion a échoué: " . mysqli_connect_error());
}

if (isset($_POST['name']) && isset($_POST['sujet']) && isset($_POST['email']) && isset($_POST['message'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$name = validate($_POST['name']);
	$sujet = validate($_POST['sujet']);
	$email = validate($_POST['email']);
	$message = validate($_POST['message']);

	if (empty($message) || empty($name)) {
		header("Location: index.html");
       var_dump($_POST);
    } else {
    
		$sql = "INSERT INTO contact (name, sujet, email, message) 
                VALUES('$name','$sujet', '$email', '$message')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Your message was sent successfully!";
		}else {
			echo "Your message could not be sent!";
		}
	}

} else {
	header("Location: index.html");
}
?>
