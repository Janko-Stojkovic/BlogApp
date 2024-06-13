<?php
    include("../../config/connection.php");
    include "../../config/session.php";
    include "../../models/functions.php";

    authorizeAdmin();
    if(isset($_GET['reportId'])){
        try{
            $query = "DELETE FROM `contacts` WHERE `id`=:idProduct";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":idProduct",$_GET['reportId']);
            $stmt->execute();
            header("Location:".explode("?",$_SERVER["HTTP_REFERER"])[0]."?success=Uspesno brisanje reporta". $_GET['reportId']);
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
