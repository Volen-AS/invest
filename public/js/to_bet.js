var transaction_number = '';
var inputAmount = '';
var noAct_first_buyer = '';

$(document).on('click','.buttom_table_money_cabinet_pass', function () {
    let parent = $(this).closest('tr');
    $($(parent).children()).addClass('green_background_for_lot');
    $('#selected_pass_lot').css('display', 'block');
    let row =  $(parent).children();
    let you_can_spend = $('#balance_in_cabinet').text();
    let noAct_lot_token_amount = parseFloat($($(row).get(4)).text());
        transaction_number = $($(row).get(0)).text();

    setTimeout(function () {
        clientSocket.emit('auction', { tid: transaction_number,
            type: 'open_p'});
    }, 0);

    let noAct_token_prics = parseFloat(parent.data('token_em_price'));
    let noAct_start_price = parseFloat($($(row).get(8)).text());
     noAct_first_buyer = parent.data('first_buyer');

    let noAct_step_amount = parseFloat(parent.data('step_amount'));
    let noAct_first_price  =parseFloat($($(row).get(10)).text());
    $('#code_transaction_noAct_lot ').text(transaction_number);
    $('#tb_bet_token_amount').text(+noAct_lot_token_amount+' шт');
    $('#tb_bet_tokeт_emission').html('&nbsp;' +noAct_token_prics+' $/шт');
    $('#tb_bet_start_price').html('&nbsp;' +noAct_start_price+' $');

    console.log(noAct_first_buyer);

        if(noAct_first_buyer === ""){
            let reserved_aff = parseFloat(((noAct_step_amount + noAct_start_price)*0.05).toFixed(2));
            let min_bet_on_noAct_auction = reserved_aff + noAct_step_amount + noAct_start_price;
            $('#tb_bet_first_bet').text('');
            $('#step_amount_auction').text(+noAct_step_amount+' + '+reserved_aff+' ( 5% резервується для афіліата)');
            $('#input_auction_bet').attr('placeholder',min_bet_on_noAct_auction );
        }else{
            let reserved_aff = parseFloat(((noAct_step_amount + noAct_first_price)*0.05).toFixed(2));
            let min_bet_on_noAct_auction = reserved_aff + noAct_step_amount + noAct_first_price;
            $('#tb_bet_first_bet').text(+noAct_first_price+' $');
            $('#step_amount_auction').text(+noAct_step_amount+' + '+reserved_aff+' ( 5% резервується для афіліата)');
            $('#input_auction_bet').attr('placeholder', min_bet_on_noAct_auction);
        }
    $('#you_can_spend_on_auction').text(you_can_spend);

});

$(document).on('click','#noAcr_bet_lot',function () {
    let max_amount_buy_lot = parseFloat($('#you_can_spend_on_auction').text());
        inputAmount = parseFloat($('#input_auction_bet').val());
    let placeholderAmount =  parseFloat($('#input_auction_bet').attr("placeholder"));
    if(inputAmount >= placeholderAmount ){
        if(max_amount_buy_lot >= inputAmount){
            $('#selected_pass_lot').css('display', 'none');
            $('#modal_confirm_bet_pass').css('display', 'block');
        }else{
            $('#input_auction_bet').val('').focus();
        }
    }else{
        $('#input_auction_bet').val('').focus();
    }
});
// close modal window for on not actiov bet on aucrion
$(document).on('click','#close_model_windows_pass',function(){
   $('.green_background_for_lot').removeClass('green_background_for_lot');
    $('#selected_pass_lot').css('display', 'none');
    socketClosePassWindow(transaction_number);
});

// press NO confirm bet
$(document).on('click','#press_no_lot_bet_pass', function (){
    $('#modal_confirm_bet_pass').css('display', 'none');
    socketCloseWindow(transaction_number);
    cleanDataBetPass();
});

// press Yes confirm bet
$(document).on('click','#press_yes_lot_bet_pass', function (){

    let target_lot_pass = $('#table_for_No_actiov_lot').find('td:contains('+transaction_number+')').closest('.tr_for_No_actiov_lot');
    let first_buyer_pass =target_lot_pass.data('first_buyer');
    if(first_buyer_pass === '' || first_buyer_pass === noAct_first_buyer){
        betOnPassAuction(inputAmount,transaction_number);
        $('#modal_confirm_bet_pass').css('display', 'none');
        socketClosePassWindow(transaction_number);
        cleanDataBetPass();
    }
    else {
        $('#modal_confirm_bet_pass').css('display', 'none');
        $('#to_late').css('display', 'block');
        socketClosePassWindow(transaction_number);
        cleanDataBetPass();
    }
});

function cleanDataBetPass() {
    $('.green_background_for_lot').removeClass('green_background_for_lot');
    $('#input_auction_bet').val('');
    input_amount_act = '';
}
function socketClosePassWindow(transaction_number) {
    setTimeout(function () {
        clientSocket.emit('auction', { tid: transaction_number,
            type: 'close_p'});
    }, 0);
}

function ajaxSetup() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function betOnPassAuction(inputAmount,transaction_number) {
    ajaxSetup();
    $.ajax({
        type: 'GET',
        url: '/betOnPassAuction',
        dataType:'json',
        data: {
            transaction_number: transaction_number,
            inputAmount:inputAmount
        },
        success: function (data) {
            if(data.error){
                let response_window = $('#new_lot_on_auction_error').css('display', 'block');
                $(response_window).contents('div').contents('p').text(data.error);
                setTimeout(function() {
                    $(response_window).fadeOut();
                }, 2000);
            }
            else if(data.first_bet){
                let response_window = $('#new_lot_on_auction_success').css('display', 'block');
                $(response_window).contents('div').contents('p').text(data.first_bet);

                setTimeout(function () {
                    clientSocket.emit('update_lot', {
                        tid: data.transaction, type: 'first',
                        first_buyer: data.first_buyer, first_bit: data.new_lot_bit
                    });
                }, 0);
                setTimeout(function() {
                    $(response_window).fadeOut();
                }, 2000);

                let you_can_spend = parseFloat($('#balance_in_cabinet').text());
                $('#balance_in_cabinet').text(you_can_spend - inputAmount);
            }
            else if(data.new){
                let response_window = $('#new_lot_on_auction_success').css('display', 'block');
                $(response_window).contents('div').contents('p').text(data.new);
                setTimeout(function() {
                    $(response_window).fadeOut();
                }, 2000);
                let you_can_spend = parseFloat($('#balance_in_cabinet').text());
                $('#balance_in_cabinet').text(you_can_spend - inputAmount);

                setTimeout(function () {
                    clientSocket.emit('update_lot', {
                        tid: data.moveLot.code_transaction_au, type: 'move', final_date_active_lot:data.final_date_act,
                        toker_rate_act:data.rate_of_token, step_amount_act:data.min_bet, seller:data.moveLot.seller_u_id, previous_user:data.moveLot.previous_price_user,
                        lider_user:data.moveLot.lider_price_user,  emission_period:data.moveLot.emission_period,
                        amount_token_lot:data.moveLot.amount_token_lot, start_lot_time:data.moveLot.start_lot_time,
                        start_price:data.moveLot.start_price, previous_price:data.moveLot.previous_price['bet_amount'],lider_price:data.moveLot.lider_price['bet_amount']
                    });
                }, 0);
            }
        },
        error: function(data){
            let response_window = $('#new_lot_on_auction_error').css('display', 'block');
            $(response_window).contents('div').contents('p').text('Щось пішло не так');
            setTimeout(function() {
                $(response_window).fadeOut();
            }, 2000);
        },
    });
}
