<?php
$serverName = "localhost";
$username   = "root";
$password   = "admin";
$dbName     = "quick_taxes";
$db         = new mysqli($serverName, $username, $password, $dbName);

if ($db->connect_errno)
{
    echo "Failed to connect to MySQL: " . $db->connect_error;
    exit();
}

?>