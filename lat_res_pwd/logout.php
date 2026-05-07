<?php
session_start();
session_unset();
session_destroy();

// kirim status ke login
header("Location: login.php?logout=success");
exit;
?>