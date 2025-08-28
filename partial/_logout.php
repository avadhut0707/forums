<?php

session_start();
echo "logout button";
session_destroy();
header('location:/forum/index.php');
exit;