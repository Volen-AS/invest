var transaction_number_act_lot = '';
var input_amount_act = '';
var pr_user_id = '';
var from_id = getmyIden();

$(document).on('click','.buttom_table_money_cabinet_active', function () {
    let parent_act = $(this).closest('tr');
    $($(parent_act).children()).addClass('green_background_for_lot');
    $('#selected_act_lot').css('display', 'block');
    let row_act =  $(parent_act).children();
    transaction_number_act_lot =$(row_act.get(0)).text();

    setTimeout(function () {
        clientSocket.emit('auction', { tid: transaction_number_act_lot,
                                        type: 'open_a'});
    }, 0);
    pr_user_id = parent_act.data('previous_user');
    let you_can_spend_act = $('#balance_in_cabinet').text();
    let act_lot_token_amount = parseFloat($(row_act.get(4)).text());
    let act_token_prices = parseFloat(parent_act.data('toker_rate_act'));
    let act_previous_prices = parseFloat($(row_act.get(12)).text());
    let act_lider_prices = parseFloat($(row_act.get(14)).text());
    let act_step_amount = parseFloat(parent_act.data('step_amount_act'));

    let reserved_aff_act = parseFloat(((act_step_amount + act_lider_prices)*0.05).toFixed(2));
    let min_bet_on_act_auction = reserved_aff_act + act_step_amount + act_lider_prices;

    $('#code_transaction_act_lot ').text(transaction_number_act_lot);
    $('#tb_bet_token_amount_act').html('&nbsp;'+act_lot_token_amount+' шт');
    $('#tb_bet_tokeт_emission_act').html('&nbsp;'+act_token_prices+' $/шт');
    $('#tb_bet_previous_price_act').html('&nbsp;'+act_previous_prices+' $');
    $('#tb_bet_lider_prices').html('&nbsp;'+act_lider_prices+' $');

    $('#step_amount_auction_act').text(+act_step_amount+' + '+reserved_aff_act+' ( 5% резервується для афіліата)');
    $('#you_can_spend_on_auction_act').text(you_can_spend_act);
    $('#input_auction_bet_act').attr('placeholder', min_bet_on_act_auction);
});

// close modal window confirm bet lot
$(document).on('click','#close_model_windows_act',function(){
    $('#selected_act_lot').css('display', 'none');
    socketCloseWindow(transaction_number_act_lot);
    cleanDataBetAct();
});

$(document).on('click','#act_bet_lot_act',function (){
    let max_amount_buy_lot_act = parseFloat($('#you_can_spend_on_auction_act').text());
        input_amount_act = parseFloat($('#input_auction_bet_act').val());
    let placeholder_amount_act =  parseFloat($('#input_auction_bet_act').attr("placeholder"));
    if(input_amount_act >= placeholder_amount_act){
        if(max_amount_buy_lot_act >= input_amount_act){
            $('#selected_act_lot').css('display', 'none');
            $('#modal_confirm_bet_act').css('display', 'block');
        }
        else{
            $('#input_auction_bet_act').val('').focus();
        }
    }
    else{
        $('#input_auction_bet_act').val('').focus();
    }
});
 // press NO confirm bet
$(document).on('click','#press_no_lot_bet_act', function (){
    $('#modal_confirm_bet_act').css('display', 'none');
    socketCloseWindow(transaction_number_act_lot);
    cleanDataBetAct();
});
// press Yes confirm bet
$(document).on('click','#press_yes_lot_bet_act', function (){
    let target_lot = $('#all_active_lot').find('td:contains('+transaction_number_act_lot+')').closest('.tr_for_actiov_lot');
    let check_pr_user = target_lot.data('previous_user');

    if(pr_user_id === check_pr_user){
        let ld_amount_act = $((target_lot.children()).get(14)).text();
        let ld_user = target_lot.data('lider_user');
        $('#modal_confirm_bet_act').css('display', 'none');
        betOnActiveAuction(input_amount_act,transaction_number_act_lot);
        socketMsgYourBetСrushed(transaction_number_act_lot,pr_user_id);
        socketUpdateLot(transaction_number_act_lot,ld_user,ld_amount_act,from_id,input_amount_act);
        socketCloseWindow(transaction_number_act_lot);
        cleanDataBetAct();

    }else{
        $('#modal_confirm_bet_act').css('display', 'none');
        let to_late_act = $('#to_late').css('display', 'block');
        socketCloseWindow(transaction_number_act_lot);
        cleanDataBetAct();
    }

});

$(document).on('click', '#close_to_late', function () {
    $('#to_late').css('display', 'none');
});

function socketUpdateLot(transact_act,ld_user,ld_amount_act,new_user_id,new_amount_act) {
    setTimeout(function () {
        clientSocket.emit('update_lot', { tid: transact_act, type: 'act', ld_user:ld_user,
            ld_amount_act:ld_amount_act, new_user_id:new_user_id,new_amount_act:new_amount_act
            });
    }, 0);

}

function socketMsgYourBetСrushed(transaction,to_id) {
    setTimeout(function () {
        clientSocket.emit('privet', { type: 'bit', from: from_id, to: to_id, transact: transaction });
    }, 0);
}

function socketCloseWindow(transaction_number_act_lot) {
    setTimeout(function () {
        clientSocket.emit('auction', { tid: transaction_number_act_lot,
                                            type: 'close_a'});
    }, 0);
}
//clean data from modal window confirm bet lot
function cleanDataBetAct() {
    $('.green_background_for_lot').removeClass('green_background_for_lot');
    $('#input_auction_bet_act').val('');
    input_amount_act = '';
}
function ajaxSetup() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function getmyIden(){
    let cookie = document.cookie.split(';');
    cookie.forEach(function (val) {
        if(val.match(/ID/)){
            val =val.trim();
            from_id = val.replace('ID=', '');
        }
    });
    return from_id;
}

function betOnActiveAuction(sum,transaction) {
    ajaxSetup();

    $.ajax({
        type: 'GET',
        url: '/betOnActAuction',
        dataType:'json',
        data: {
            sum:sum,
            transaction:transaction
        },
        success: function (data) {
            if(data.error){
                let response_window = $('#new_lot_on_auction_error').css('display', 'block');
                $(response_window).contents('div').contents('p').text(data.error);
                setTimeout(function() {
                    $(response_window).fadeOut()
                }, 2000);
            }
            else{
                let response_window = $('#new_lot_on_auction_success').css('display', 'block');
                let my_balance  = parseFloat($('#balance_in_cabinet').text());
                $('#balance_in_cabinet').text(my_balance - input_amount_act);
                $(response_window).contents('div').contents('p').text(data.msg_lot);
                setTimeout(function() {
                    $(response_window).fadeOut()
                }, 2000);
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
