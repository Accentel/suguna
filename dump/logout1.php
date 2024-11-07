<?php 

session_start();

session_destroy();

session_unset();

header('Location:orglogin1.php?message=successfully logged out');



?>