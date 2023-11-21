<?php
    session_start();
    unset($_SESSION['opdpatientid']);
    //unset($_SESSION['doc_number']);
    session_destroy();

    header("Location: his_pat_logout.php");
    exit;
?>