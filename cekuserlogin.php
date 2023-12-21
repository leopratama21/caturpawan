<?php 
    if (!isset($_SESSION['user'])) {
        header("location:login.php");  
    }else{
        if (user()['level']!='user') {
            header("location:admin.php");  
        }
    }
?>