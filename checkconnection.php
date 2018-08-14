
<html>
<head>
</head>

<?php


$servername = "localhost";
$username = "id6426726_sasmik23";
$password = "password";
$dbname = "id6426726_mikdatabase";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];


if (isset($_POST["submit"])) {
  $sql= "SELECT * FROM Accounts WHERE username = $username AND password = $password";
  $result = $conn -> query($sql)

  if ($result -> num_rows > 0){
    header ("Location:https://mikhilanand.000webhostapp.com/welcome.php ");


  }

  else{

    echo "Incorrect username or password"
  }
}

if (isset(["create"])) {

$sql = "INSERT INTO Accounts (username,password)

VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {

  header ("Location:https://mikhilanand.000webhostapp.com/index.php ");
  exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





}




?>

</body>
</html>
