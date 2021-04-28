var new_lot_token = '';
var token_emission = '';
///create lot

$(document).on('click',"#balance_own_token_em", function(){

    document.getElementById('table_create_lot').style.display = "block";
    let date = $(this).data('date_by_emission'); // date issue value of the token
    let token_rate = $(this).data('token_rate_by_emission'); // token rate
    let invest = $(this).data('investment_by_emission'); // invest sum in this emission token
    let own_token = $(this).data('own_token_by_emission'); // amount of token
    let token_in_auction_by_emission = $(this).data('total_token_in_auction');
    let available_amount = own_token - token_in_auction_by_emission;
    let min_lot = $('#min_lot_auction').data('min_lot');

    $('#date_by_emission_md').text(date);
    $('#token_rate_on_auction').text(token_rate);
    $('#total_amount_of_tokens').text(own_token);
    $('#total_invest_of_emission').text(invest);
    $('#token_in_auction').text(token_in_auction_by_emission);
    $('#available_amount').text(available_amount.toFixed(2));
    $('#input_numb_create_lot').attr("placeholder", +min_lot+' - '+available_amount.toFixed(2)+'');
});

$(document).on('click',"#bututono", function () {
    let token_rate = parseFloat($('#token_rate_on_auction').text());
    let tonen_for_new_lot = parseFloat($("#input_numb_create_lot").val());
    let min_lot = $('#min_lot_auction').data('min_lot');
    let max_lot =  parseFloat($('#available_amount').html());

    if(tonen_for_new_lot >= min_lot && tonen_for_new_lot <= max_lot){
            let start_price = tonen_for_new_lot * token_rate;
            let start_price_fixed = start_price.toFixed(2);
            let available_token_in_create_lot = max_lot - tonen_for_new_lot;
            let available_token_lot = available_token_in_create_lot.toFixed(2);
            $('#start_price_for_new_lot').text(start_price_fixed);
            $('#available_token_in_create_lot').text(available_token_lot);
    }
    else{
            $('#input_numb_create_lot').val('').focus();
            $('#start_price_for_new_lot').text('');
            $('#available_token_in_create_lot').text('');
        console.log('you can not');
    }

});

//підтверження створення лоту
$(function() {
    var modal = document.getElementById('modal_confirm_create_lot');
    var btnModalWindow = document.getElementById("confirm_create_lot");
    var btnyes = document.getElementById("btn_confirmation_myModal_yes");
    var btnBuyNo = document.getElementById("btn_confirmation_myModal_no");

    btnModalWindow.onclick = function () {
        let my_prices = $('#start_price_for_new_lot').text();
        let amount_tokens_in_create_auction = parseFloat($("#input_numb_create_lot").val());
        let rate_for_tolens_check = parseFloat($('#token_rate_on_auction').text());

        if(my_prices === ''){
            $('#input_numb_create_lot').focus();
            console.log('empty');
        }
        else{
            let my_prices_flout = parseFloat(my_prices);
            let check_trasaction = amount_tokens_in_create_auction*rate_for_tolens_check;
            let check_trasaction1 = parseFloat(check_trasaction.toFixed(2));
            if(my_prices_flout === check_trasaction1){
                new_lot_token = amount_tokens_in_create_auction;
                token_emission = $('#date_by_emission_md').text();
                modal.style.display = "block";
            }
            else{
                $('#bututono').click();
            }
        }
    };
    btnBuyNo.onclick = function () {
        modal.style.display = "none";
        creatLot();
        $('#table_create_lot').hide();


    };
    btnyes.onclick = function () {
        sendAjaxNewLot(new_lot_token,token_emission);
        modal.style.display = "none";
        creatLot();
    };
});

function sendAjaxNewLot(new_lot_amount,token_emission){
    ajaxSetup();

    $.ajax({
        type: 'get',
        url: '/sendAjaxCreateLot',
        dataType:'json',
        data: {
            new_lot_amount: new_lot_amount,
            token_emission:token_emission
        },
        success: function (data) {
            updateDataAtr(new_lot_amount);
            let new_lot_on_auction = document.getElementById("new_lot_on_auction");
            new_lot_on_auction.style.display = "block";

            setTimeout(function (new_lot_amount) {
                clientSocket.emit('ticker', {transaction:data.code_transaction,start_price:data.start_p,token:data.token
                });
            }, 0);

            $(new_lot_on_auction).contents('div').contents('p').text('Ви виставил лот №' +data.code_transaction+ ' на аукціон');
            setTimeout(function() {
                $(new_lot_on_auction).fadeOut()
            }, 3000);
            $('#table_create_lot').hide();

        },
        error: function(){
            $('#table_create_lot').hide();
            creatLot();
            console.log('error');
        },
    });
}

function updateDataAtr(new_lot_amount){
    let target_emission = $('.table_own_token').find('td:contains('+token_emission+')').closest('.tr_table_own_token');
    let child1 = $((target_emission).children()).get(8);
    let target_el = $($(child1).contents('#balance_own_token_em')).data('total_token_in_auction');
    let new_total_token_in_auction = new_lot_amount + target_el;
    $($(child1).contents('#balance_own_token_em')).data('total_token_in_auction',new_total_token_in_auction);
}

function ajaxSetup() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
// clean table create lot

function creatLot() {
    $('#start_price_for_new_lot').text('');
    $('#available_token_in_create_lot').text('');
    $('#input_numb_create_lot').val('');
}

// var leaderLotWind = document.getElementById('your_leader_lot');
// var btnCloseWind = document.getElementById("btn_OK_your_leader_lot");

// btnCloseWind.onclick = function () {
//     leaderLotWind.style.display = "none";
// };
