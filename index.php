
<?php
$name = $_POST["name"];
$mobileregex = "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/";

$success_message = "Thanks, $name!. Your message was submitted successfully!";
$error_message = "* There was an error with your submition. Please try again.";

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  if(preg_match($mobileregex, $phone) == true ) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $db = mysqli_connect("localhost", "root", "000000", "mysql");
      $query = "INSERT INTO form_data (name, phone, email, message) VALUES ('$name', '$phone', '$email, '$message')";
      mysqli_query($db, $query);

      echo $success_message;
    } else {
      echo "Wrong email form! ".$error_message;
    }
  } else {
    echo "Wrong phone number form!".$error_message;
  }
}






?>