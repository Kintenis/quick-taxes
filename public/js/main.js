document.onreadystatechange = function () {
    var state = document.readyState
    if (state == 'interactive') {
        document.getElementById('contents').style.visibility="hidden";
    } else if (state == 'complete') {
        setTimeout(function(){
            document.getElementById('interactive');
            document.getElementById('load').style.visibility="hidden";
            document.getElementById('contents').style.visibility="visible";
        },1000);
    }
}

$( document ).ready(function() {
    const thisYear = new Date().getFullYear();
    const thisMonth = new Date().getMonth();

    $.ajax({
        method: 'GET',
        url: '/get-months',
        data: {
            year: thisYear
        },
        complete: function(data) {
            $('#tax_month').empty();

            let months = data.responseJSON;
            $.each( months, function( index, value ){
                $("#tax_month").append(new Option(value, index));
            });

            $("#tax_year").val(thisYear).attr('selected', 'selected');
            $("#tax_month").val(thisMonth - 1).attr('selected', 'selected');
        }
    })

    $.ajax({
        method: 'GET',
        url: '/set-min-values',
        data: {
            month: thisMonth - 1,
            year: thisYear
        },
        complete: function(data) {
            const fieldHotWc = $('#tax_hotWc');
            const fieldColdWc = $('#tax_coldWc');
            const fieldHotKitchen = $('#tax_hotKitchen');
            const fieldColdKitchen = $('#tax_coldKitchen');
            const fieldElectricity = $('#tax_electric');

            fieldHotWc.attr('min', data.responseJSON['hotWc']);
            fieldColdWc.attr('min', data.responseJSON['coldWc']);
            fieldHotKitchen.attr('min', data.responseJSON['hotKitchen']);
            fieldColdKitchen.attr('min', data.responseJSON['coldKitchen']);
            fieldElectricity.attr('min', data.responseJSON['electricity']);
        }
    })

    $('#send-to-db').on( "click", function() {
        $.ajax({
            method: 'GET',
            url: '/send-to-db',
            data: {
                dbSend: {
                    year: $('#db-send-year').text().split(': ').pop(),
                    month: $('#db-send-month').text().split(': ').pop(),
                    hotWC: $('#db-send-hotWC').text().split(': ').pop(),
                    hotKitchen: $('#db-send-hotKitchen').text().split(': ').pop(),
                    coldWC: $('#db-send-coldWC').text().split(': ').pop(),
                    coldKitchen: $('#db-send-coldKitchen').text().split(': ').pop(),
                    electricity: $('#db-send-electricity').text().split(': ').pop(),
                    tax: $('#db-send-tax').text().split(': ').pop(),
                    fund: $('#db-send-fund').text().split(': ').pop(),
                }
            },
            complete: function(data) {
                console.log(data.responseJSON);
            }
        })

        $('#send-to-db').prop('disabled', true);
        $('#isSent').text('Išsiųsta!');
        $('#isSent').css('color', 'green');
    });
});

$(function () {
    $('#tax_year').change(function () {
        $.ajax({
            method: 'GET',
            url: '/get-months',
            data: {
                year: $(this).val()
            },
            complete: function(data) {
                $('#tax_month').empty();

                let months = data.responseJSON;
                $.each( months, function( index, value ){
                    $("#tax_month").append(new Option(value, index));
                });
            }
        })

        $.ajax({
            method: 'GET',
            url: '/set-min-values',
            data: {
                month: $($('#tax_month :selected')).val(),
                year: $(this).val()
            },
            complete: function(data) {
                const fieldHotWc = $('#tax_hotWc');
                const fieldColdWc = $('#tax_coldWc');
                const fieldHotKitchen = $('#tax_hotKitchen');
                const fieldColdKitchen = $('#tax_coldKitchen');
                const fieldElectricity = $('#tax_electric');

                fieldHotWc.attr('min', data.responseJSON['hotWc']);
                fieldColdWc.attr('min', data.responseJSON['coldWc']);
                fieldHotKitchen.attr('min', data.responseJSON['hotKitchen']);
                fieldColdKitchen.attr('min', data.responseJSON['coldKitchen']);
                fieldElectricity.attr('min', data.responseJSON['electricity']);
            }
        })
    });

    $('#tax_month').change(function () {
        $.ajax({
            method: 'GET',
            url: '/set-min-values',
            data: {
                month: $(this).val(),
                year: $($('#tax_year :selected')).val()
            },
            complete: function(data) {
                const fieldHotWc = $('#tax_hotWc');
                const fieldColdWc = $('#tax_coldWc');
                const fieldHotKitchen = $('#tax_hotKitchen');
                const fieldColdKitchen = $('#tax_coldKitchen');
                const fieldElectricity = $('#tax_electric');

                fieldHotWc.attr('min', data.responseJSON['hotWc']);
                fieldColdWc.attr('min', data.responseJSON['coldWc']);
                fieldHotKitchen.attr('min', data.responseJSON['hotKitchen']);
                fieldColdKitchen.attr('min', data.responseJSON['coldKitchen']);
                fieldElectricity.attr('min', data.responseJSON['electricity']);
            }
        })
    });
});

$(function () {
    let taxPartiesCuts = $('#taxPartiesCuts');
    let taxParty1 = $('#taxParty1');
    let taxParty2 = $('#taxParty2');
    let taxTotal = parseInt($('#taxTotal').text());

    let taxElectricity = parseFloat($('#taxElectricity').text());
    let taxColdTotal = parseFloat($('#taxColdTotal').text());
    let taxExcludeTotal = taxElectricity + taxColdTotal;

    taxPartiesCuts.on('change', function() {
        if(this.value === 'K') {
            taxParty1.html('Kintenis: <b>' + String((taxTotal / 2) + taxExcludeTotal) + '€</b>');
            taxParty2.html('Titas: <b>' + String((taxTotal / 2) - taxExcludeTotal) + '€</b>');
        } else if (this.value === 'T') {
            taxParty1.html('Kintenis: <b>' + String((taxTotal / 2) - taxExcludeTotal) + '€</b>');
            taxParty2.html('Titas: <b>' + String((taxTotal / 2) + taxExcludeTotal) + '€</b>');
        } else {
            taxParty1.html('Kintenis: <b>' + String(taxTotal / 2) + '€</b>');
            taxParty2.html('Titas: <b>' + String(taxTotal / 2) + '€</b>');
        }
    });
});


