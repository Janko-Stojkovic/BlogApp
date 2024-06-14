<?php
$idBlog = $_GET['blogId'];
$blogQuery = "SELECT b.id as blogId, b.blogTitle as title, b.blogContent as blog, b.UserId as userId, u.FirstName as firstName, u.LastName as lastName, 
                        u.username, b.TopicId as topicId, t.Topic, b.CreatedAt as published, b.Image as image
                from blogs as b 
                inner join users as u on b.UserId = u.Id 
                inner join topics as t on b.TopicId = t.Id
                WHERE b.id = :id and where IsActive = 1";

$stmt = $conn->prepare($blogQuery);
$stmt ->execute([
    ":id" => $idBlog
]);
$blog = $stmt->fetch();

$dateTime = new DateTime($blog->published);

$date = $dateTime->format('Y-m-d');


$updateViewsQuery = "UPDATE blogs SET Views = Views + 1 WHERE Id = :idBlog";
$stmt = $conn->prepare($updateViewsQuery);
$stmt->execute([
    ":idBlog" => $idBlog
]);


$popularBlogsQuery = "SELECT b.id as blogId, b.blogTitle as title, b.blogContent as blog, b.UserId as userId, u.FirstName as firstName, u.LastName as lastName, 
                        u.username, b.TopicId as topicId, t.Topic, b.CreatedAt as published, b.Image as image, b.Views as views
                from blogs as b 
                inner join users as u on b.UserId = u.Id 
                inner join topics as t on b.TopicId = t.Id
                ORDER By views DESC
                LIMIT 4";

$stmt= $conn->query($popularBlogsQuery);
$popularBlogs = $stmt->fetchAll();

?>