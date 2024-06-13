<?php
$errors = [];
if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $role_id = 2;
    $IsActive = 1;
    $emailQuery = "SELECT * from users WHERE email = :email AND IsActive = 1";
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
    if(!trim($firstName)){
        $errors['firstName'] = "First Name field can`t be empty";
    }
    if(!trim($lastName)){
        $errors['lastName'] = "Last Name field can`t be empty";
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
    else{
    };
    if(count($errors)!=0){
        echo "";
    }
    else{
        $errors['success']="You registered successfully";
        $insertUserQuery = "INSERT INTO users (FirstName, LastName, username, email, password, RoleId, CreatedAt, IsActive)
        VALUES (:firstName, :lastName, :username, :email, :password, :RoleId, :createdAt, :IsActive)";
        $stmt = $conn->prepare($insertUserQuery);
        $stmt->execute([
            ":firstName"=>$firstName,
            ":lastName"=>$lastName,
            ":username" => $username,
            ":email" => $email,
            ":password" => $password,
            ":RoleId" => $role_id,
            ":createdAt" => date('Y-m-d H:i:s'),
            "IsActive" => $IsActive
        ]);
    }
}
?>