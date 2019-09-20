<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}

if(session_destroy())
{
// Redirecting To Home Page
header("Location: index.php");
}
?>