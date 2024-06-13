<?php
$totalViewsQuery = "SELECT sum(blogs.Views) as totalViews
FROM blogs";
$stmt = $conn->prepare($totalViewsQuery);
$stmt->execute();
$totalViews = $stmt->fetch(PDO::FETCH_ASSOC);
$usersQuery = "SELECT * from users";
$users = $conn->query($usersQuery)->fetchAll();
$blogQuery = "SELECT * from blogs";
$blogs = $conn->query($blogQuery)->fetchAll();
$infoBoxes = [
    [
        "value" => count($blogs),
        "text" => "Total number of blogs",
        "colorClass" => "bg-success",
        "icon" => "fa fa-blog"
        
    ],
    [
        "value" => $totalViews['totalViews'],
        "text" => "Total views",
        "colorClass" => "bg-info",
        "icon" => "fas fa-solid fa-eye"
    ],
    [
        "value" => count($users),
        "text" => "Number of registered users",
        "colorClass" => "bg-warning",
        "icon" => "fas fa-user-plus"
    ]
    
];
?>