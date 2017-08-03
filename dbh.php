<?php

//Connect to database using PDO
$dsn = 'mysql:host=teaneckcinemascom.startlogicmysql.com;dbname=eps_database';
$username = 'teaneckcinemas';
$password = '!Railroad103!';

try
{
    $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e)
{
    $error_message = $e->getMessage();
    echo '<p>Not connected to database</p>';
    exit();
}

?>
