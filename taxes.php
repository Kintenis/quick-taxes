<?php

include_once 'config.php';

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $db->connect_error;
    exit();
}

echo "Metai: " . $_GET["year"] . "<br>";
echo "Mėnesis: " . $_GET["month"] . "<br>";
echo "Karštas WC: " . $_GET["hot-wc"] . "<br>";
echo "Šaltas WC: " . $_GET["cold-wc"] . "<br>";
echo "Karštas Virt.: " . $_GET["hot-kitchen"] . "<br>";
echo "Šaltas Virt.: " . $_GET["cold-kitchen"] . "<br>";
echo "Elektra: " . $_GET["electricity"] . "<br>";

$sql = "SELECT * FROM counter_data ORDER BY f_id DESC LIMIT 1";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_all($query);

echo '<pre>';
var_dump($data);
