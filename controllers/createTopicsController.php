<?php
$errors = [];
if(isset($_POST['btnSubmit'])){
$topicName = $_POST['topicName'];
$topicsQuery = "SELECT * from topics where Topic = :topic and IsActive = 1";
$stmt = $conn->prepare($topicsQuery);
$stmt->execute([
":topic"=>$topicName
]);
$topicNameExists = $stmt->fetch();
if($topicNameExists){
$errors['topicName'] = "Topic name is already taken";
}
else if(!trim($topicName)){
$errors['topicName'] = "Topic name field can`t be empty";
}
if(count($errors) == 0){
$errors['success'] = "Topic is successfully added";
$topicsInsertQuery = "INSERT INTO topics (Topic, IsActive) VALUES
(:topicName, :IsActive)";
$stmt = $conn->prepare($topicsInsertQuery);
$stmt->execute([
":topicName"=> $topicName,
":IsActive"=> 1,

]);
}
}
?>