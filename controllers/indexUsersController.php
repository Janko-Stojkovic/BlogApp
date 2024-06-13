<?php
$usersQuery = "SELECT u.Id, u.username, u.email, u.password, r.RoleName,
    u.CreatedAt from users as u inner join roles as r on u.RoleId = r.Id WHERE u.IsActive = 1";
    $users = $conn->query($usersQuery)->fetchAll();
    $resultPerPage = 4;
    $totalResult = count($users);
    $totalPages = ceil($totalResult / $resultPerPage);
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $startResult = ($currentPage - 1) * $resultPerPage;
    $currentRecords = array_slice($users, $startResult, $resultPerPage);
?>