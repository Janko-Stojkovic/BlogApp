<?php
    include("../../config/connection.php");
    include "../../config/session.php";
    include "../../models/functions.php";

    authorizeAdmin();
    if(isset($_GET['userId'])){
        
            $query = "UPDATE users SET IsActive = 0 WHERE Id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id",$_GET['userId']);
            $stmt->execute();
            header("Location:".explode("?",$_SERVER["HTTP_REFERER"])[0]."?success=Uspesno brisanje korisnika". $_GET['userId']);
     
       
    }
    else{
        http_response_code(404);
        echo "<h1>PAGE NOT FOUND</h1>";
    }
?>
