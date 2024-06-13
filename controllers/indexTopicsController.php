<?php
$topicQuery = "SELECT * from topics where IsActive = 1";
$topics = $conn->query($topicQuery)->fetchAll();
$resultPerPage = 4;
$totalResult = count($topics);
$totalPages = ceil($totalResult / $resultPerPage);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startResult = ($currentPage - 1) * $resultPerPage;
$currentRecords = array_slice($topics, $startResult, $resultPerPage);
?>