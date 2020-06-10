<?php
    session_start();
    session_destroy();
    header('Location: http://localhost/EPOKA/index.php');
    exit();
?>