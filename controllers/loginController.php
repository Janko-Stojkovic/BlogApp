<?php
$error = "";
if(isset($_POST["btnSubmit"])){
    $userEmail = $_POST["userEmail"];
    $password = md5($_POST["password"]);
    $query = "SELECT u.Id as userId, u.FirstName as firstName, u.LastName as lastName, u.Username as username, u.Email as email, u.Password as password,
              u.ProfileImage as profileImage, u.RoleId as roleId, u.CreatedAt as createdAt, u.IsActive
              from users as u inner join roles as r on u.RoleId = r.Id
              WHERE(email = :userEmail OR userName = :userEmail) AND password = :password AND u.IsActive = :IsActive";
    $stmt = $conn->prepare($query);
    $stmt->execute(
            [
                ":userEmail" => $userEmail,
                ":password" => $password,
                ":IsActive" => 1
            ]
        );
    $user = $stmt->fetch();
    if(!$user){
        $error = "There is no user with that username or password";
    }
    else{
    $_SESSION["user"] = $user;
        header("Location:blog.php");
    }
}
if(isset($_SESSION["user"])){
    redirect("index.php");
}
?>