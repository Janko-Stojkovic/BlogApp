<?php
$errors = [];
$rolesQuery = "SELECT * from roles";
$roles = $conn->query($rolesQuery)->fetchAll();
$usersQuery = "SELECT u.id, u.username, u.email, u.password, u.RoleId as idRole, r.Id from
users as u join roles as r on u.RoleId = r.Id WHERE u.id = :id";
$idUser = $_GET['userId'];
$stmt = $conn->prepare($usersQuery);
$stmt->bindParam(":id", $idUser);
$stmt->execute();
$user = $stmt->fetch();
if (isset($_POST['btnSubmit'])) {
    try{
        $userId = $_POST['userId'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $confirmPassword = $_POST['confirmPassword'];
        $email = $_POST['email'];
        if ($_POST['confirmPassword'] != $_POST['password']) {
            $errors['confirmPassword'] = "Passwords do not match";
            header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?userId=" . $userId . "&error=Doslo je do greske kod editovanja korisnika" . $userId);
        } else if (!trim($password)) {
            $errors['password'] = "Password field can`t be empty";
            header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?userId=" . $userId . "&error=Doslo je do greske kod editovanja korisnika" . $userId);
        }
        if (count($errors) == 0) {
            $query = "";
            if (isset($password) && !trim($password)) {
                $query = "UPDATE users SET username = :username, password = :password, email = :email WHERE id = :id";
            } else {
                $query = "UPDATE users SET username = :username, email = :email WHERE id = :id";
            }
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $userId);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);            
            if (isset($password) && !trim($password)) {
                $stmt->bindParam(":password", $password);
            }
            $stmt->execute();
            $errors['success'] = "User is successfully updated";

            header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?userId=" . $userId . "&success=Uspesno editovanje korisnika" . $userId);
        }
    }
    catch(PDOException $ex){
        header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?userId=" . $userId . "&error=Doslo je do greske kod editovanja korisnika" . $userId);

    }
}
?>