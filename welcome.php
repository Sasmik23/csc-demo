<html>

<head>
<link rel="stylesheet" type="text/css" href="styles.css"/>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function () {

//  $.post("https://wd.comsci.club/api/kv.php?key=mikcount", {
  //value: 0
//});

	$.get("https://wd.comsci.club/api/kv.php?key=mikcount", function(data){
		var visitorCount = parseInt(data);
		$("#visitor-count").html(visitorCount);
		$.post("https://wd.comsci.club/api/kv.php?key=mikcount", {
		value: visitorCount+1
	});
	});
});
</script>
</head>
<body>

<h1 style = "font-size:300%;color:rgb(240, 240, 200);text-align:center;">
This is a Gif viewing page for your viewing pleasure
</h1>

<h1 style = "color:white"> visitor count : <span id = "visitor-count"></span> </h1>
<img id ="image"> <br><br>
<button onclick="myFunction()" class = "center">New Gif</button>
<h2 style = "color:white; text-align: center;"> Feedback form </h2>
<form  style = "color:white; text-align: center;" action = "index.php" method = "post">
Name: <input type = "text" name = "name"> <br><br>
Class: <input type = "text" name = "class"> <br><br>
Feedback: <input type = "text" name = "feedback"> <br><br>
<input type = "submit" name="submit">
</form>

<?php
if (isset($_POST["submit"])) {
$servername = "localhost";
$username = "id6426726_sasmik23";
$password = "password";
$dbname = "id6426726_mikdatabase";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
$name = $_POST["name"];
$class = $_POST["class"];
$feedback = $_POST["feedback"];
echo "<p style= 'color:white;'>Thank you ". $name . " for your feedback </p>";
$sql = " INSERT INTO feedback (name,class,feedback)
VALUES ('$name', '$class', '$feedback')";
if ($conn->query($sql) === TRUE) {
echo "<p style ='color:white;'> New record created successfully</p>";}
else {
echo "Error: " . $sql . "<br>" . $conn->error;}
$conn->close();
}
?>
</body>
</html>
