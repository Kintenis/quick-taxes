<?php

include_once 'config.php';

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $db->connect_error;
    exit();
}

echo "Metai: " . $_POST["year"] . "<br>";
echo "Mėnesis: " . $_POST["month"] . "<br>";
echo "Karštas WC: " . $_POST["hot-wc"] . "<br>";
echo "Šaltas WC: " . $_POST["cold-wc"] . "<br>";
echo "Karštas Virt.: " . $_POST["hot-kitchen"] . "<br>";
echo "Šaltas Virt.: " . $_POST["cold-kitchen"] . "<br>";
echo "Elektra: " . $_POST["electricity"] . "<br>";

$sql = "SELECT * FROM counter_data ORDER BY f_id DESC LIMIT 1";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_all($query);

echo '<pre>';
var_dump($data);
