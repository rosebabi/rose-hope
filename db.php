<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "login"; // Change this to your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($results) == 1) {
      session_start();
      $_SESSION['username'] = $username;
      header("Location: hp.php");
    }else {
      echo "Invalid username or password";
    }
}


if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


    $sql2 = "INSERT INTO login (email, password) VALUES ('$email', '$password2')";
    $result2 = mysqli_query($conn, $sql2);

    if ($result2) {
        // Sign up successful
        session_start();
        $_SESSION['username'] = $username2;
        header("Location: index.html");
        exit();
    } else {
        // Sign up failed
        echo "Error: " . mysqli_error($conn);
    }

}

mysqli_close($conn);
?>
