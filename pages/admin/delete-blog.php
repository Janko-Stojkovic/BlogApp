<?php
include("../../config/connection.php");
include "../../config/session.php";

    if(isset($_GET['blogId'])){
        try{
            $query = "UPDATE blogs SET IsActive = 0 WHERE `Id`=:idBlog";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":idBlog",$_GET['blogId']);
            $stmt->execute();
            header("Location:".explode("?",$_SERVER["HTTP_REFERER"])[0]."?success=Uspesno brisanje proizvoda". $_GET['blogId']);
        }
        catch(PDOException $ex){
            header("Location:".explode("?",$_SERVER["HTTP_REFERER"])[0]."?error=Doslo je do greske prilikom brisanja");
        }
    }
    else{
        http_response_code(404);
        echo "<h1>PAGE NOT FOUND</h1>";
    }
?>
        