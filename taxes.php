<?php

include_once 'config.php';

const ELECTRICITY_RATE = 0.127;   
const COLD_WATER_RATE = 1.72;
const RENT = 130;
const ACCUMULATIVE_FUND = 5.74;

$formYear = $_POST['year'];
$formMonth = $_POST['month'];
$formHotWC = $_POST['hot-wc'];
$formColdWC = $_POST['cold-wc'];
$formHotKitchen = $_POST['hot-kitchen'];
$formColdKitchen = $_POST['cold-kitchen'];
$formElectricity = $_POST['electricity'];
$formTax = $_POST['tax'];

$sql = "SELECT * FROM counter_data ORDER BY f_id DESC LIMIT 1";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_all($query);

$dbYear = $data[0][1];
$dbMonth = $data[0][2];
$dbHotWC = $data[0][3];
$dbColdWC = $data[0][4];
$dbHotKitchen = $data[0][5];
$dbColdKitchen = $data[0][6];
$dbElectricity = $data[0][7];
$dbTax = $data[0][8];

echo "Metai: " . $formYear . "<br>";
echo "Mėnesis: " . $formMonth . "<br>";
echo "Karštas WC: " . $formHotWC . "<br>";
echo "Šaltas WC: " . $formColdWC . "<br>";
echo "Karštas Virt.: " . $formHotKitchen . "<br>";
echo "Šaltas Virt.: " . $formColdKitchen . "<br>";
echo "Elektra: " . $formElectricity . "<br>";
echo "Tax: " . $formTax . "<br>";

echo "<br><br>" . "Metai: " . $dbYear . "<br>";
echo "Mėnesis: " . $dbMonth . "<br>";
echo "Karštas WC: " . $dbHotWC . "<br>";
echo "Šaltas WC: " . $dbColdWC . "<br>";
echo "Karštas Virt.: " . $dbHotKitchen . "<br>";
echo "Šaltas Virt.: " . $dbColdKitchen . "<br>";
echo "Elektra: " . $dbElectricity . "<br>";
echo "Tax: " . $dbTax . "<br>";

echo "<br> -------------------------------------------------- <br>";

$differenceElectricity = $formElectricity - $dbElectricity;
$taxElectricity = $differenceElectricity * ELECTRICITY_RATE;

$differenceHotWC = $formHotWC - $dbHotWC;
$differenceHotKitchen = $formHotKitchen - $dbHotKitchen;

$differenceColdWC = $formColdWC - $dbColdWC;
$differenceColdKitchen = $formColdKitchen - $dbColdKitchen;
$totalDifferenceCold = $differenceColdWC + $differenceColdKitchen;
$taxCold = $totalDifferenceCold * COLD_WATER_RATE;
$taxTotalExcl = $formTax + $taxElectricity + $taxCold + RENT - ACCUMULATIVE_FUND;

echo $differenceElectricity . "<br>";
echo $taxElectricity . "<br>";
echo $differenceHotWC . "<br>";
echo $differenceHotKitchen . "<br>";
echo $differenceColdWC . "<br>";
echo $differenceColdKitchen . "<br>";
echo $totalDifferenceCold . "<br>";
echo $taxCold . "<br>";
echo $taxTotalExcl . "<br>";




