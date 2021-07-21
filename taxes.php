<?php
include_once 'config.php';
include_once 'template.php';

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
$formFund = $_POST['fund'];

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

$differenceElectricity = $formElectricity - $dbElectricity;
$taxElectricity = $differenceElectricity * ELECTRICITY_RATE;

$differenceHotWC = $formHotWC - $dbHotWC;
$differenceHotKitchen = $formHotKitchen - $dbHotKitchen;

$differenceColdWC = $formColdWC - $dbColdWC;
$differenceColdKitchen = $formColdKitchen - $dbColdKitchen;
$totalDifferenceCold = $differenceColdWC + $differenceColdKitchen;
$taxCold = $totalDifferenceCold * COLD_WATER_RATE;
$taxTotalExcl = $formTax + $taxElectricity + $taxCold + RENT - ACCUMULATIVE_FUND;

?>

<body>
    <div class="container-fluid">
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-3 offset-md-1 text-center">
                <div class="hot-report-box">
                    <h2 class="hot-report-box-title">6 butas</h2>
                    <h2 class="hot-report-box-title">Karštas</h2>
                    <p style="margin-top: 40px; font-size: 26px;">WC: <?php echo (string)$formHotWC . " - " . (string)$dbHotWC . " = " . (string)$differenceHotWC ?></p>
                    <p style="font-size: 26px;">Virt.: <?php echo (string)$formHotKitchen . " - " . (string)$dbHotKitchen . " = " . (string)$differenceHotKitchen ?></p>
                </div>
            </div>

            <div class="col-md-7 offset-md-1">
                <div class="report-table-box text-center">
                    <span style="font-size: 18px; letter-spacing: 3px;">MOKĖJIMO PRANEŠIMAS</span><br>
                    <span style="font-weight: 600;">Už <?php echo $formYear . " m. " . $formMonth . " mėn." ?></span><br>
                    <span style="font-weight: 600;">Butas Nr. 6, plotas 49,51</span><br><br>
                    <span style="font-weight: 600;">gavėjas: 344-oji daugiabučio namo savininkų bendrija</span><br>
                    <span style="font-weight: 600;">sąskaita LT77 7300 0100 0244 8502, Swedbank, AB</span><br>
                    <span style="font-weight: 600;">įm. kodas 125112428</span><br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


