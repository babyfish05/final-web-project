<?php
session_start();
session_destroy();
header("Location: /final-web-project/view/auth/login.php");
exit;
