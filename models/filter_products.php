<?php
include "../config/connection.php";
include "functions.php";

$idsTopic = isset($_POST['idsTopic']) ? $_POST['idsTopic'] : [];

try {
    if (empty($idsTopic)) {
        $proizvodi = vratiBlogove();
    } else {
        $proizvodi = [];

        // Poveži tabele korišćenjem INNER JOIN-a
        $upit = "SELECT b.id as blogId, b.blogTitle as title, b.blogContent as blog, b.UserId as userId, b.TopicId as topicId, u.FirstName as firstName, 
                u.LastName as lastName, u.username, b.CreatedAt as published, b.Image as image, t.Topic as topic
                 from blogs as b 
                 inner join users as u on b.UserId = u.Id 
                 inner join topics as t on b.TopicId = t.Id
                 WHERE ";
    
        $whereClauses = [];
    
        // Dodaj uslove za svaki odabrani TOPIC
        if (!empty($idsTopic)) {
            $topicConditions = implode(',', array_fill(0, count($idsTopic), '?'));
            $whereClauses[] = "b.TopicId IN ($topicConditions)";
        }
    
        // Spoji sve uslove
        $upit .= implode($whereClauses);
    
        $stmt = $conn->prepare($upit);
    
        // Bindovanje parametara
        for ($i = 0; $i < count($idsTopic); $i++) {
            $stmt->bindValue($i + 1, $idsTopic[$i], PDO::PARAM_INT);
        }
    
        // Izvrši upit
        $stmt->execute();
    
        // Dohvati rezultate
        $proizvodi = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch(PDOException $exception){
    http_response_code(500);
}

echo json_encode($proizvodi);
http_response_code(200);



?>
