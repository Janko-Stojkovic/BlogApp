<?php 
$errors = [];
$topicsQuery = "SELECT * from topics where Id  = :id";
$stmt = $conn->prepare($topicsQuery);
$idTopic = $_GET['topicId'];
$stmt->execute([
    ":id" => $idTopic
]);
$topic = $stmt->fetch();
if (isset($_POST['btnSubmit'])) {
    $topicId = $_POST['topicId'];
    $topicName = $_POST['topicName'];
    $listed = isset($_POST['listed']) ? 1 : 0;
    if (!trim($topicName)) {
        $errors['topicName'] = "topic name field can`t be empty";
        header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?topicId=" . $_POST['topicId'] . "&error=topic name field empty");
    }
    if (count($errors) == 0) {
        $errors['success'] = "topic is successfully updated";
        $topicsUpdateQuery = "UPDATE topics SET Topic = :topicName WHERE Id = :id";
        $stmt = $conn->prepare($topicsUpdateQuery);
        $stmt->execute([
            ":id" => $topicId,
            ":topicName" => $topicName
        ]);
        header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?topicId=" . $_POST['topicId'] . "&success=Uspesno editovanje brenda" . $_POST['topicId']);
    }
}
?>