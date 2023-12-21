<?php 
    if (!isset($_SESSION['user'])) {
        header("location:login.php");  
    }else{
        if (user()['level']!='admin') {
            header("location:index.php");  
        }
    }
?>