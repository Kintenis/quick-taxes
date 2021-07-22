<?php
include_once '_includes/config.php';
include_once '_includes/template.php';

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
$taxElectricity = round($differenceElectricity * ELECTRICITY_RATE, 2);

$differenceHotWC = round($formHotWC - $dbHotWC, 2);
$differenceHotKitchen = round($formHotKitchen - $dbHotKitchen, 2);

$differenceColdWC = round($formColdWC - $dbColdWC, 2);
$differenceColdKitchen = round($formColdKitchen - $dbColdKitchen, 2);
$totalDifferenceCold = $differenceColdWC + $differenceColdKitchen;
$taxCold = round($totalDifferenceCold * COLD_WATER_RATE, 2);
$taxTotalExcl = round($formTax + $taxElectricity + $taxCold + RENT - ACCUMULATIVE_FUND, 2);

?>

<style>
    tr {
        border-top: 1px solid #333;
        border-bottom: 1px solid #333;
    }

    td:empty::after {
        content: "\00a0";
    }

    .visual-text {
        font-size: 20px;
    }
</style>

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
            <div class="col-md-7">
                <div class="report-table-box">
                    <div class="text-center">
                        <span style="font-size: 18px; letter-spacing: 3px;">MOKĖJIMO PRANEŠIMAS</span><br>
                        <span style="font-weight: 600;">Už <?php echo $formYear . " m. " . $formMonth . " mėn." ?></span><br>
                        <span style="font-weight: 600;">Butas Nr. 6, plotas 49,51</span><br><br>
                        <span style="font-weight: 600;">gavėjas: 344-oji daugiabučio namo savininkų bendrija</span><br>
                        <span style="font-weight: 600;">sąskaita LT77 7300 0100 0244 8502, Swedbank, AB</span><br>
                        <span style="font-weight: 600;">įm. kodas 125112428</span><br>
                    </div>
                    <table style="margin-top: 20px; width: 100%;">
                        <tr>
                            <td>Šildymas ir šilumos pardavimo mokestis</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td>"Gyvatukas"</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td>Nepaskirstyta šilumos energija</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td>Šiltas vanduo</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td>Laiptinių apšvietimas</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td>Banko paslaugos</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td>Išlaidos namo priežiūrai</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td>Kanalizacijos valymas</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td>Kaupiamasis fondas</td>
                            <td>**.**</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: right; border: 1px solid #000; padding-right: 5px;"><b>Iš viso: </b></td>
                            <td style="padding-left: 5px;"><b><?php echo $formTax; ?></b></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-1 visual-text">
                <div style="border-bottom: 1px solid #333; width: 100%;"></div>
                <span style="margin-left: 40px;"><?php echo $formTax - $formFund; ?></span><br>
                <span style="margin-left: 40px;"><?php echo $taxElectricity; ?></span><br>
                <span style="margin-left: 40px;"><?php echo round(($differenceColdWC + $differenceColdKitchen) * COLD_WATER_RATE, 2); ?></span><br>
                <span style="margin-left: 40px;"><?php echo RENT; ?></span>
                <div style="border-bottom: 1px solid #333; width: 70%; margin-left: 40px;"></div>
                <span style="margin-left: 40px;"><?php echo ($formTax - $formFund) + $taxElectricity + (round(($differenceColdWC + $differenceColdKitchen) * COLD_WATER_RATE, 2)) + RENT; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 offset-md-3 text-center visual-text" style="margin-top: 20px;">
                <span>Elektra: <?php echo $formElectricity . " - " . $dbElectricity . " = " . $differenceElectricity . " x 0,127 = " . $taxElectricity; ?></span>
            </div>

            <div class="col-md-2 offset-md-5 text-center visual-text" style="margin-top: 20px;">
                <p>Karštas</p>
                <span>WC: <?php echo (string)$formHotWC . " - " . (string)$dbHotWC . " = " . (string)$differenceHotWC ?></span><br>
                <span>Virt.: <?php echo (string)$formHotKitchen . " - " . (string)$dbHotKitchen . " = " . (string)$differenceHotKitchen ?></span>
            </div>
            <div class="col-md-2 text-center visual-text" style="margin-top: 20px;">
                <p>Šaltas</p>
                <span>WC: <?php echo (string)$formColdWC . " - " . (string)$dbColdWC . " = " . (string)$differenceColdWC ?></span><br>
                <span>Virt.: <?php echo (string)$formColdKitchen . " - " . (string)$dbColdKitchen . " = " . (string)$differenceColdKitchen ?></span>
            </div>
            <div class="col-md-2 visual-text" style="margin-top: 50px; padding: 0px;">
                <div style="width: 0px; height: 70px; border-right: 1px solid #333; position: absolute;"></div><br>
                <span style="margin-left: 20px;"><?php echo $differenceColdWC + $differenceColdKitchen . " x 1,72 = " . round(($differenceColdWC + $differenceColdKitchen) * COLD_WATER_RATE, 2); ?></span>
            </div>

        </div>
    </div>
</body>

</html>