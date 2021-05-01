<?php
$name = $_POST["name"];
$phone = $_POST["phone"];
$message = $_POST["message"];

$db = mysqli_connect("localhost", "root", "000000", "mysql");
$query = "INSERT INTO form_data (name, phone, message) VALUES ('$name', '$phone', '$message')";
mysqli_query($db, $query);

echo "Thanks, $name!. Your message was submitted successfully!";

?>