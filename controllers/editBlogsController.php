<?php
$errors = [];
$topicQuery = "SELECT * from topics";
$topics = $conn->query($topicQuery)->fetchAll();
$blogsQuery = "SELECT b.id as blogId, b.blogTitle as title, b.blogContent as blog, b.UserId as userId, u.FirstName as firstName, u.LastName as lastName, 
                    u.username, b.TopicId as topicId, t.Topic as topic, b.CreatedAt as published, b.Image as image, b.Views as views
            from blogs as b 
            inner join users as u on b.UserId = u.Id 
            inner join topics as t on b.TopicId = t.Id
            WHERE b.id = :blogId";
$stmt = $conn->prepare($blogsQuery);
$idBlog = $_GET['blogId'];
$stmt->execute([
    ":blogId" => $idBlog
]);
$blog = $stmt->fetch();
$image_path = $blog->image;
if (isset($_POST['btnSubmit'])) {
    $blogId = $_POST['blogId'];
    $blogTitle = $_POST['blogTitle'];
    $blogContent = $_POST['blogContent'];
    $topic = $_POST['topicId'];
    $image = $_FILES['image'];
    
        
        if (isset($image) && $image['size'] > 0) {
            $image_name = $image['name'];
            $image_tmp = $image['tmp_name'];
            $image_path = "../../assets/img/" . $image_name;
            move_uploaded_file($image_tmp, $image_path);
            $updateProductQuery = "UPDATE blogs SET blogTitle = :blogTitle, blogContent = :blogContent, Image = :image, TopicId = :topic_id WHERE Id=:blogId";
            $stmt = $conn->prepare($updateProductQuery);
            $stmt->bindParam(":blogId", $blogId);
            $stmt->bindParam(":blogTitle", $blogTitle);
            $stmt->bindParam(":topic_id", $topic);
            $stmt->bindParam(":blogContent", $blogContent);
            $stmt->bindParam(":image", $image_path);
            $stmt->execute();
        }
        else{
            $updateProductQuery = "UPDATE blogs SET blogTitle = :blogTitle, blogContent = :blogContent, TopicId = :topic_id WHERE Id=:blogId";
            $stmt = $conn->prepare($updateProductQuery);
            $stmt->bindParam(":blogId", $blogId);
            $stmt->bindParam(":blogTitle", $blogTitle);
            $stmt->bindParam(":topic_id", $topic);
            $stmt->bindParam(":blogContent", $blogContent);
            $stmt->execute();
        }


        

        header("Location:" . explode("?", $_SERVER["HTTP_REFERER"])[0] . "?blogId=" . $_POST['blogId'] . "&success=Uspesno editovanje proizvoda" . $_POST['blogId']);}

?>