//global val
var byNewToken = '';
var amount = ''; //  $ sum on new token


//buy tokens by button "buy tokens" in cabinet
$(function() {
    var modal = document.getElementById('myModal');
    var btnModalWindow = document.getElementById("pay_token_cabinet");
    var confirmationmyModal = document.getElementById("confirmation_myModal");
    var btnBuyLot = document.getElementById("buy_lot_actionLot");
    var btnBuyNo = document.getElementById("btn_confirmation_myModal_no");
    var btnBuyYes = document.getElementById("btn_confirmation_myModal_yes");
    var you_bougth_new_token = document.getElementById("you_bougth_new_token");

    btnModalWindow.onclick = function () {
        modal.style.display = "block";
    };
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            $('#my_new_token').text('0.00');
            $('#buyNewToken').val('');
            byNewToken = "";
        }
    };
    btnBuyLot.onclick = function () {
        let www = $('#my_new_token').text();

        if(www == 0.00){
            $('#buyNewToken').focus();
        }
        else{
            let rate_now = $(document.getElementById('token_price_to_day')).data('token_price_to_day');
            let check_data = parseFloat($('#buyNewToken').val());
            let rrr = check_data/rate_now;
            let ttt = rrr.toFixed(2);

            if(byNewToken == ttt){
                modal.style.display = "none";
                confirmationmyModal.style.display = "block";
                //console.log('+',byNewToken,ttt,check_data);
            }
            else{
                $('#cal_token').click();
            }
        }
    };
    btnBuyNo.onclick = function () {
        confirmationmyModal.style.display = "none";
        $('#my_new_token').text('0.00');
        $('#buyNewToken').val('');
        byNewToken = "";
    };
    btnBuyYes.onclick = function () {

        let new_balance_in_cabinet = $(document.getElementById('balance_in_cabinet'));
        let old_amount = parseFloat(new_balance_in_cabinet.text());
        let new_amount =  old_amount - amount;
        new_balance_in_cabinet.text(new_amount);

        let token_total_balance = $(document.getElementById('token_total_balance'));
        let old_token_total_balance = parseFloat(token_total_balance.text());
        let float_byNewToken = parseFloat(byNewToken);
        let new_token_total_balance = old_token_total_balance + float_byNewToken*0.95;
        token_total_balance.text(new_token_total_balance.toFixed(2));
        sendAjaxBuyNewToken(amount);
        confirmationmyModal.style.display = "none";
        you_bougth_new_token.style.display = "block";
          setTimeout(function() {
            $(you_bougth_new_token).fadeOut()
          }, 2000);
        $(document.getElementById('buyNewToken')).attr("placeholder", new_amount);
        confirmationmyModal.style.display = "none";
        $('#my_new_token').text('0.00');
        $('#buyNewToken').val('');
        byNewToken = "";
       location.reload();
    };
});

$(document).on('click','#cal_token', function () {
    let check_amount = document.getElementById('buyNewToken');
    let max = parseFloat($(check_amount).attr("placeholder"));
    let token_price_to_day = $(document.getElementById('token_price_to_day')).data('token_price_to_day');
    if($(check_amount).val() == ""){
        $(check_amount).focus();
    }
    else{
        amount = parseFloat($(check_amount).val());
        if(max >= amount){
           let FloutByNewToken = amount/token_price_to_day;
            byNewToken =  FloutByNewToken.toFixed(2);
            $('#my_new_token').text(byNewToken);
       }
        else{
            alert('Недостатньо коштів на рахунку',amount);
            $(check_amount).focus();
            $('#buyNewToken').val('');
        }
    }

});

function sendAjaxBuyNewToken(amount){
    ajaxSetup();
    $.ajax({
        type: 'get',
        url: '/sendAjaxBuyNewToken',
        dataType:'json',
        data: {
            amount: amount
        },
        success: function (data) {
        },
        error: function(){
        },
    });
}


function ajaxSetup() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

// // //Ви не встигли зробити ставку
// // $(function() {
// //     var modalFailedBid = document.getElementById('failed-bid');
// //     //var btnStartModalWind = document.getElementById("confirm_create_lot"); перемінна активації мод вікна, щоб побачити вікно
// //     // css 4744 рядок постав: display: block;
// //     var btnOk = document.getElementById("btnOkFail");
// //
// //     // btnStartModalWind.onclick = function () {
// //     //     modalFailedBid.style.display = "block";
// //     // };
// //
// //
// //     btnOk.onclick = function () {
// //         modalFailedBid.style.display = "none";
// //     };
// // });
