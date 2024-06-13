<?php
include("../../config/connection.php");
include "../../config/session.php";
include "../../models/functions.php";
authorizeAdmin();
if (isset($_GET['topicId'])) {
    try {
        $query2 = "UPDATE blogs SET IsActive = 0 WHERE `TopicId` = :idTopic";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bindParam(":idTopic", $_GET['topicId']);
        $stmt2->execute();

        $query = "UPDATE topics SET IsActive = 0 WHERE `Id`=:idTopic";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idTopic", $_GET['topicId']);
        $stmt->execute();
        header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?success=Uspesno brisanje teme" . $_GET['topicId']);
    } catch (PDOException $ex) {
        header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?error=Doslo je do greske prilikom brisanja");
    }
} else {
    http_response_code(404);
    echo "<h1>PAGE NOT FOUND</h1>";
}
