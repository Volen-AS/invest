 function get_timer() {

     $('tr.tr_for_No_actiov_lot').each(function (id,row) {
          let time_limit_no_active_lot = $(this).data('final_date_no_active_lot');

     var date_t = new Date(time_limit_no_active_lot);
     var date = new Date();
     var timer = date_t - date;
     if(timer >= 3000 && timer <= 4000){
          sendNotActSocket(this);
     }
     if(date_t > date) {
          var day = parseInt(timer / (60 * 60 * 1000 * 24));
          //Приводим результат к строке
          day = day.toString();

          var hour = parseInt(timer / (60 * 60 * 1000)) % 24;
          if (hour < 10) {
               hour = '0' + hour;
          }
          hour = hour.toString();

          var min = parseInt(timer / (1000 * 60)) % 60;
          if (min < 10) {
               min = '0' + min;
          }
          min = min.toString();

          var sec = parseInt(timer / 1000) % 60;
          if (sec < 10) {
               sec = '0' + sec;
          }
          sec = sec.toString();
          $($(this).children().get(6)).text(day + "д  " + hour + " : " + min + " : " + sec);
     }
});
     setTimeout( get_timer,1000);
}
get_timer();

 function sendNotActSocket(lot) {
      let body_lot_notAct = $(lot).children();
      let get_tran_notAct = $((body_lot_notAct).get(0)).html();
     addRed(get_tran_notAct);

      let get_id_seller_notAct = lot.dataset.seller
      let get_id_first_d_notAct = lot.dataset.first_buyer;

      let get_token_notAct = $((body_lot_notAct).get(4)).html();
          setTimeout(function () {
                clientSocket.emit('privet', { type: 'noAct_seller_position', to: get_id_seller_notAct,
                transaction: get_tran_notAct, token: get_token_notAct});
           }, 3000);
      if(get_id_first_d_notAct){
           let get_bet_notAct =$((body_lot_notAct).get(10)).html();
           setTimeout(function () {
                clientSocket.emit('privet', { type: 'noAct_first_position', to: get_id_first_d_notAct,
                     transaction: get_tran_notAct, first_bit: get_bet_notAct });
           }, 3000);
     }
      removeNotActLOt(get_tran_notAct);
 }
function addRed(lot_code) {
      setTimeout(function () {
          clientSocket.emit('update_lot', { tid: lot_code, type: 'red_notAct'
          });
     }, 1000);
}

 function removeNotActLOt(lot_code) {
      setTimeout(function () {
           clientSocket.emit('update_lot', { tid: lot_code, type: 'notAct_limit_time'
           });
      }, 3000);
 }