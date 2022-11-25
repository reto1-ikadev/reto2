<?php
require '../show_all_errors.php';
session_destroy();

setcookie('acceptCookies', null, -1, '/');
setcookie('user', null, -1, '/');
setcookie('pass', null, -1, '/'); 

header("Location: /");

exit();