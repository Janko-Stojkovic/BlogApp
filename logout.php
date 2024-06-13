<?php
    include "config/session.php";

    $_SESSION["user"] = NULL;
    
    if($_SERVER["REQUEST_URI"] == "/sajt/pages/admin"){
        redirect("../client/index.php");
    }
    else{
        redirect("index.php");
    }
?>