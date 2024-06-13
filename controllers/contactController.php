<?php
$errors = [];
if (isset($_POST["btnSubmitForm"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phoneNumber = $_POST["number"];
  $message = $_POST["message"];
if(!trim($name)){
  $errors["name"] = "Name field can't be empty";
}
else{
  $reName = "/^[A-Z][a-z]{2,}(\s[A-Z][a-z]{2,})+$/";
if(!preg_match($reName,$name)){
  $errors["name"] = "Name is not valid (First name plus Last name)";
}
}
if(!trim($email)){
  $errors["email"] = "Email field can't be empty";
}
else{ 
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $errors["email"] = "Email is not valid";  
}
}
if(!trim($phoneNumber)){
  $errors["number"] = "Number field can't be empty";
}
else{
  $reNumber = "/^06[0-9]\/[0-9]{3,4}\-[0-9]{3,4}$/";
  if(!preg_match($reNumber,$phoneNumber)){
    $errors["number"] = "Number is not valid";
  } 
}
if(!trim($message)){
  $errors["message"] = "Message field can't be empty";
}
else{
  $reMessage = "/^[\s\S]{4,200}$/";
  if(!preg_match($reMessage,$message)){
    $errors["message"] = "Message is not valid";
  }
}

if(count($errors) != 0){
echo "";
}
else{
$errors["success"] = "The message was sent successfully.";
$insertReportQuery = "INSERT INTO contacts (fullName, email, phoneNumber, report) 
VALUES (:fullName,:email,:phoneNumber,:message)";
$stmt = $conn->prepare($insertReportQuery);
$stmt->execute([
":fullName"=>$name,
":email"=>$email,
":phoneNumber"=>$phoneNumber,
":message"=>$message,
]);
}
}
?>