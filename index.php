<!DOCTYPE HTML>
<html>

<head>
    <title>I. Kanto al. 21-6 taxes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
</head>

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
                                        <input type="number" min="0" step="0.01" name="hot-wc" class="form-control" id="inlineFormInputGroup" placeholder="Karštas" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-snowflake" style="color: #03cafc;"></i></div>
                                        </div>
                                        <input type="number" min="0" step="0.01" name="cold-wc" class="form-control" id="inlineFormInputGroup" placeholder="Šaltas" required>
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
                                        <input type="number" min="0" step="0.01" name="hot-kitchen" class="form-control" id="inlineFormInputGroup" placeholder="Karštas" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-snowflake" style="color: #03cafc;"></i></div>
                                        </div>
                                        <input type="number" min="0" step="0.01" name="cold-kitchen" class="form-control" id="inlineFormInputGroup" placeholder="Šaltas" required>
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
                            <input type="number" min="0" name="electricity" class="form-control" placeholder="Elektra" required>
                        </div>
                    </div>
                    <hr>

                    <div class="col-md-12" style="margin-top: 40px;">
                        <i class="fa fa-envelope fa-4x" style="color: #333;"></i>
                        <p class="utility">Mokesčiai</p>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <div class="form-group">
                            <input type="number" min="0" name="tax" step="0.01" class="form-control" placeholder="Mokesčiai" required>
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