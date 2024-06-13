<?php
$errors=[];
$rolesQuery = "SELECT * from roles";
$roles = $conn->query($rolesQuery)->fetchAll();
if(isset($_POST['btnSubmit'])){
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$role = $_POST['role'];
$image = $_FILES['image'];
$emailQuery = "SELECT * from users WHERE email = :email";
$stmt = $conn->prepare($emailQuery);
$stmt->execute(
[
":email" => $email
]
);
$userEmail = $stmt->fetch();
$usernameQuery = "SELECT * from users WHERE username = :username";
$stmt = $conn->prepare($usernameQuery);
$stmt->execute(
[
":username" => $username
]
);
$userUsername = $stmt->fetch();
if(!trim($username)){
    $errors['username'] = "Username field can`t be empty";
}
if(!trim($username)){
    $errors['username'] = "Username field can`t be empty";
}
if($userUsername){
$errors['username'] = "Username is already taken";
}
else if(!trim($username)){
$errors['username'] = "Username field can`t be empty";
}
if($userEmail){
$errors['email'] = "Email is already taken";
}
else if(!trim($email)){
$errors['email'] = "Email field can`t be empty";
}
else {
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
$errors["email"] = "Email is not valid";
}
}
if($_POST['confirmPassword'] != $_POST['password']){
$errors['confirmPassword'] = "Passwords do not match";
}
else if(!trim($password)){
$errors['password'] = "Password field can`t be empty";
}
else if(!trim($_POST['confirmPassword'])){
$errors['confirmPassword'] = "Confirm password field must match with password
field";
}
if (count($errors) == 0) {
    // Move uploaded file
    $targetDir = "../../assets/img/";
    $targetFile = $targetDir . basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        // Insert user into the database
        $insertUserQuery = "INSERT INTO users (FirstName, LastName, Username, Email, Password, ProfileImage, RoleId, CreatedAt, IsActive)
                            VALUES (:firstName, :lastName, :username, :email, :password, :profileImage, :role_id, :createdAt, :IsActive)";
        $stmt = $conn->prepare($insertUserQuery);
        $stmt->execute([
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ":username" => $username,
            ":email" => $email,
            ":password" => $password,
            ":profileImage" => $image['name'],
            ":role_id" => $role,
            ":createdAt" => date('Y-m-d H:i:s'),
            ":IsActive" => 1
        ]);

        $errors['success'] = "You registered successfully";
    } else {
        $errors['image'] = "You need to upload an image";
    }
}
else{
    echo "";
}
}
?>