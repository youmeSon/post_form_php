
<?php
$name = $_POST["name"];
$respond_message = "";
$mobileregex = "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/";

$success_message = "Thanks, $name!\nYour message was submitted successfully!";
$error_message = "* There was an error with your submission. Please try again.";

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  if(preg_match($mobileregex, $phone) == true ) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $db = mysqli_connect("localhost", "root", "000000", "mysql");
      $query = "INSERT INTO form_data (name, phone, email, message) VALUES ('$name', '$phone', '$email', '$message')";
      mysqli_query($db, $query);

      $respond_message = $success_message;
    } else {
      $respond_message = "Invalid email address!".$error_message;
    }
  } else {
    $respond_message =  "Invalid phone number!".$error_message;
  }
}

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Contact form</title>
  </head>
  <body>
    <div class="form_wrapper">
      <h1 class="form__title">Contact Form</h1>
      <img class="respond__img" src="img/great.jpg" alt="thanks">
      <div class="form__output">
			  <p id="response"><?= $respond_message?></p>
      </div>
    </div>
  </body>
</html>