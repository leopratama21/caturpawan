<?php 
    if (isset($_SESSION['user'])) {
        if (user()['level']=='admin') {
            header("location:admin.php");  
        }
    }
?>