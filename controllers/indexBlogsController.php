<?php
$blogsAdmin = vratiBlogove();
$blogsQuery = "SELECT b.id as blogId, b.blogTitle as title, b.blogContent as blog, b.UserId as userId, u.FirstName as firstName, u.LastName as lastName, 
                u.username, b.TopicId as topicId, t.Topic, b.CreatedAt as published, b.Image as image, b.Views as views
        from blogs as b 
        inner join users as u on b.UserId = u.Id 
        inner join topics as t on b.TopicId = t.Id
        WHERE b.UserId = :userId and b.IsActive = 1
        ORDER By b.Id";
$stmt = $conn->prepare($blogsQuery);
$stmt->execute([
        ":userId" => $_SESSION['user']->userId
]);
$blogs= $stmt->fetchAll();
$blogsPerPage = 4;
$totalBlogs = count($blogs);
$totalPages = ceil($totalBlogs / $blogsPerPage);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startBlog = ($currentPage - 1) * $blogsPerPage;
$currentRecords = array_slice($blogs, $startBlog, $blogsPerPage);

$totalBlogsAdmin = count($blogsAdmin);
$totalPagesAdmin = ceil($totalBlogsAdmin / $blogsPerPage);

$currentRecordsAdmin = array_slice($blogsAdmin, $startBlog, $blogsPerPage);
?>