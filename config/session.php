<?php
session_start();
function authorize()
{
    if (!isset($_SESSION["user"])) {
        redirect("../../index.php");
    }
}

function authorizeAdmin(){
    if($_SESSION["user"]->roleId != 1){
        redirect("../../pages/admin/dashboard.php");
    }
}

function redirect($url)
{
    header("Location: " . $url);
}
?>