<?php
$errors=[];

$topicQuery = "SELECT * from topics";
$topics = $conn->query($topicQuery)->fetchAll();
if(isset($_POST['btnSubmit'])){
$blogTitle = $_POST['blogTitle'];
$topicId = $_POST['topicId'];
$blogContent = $_POST['blogContent'];
$image = $_FILES['image'];
$blogTitleQuery = "SELECT * from blogs WHERE blogTitle = :blogTitle";
$stmt = $conn->prepare($blogTitleQuery);
$stmt->execute(
[
":blogTitle" => $blogTitle
]
);
$blogTitleTaken = $stmt->fetch();
if($blogTitleTaken){
    $errors['blogTitle'] = "Blog title is already taken";
}
else if(!trim($blogTitle)){
    $errors['blogTitle'] = "Blog title field can`t be empty";
}

if(!isset($topicId)){
    $errors['topicId'] = "You must select one of the topics";
}

if(!isset($image)){
    $errors['image'] = "You must choose image to upload";
}
else if($image['size'] > 100000000){
    $errors['image'] = "Your image is larger than 100MB";
}

if (count($errors) == 0) {
    // Move uploaded file
    $targetDir = "../../assets/img/";
    $targetFile = $targetDir . basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        // Insert blog into the database
        $errors['success'] = "You created blog successfully";
        $blogInsertQuery = "INSERT into blogs (blogTitle, blogContent, topicId, UserId, Image, CreatedAt, IsActive) 
                            values (:blogTitle, :blogContent, :topicId, :UserId, :Image, :CreatedAt, :IsActive)";
        $stmt = $conn->prepare($blogInsertQuery);
        $stmt->execute([
            "blogTitle" => $blogTitle,
            "blogContent" => $blogContent,
            "topicId" => $topicId,
            "UserId" => $_SESSION['user']->userId,
            "Image" => $image['name'],
            "CreatedAt" => date('Y-m-d H:i:s'),
            "IsActive" => 1
        ]);
    } else {
        $errors['image'] = "Failed to upload image";
    }
}
}
?>