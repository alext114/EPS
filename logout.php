<?php
//destroy Session
session_start();
session_destroy();
//to the login screen
print '<script>window.location.assign("index.html");</script>';


?>
