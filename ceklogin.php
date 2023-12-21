<?php 
    if (isset($_SESSION['user'])) {
        if (user()['level']!='user') {
            header("location:admin.php");  
        }
        if (user()['level']!='admin') {
            header("location:index.php");  
        }
    }
?>