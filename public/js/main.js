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
    let selectedYear = $('#tax_year :selected');

    $.ajax({
        method: 'GET',
        url: '/get-months',
        data: {
            year: $(selectedYear).val()
        },
        complete: function(data) {
            $('#tax_month').empty();

            let months = data.responseJSON;
            $.each( months, function( index, value ){
                $("#tax_month").prepend(new Option(value, index));
            });
        }
    })
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
                    $("#tax_month").prepend(new Option(value, index));
                });
            }
        })
    });
});
