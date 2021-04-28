
function get_timer_act() {

    $('tr.tr_for_actiov_lot').each(function (id,row) {
        let time_limit_active_lot = $(this).data('final_date_active_lot');
        let date_limit = new Date(time_limit_active_lot);
        let date_now  = new Date();
        let timer_act = date_limit - date_now;
        if(timer_act >= 2000 && timer_act <= 3000){
            sendActSocket(this);
        }
        if(date_limit > date_now) {
            let day_a = parseInt(timer_act / (60 * 60 * 1000 * 24));
            //Приводим результат к строке
            day_a = day_a.toString();

            let hour_a = parseInt(timer_act / (60 * 60 * 1000)) % 24;
            if (hour_a < 10) {
                hour_a = '0' + hour_a;
            }
            hour_a = hour_a.toString();

            var min_a = parseInt(timer_act / (1000 * 60)) % 60;
            if (min_a < 10) {
                min_a = '0' + min_a;
            }
            min_a = min_a.toString();

            let sec_a = parseInt(timer_act / 1000) % 60;
            if (sec_a < 10) {
                sec_a = '0' + sec_a;
            }
            sec_a = sec_a.toString();
            $($(this).children().get(8)).text(day_a + "д  " + hour_a + " : " + min_a + " : " + sec_a);
        }
    });
    setTimeout(get_timer_act,1000);
}
get_timer_act();

function sendActSocket(lot) {
    let body_lot_act = $(lot).children();
    let get_tran_act = $((body_lot_act).get(0)).html();

    addActRed(get_tran_act);

    let get_id_seller_act = lot.dataset.seller_u_id;
    let get_lider_bet_act = $((body_lot_act).get(14)).html();

    let get_id_prev_act = lot.dataset.previous_user;
    let get_prev_bet_act =$((body_lot_act).get(12)).html();
    let get_token_rate_today = $('#all_active_lot').data('token_rate_today');

     let get_id_liser_act = lot.dataset.lider_user;
     let get_token_act = $((body_lot_act).get(4)).html();
     let get_rate_act = lot.dataset.toker_rate_act;

    setTimeout(function () {
        clientSocket.emit('privet', { type: 'lider_position', to: get_id_liser_act,
            transaction: get_tran_act, token: get_token_act, rate_lot: get_rate_act});
    }, 3000);

    setTimeout(function () {
        clientSocket.emit('privet', { type: 'previous_position', to: get_id_prev_act,
            transaction: get_tran_act, prev_bet_act: get_prev_bet_act , rate_lot: get_token_rate_today});
    }, 3000);
    setTimeout(function () {
        clientSocket.emit('privet', { type: 'seller_position', to: get_id_seller_act,
            transaction: get_tran_act, token: get_token_act, rate: get_rate_act, price: get_lider_bet_act });
    }, 3000);

     removeActLOt(get_tran_act);
}

function addActRed(code_lot) {
    setTimeout(function () {
        clientSocket.emit('update_lot', { tid: code_lot, type: 'red_Act'
        });
    }, 1000);
}
function removeActLOt(code_lot) {
    setTimeout(function () {
        clientSocket.emit('update_lot', { tid: code_lot, type: 'act_limit_time'
        });
    }, 3000);
}

