<?php
$menuUserQuery = "SELECT * from menus where admin = 2 order by 'order' asc";
$menuUser = $conn->query($menuUserQuery)->fetchAll();
$menuAdminQuery = "SELECT * from menus where admin != 0 order by 'order' asc";
$menuAdmin = $conn->query($menuAdminQuery)->fetchAll();
$currentUrl = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($currentUrl);
$path = $parsedUrl['path'];
$file = basename($path);
?>