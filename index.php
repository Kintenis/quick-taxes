<?php
include_once '_includes/config.php';
include_once '_includes/template.php';

$sql = "SELECT * FROM counter_data ORDER BY f_id DESC LIMIT 1";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_all($query);

$dbHotWC = $data[0][3];
$dbColdWC = $data[0][4];
$dbHotKitchen = $data[0][5];
$dbColdKitchen = $data[0][6];
$dbElectricity = $data[0][7];

?>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <form method="post" action="taxes.php" id="form-date" class="date_form">
                    <div class="form-row">
                        <div class="form-group col-md-2 offset-md-3">
                            <select id="year" class="form-control" name="year">
                                <option>2020</option>
                                <option selected>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select id="months" class="form-control" name="month">
                                <option selected>Sausis</option>
                                <option>Vasaris</option>
                                <option>Kovas</option>
                                <option>Balandis</option>
                                <option>Gegužė</option>
                                <option>Birželis</option>
                                <option>Liepa</option>
                                <option>Rugpjūtis</option>
                                <option>Rugsėjis</option>
                                <option>Spalis</option>
                                <option>Lapkritis</option>
                                <option>Gruodis</option>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div>
                        <i class="fas fa-tint fa-4x" style="color: #03cafc;"></i>
                        <p class="utility">Vanduo</p>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 location">
                            <i class="fas fa-bath fa-2x"></i>
                            <p class="location-text">WC</p>

                            <div class="form-row align-items-center">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-fire" style="color: red;"></i></div>
                                        </div>
                                        <input type="number" min="<?php echo $dbHotWC ?>" step="0.01" name="hot-wc" class="form-control" id="inlineFormInputGroup" placeholder="Karštas" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-snowflake" style="color: #03cafc;"></i></div>
                                        </div>
                                        <input type="number" min="<?php echo $dbColdWC ?>" step="0.01" name="cold-wc" class="form-control" id="inlineFormInputGroup" placeholder="Šaltas" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 location">
                            <i class="fas fa-utensils fa-2x"></i>
                            <p class="location-text">Virtuvė</p>

                            <div class="form-row align-items-center">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-fire" style="color: red;"></i></div>
                                        </div>
                                        <input type="number" min="<?php echo $dbHotKitchen ?>" step="0.01" name="hot-kitchen" class="form-control" id="inlineFormInputGroup" placeholder="Karštas" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-snowflake" style="color: #03cafc;"></i></div>
                                        </div>
                                        <input type="number" min="<?php echo $dbColdKitchen ?>" step="0.01" name="cold-kitchen" class="form-control" id="inlineFormInputGroup" placeholder="Šaltas" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="col-md-12" style="margin-top: 40px;">
                        <i class="fas fa-bolt fa-4x" style="color: #fce703;"></i>
                        <p class="utility">Elektra</p>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <div class="form-group">
                            <input type="number" min="<?php echo $dbElectricity ?>" name="electricity" class="form-control" placeholder="Elektra" required>
                        </div>
                    </div>
                    <hr>

                    <div class="form-row align-items-center">
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="col-md-12" style="margin-top: 40px;">
                                    <i class="fa fa-envelope fa-4x" style="color: #333;"></i>
                                    <p class="utility">Mokesčiai</p>
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    <div class="form-group">
                                        <input type="number" min="0" name="tax" step="0.01" class="form-control" placeholder="Mokesčiai" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="col-md-12" style="margin-top: 40px;">
                                    <i class="fa fa-minus fa-4x" style="color: #333;"></i>
                                    <p class="utility">Kaupiamasis fondas</p>
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    <div class="form-group">
                                        <input type="number" min="0" name="fund" step="0.01" class="form-control" placeholder="Kaupiamasis fondas" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    <button type="submit" class="btn btn-primary">Patvirtinti</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>