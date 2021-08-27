setTimeout(function () {
    var socket = io('http://invest.localtest.me:8080');
    socket.on('connect', function () {

        window.clientSocket = socket;
        let clientId = '';
        let my_chat_id = '';
        let affiliateChat = '';

        const decodedCookie = decodeURIComponent(document.cookie).split(';');
        decodedCookie.forEach(function (val) {
                if(val.match(/ID/)){
                    val =val.trim();
                    clientId = val.replace('ID=', '');
                }
                else if(val.match(/my_chat/)){
                    val =val.trim();
                    my_chat_id = val.replace('my_chat=', '');

                }
                else if(val.match(/aff_chat/)){
                    val =val.trim();
                    affiliateChat = val.replace('aff_chat=', '');
                }
            });
        socket.emit('join_to_chat', { chat_id:my_chat_id });
        socket.emit('join_to_chat', { chat_id:affiliateChat });

        console.log('success',clientId,my_chat_id,affiliateChat);

        const activeLotsTransactions = Array.from(
            document.querySelectorAll('.table_active_lot .tr_for_actiov_lot td:first-of-type')
        ).map(function(x) { return x.innerText; });

        const passLotsTransactions = Array.from(
          document.querySelectorAll('.table_no_active_lot .tr_for_No_actiov_lot td:first-of-type')
        ).map(function (e) { return e.innerText;});


        activeLotsTransactions.forEach(function(tid) {
            socket.emit('join_to_auction', { tid });
        });

        passLotsTransactions.forEach(function (tid) {
            socket.emit('join_to_auction', { tid });
        });

        socket.on('user_update_auction', function(data) {
            if(data.type === 'open_a'){
                $($('#all_active_lot').find('td:contains('+data.tid+')').closest('.tr_for_actiov_lot')).children().addClass('yelow_background_for_lot');
            }else if(data.type === 'close_a'){
                $($('#all_active_lot').find('td:contains('+data.tid+')').closest('.tr_for_actiov_lot')).children().removeClass('yelow_background_for_lot');
            }
            else if(data.type === 'open_p'){
                $($('#table_for_No_actiov_lot').find('td:contains('+data.tid+')').closest('.tr_for_No_actiov_lot')).children().addClass('yelow_background_for_lot');
            }
            else if(data.type === 'close_p'){
                $($('#table_for_No_actiov_lot').find('td:contains('+data.tid+')').closest('.tr_for_No_actiov_lot')).children().removeClass('yelow_background_for_lot');
            }
        });

        socket.on('update_ticker', function (data) {
           let running_line =  $('#running_line').children('.marquee').children('span');
           let old_line = $(running_line).text();
           let new_line = 'Створено лот № '+data.transaction+'. Виставлено на продаж '+data.token+' токенів. Стартова ціна лоту ' +data.start_price+'$';
            $(running_line).text(new_line);
            setTimeout(function () {
                let check_line =  $('#running_line').children('.marquee').children('span').text();
                if(check_line === new_line){
                    $(running_line).text(old_line);
                }
                else{
                }
            }, 180000);
        });


        socket.on('user_update_lot', function (data) {
            if(data.type === 'act'){
                let target_lot_act = $('#all_active_lot').find('td:contains('+data.tid+')').closest('.tr_for_actiov_lot');
                $((target_lot_act.children()).get(14)).text(data.new_amount_act);
                $((target_lot_act.children()).get(12)).text(data.ld_amount_act);
                target_lot_act.data('previous_user',data.ld_user);
                target_lot_act.data('lider_user',data.new_user_id);
            }
            else if(data.type === 'first'){
                let target_lot_pas = $('#table_for_No_actiov_lot').find('td:contains('+data.tid+')').closest('.tr_for_No_actiov_lot');
                target_lot_pas.data('first_buyer', data.first_buyer);
                $((target_lot_pas.children()).get(10)).html(data.first_bit);
                console.log(target_lot_pas.data('first_buyer', data.first_buyer));
             }
            else if(data.type === 'move'){
                $('#all_active_lot').append(
                    '<tr class="tr_for_actiov_lot" data-final_date_active_lot="'+data.final_date_active_lot+'" data-seller_u_id="'+data.seller+'" data-toker_rate_act="'+data.toker_rate_act+'" data-step_amount_act="'+data.step_amount_act+'" data-previous_user="'+data.previous_user+'"data-lider_user="'+data.lider_user+'"><td>'+data.tid+'</td><td></td><td>'+data.emission_period+'</td><td></td><td>'+data.amount_token_lot+'</td><td></td><td>'+data.start_lot_time+'</td><td></td><td></td><td></td><td>'+data.start_price+'</td><td></td><td>'+data.previous_price+'</td><td></td><td>'+data.lider_price+'</td><td></td><td><button classe="buttom_table_money_cabinet_active">Зробити ставку</button></td></tr>'
                );1
                $('#table_for_No_actiov_lot').find('td:contains('+data.tid+')').closest('.tr_for_No_actiov_lot').remove();
            }
            else if(data.type === 'red_notAct'){
                $($('#table_for_No_actiov_lot').find('td:contains('+data.tid+')').closest('.tr_for_No_actiov_lot')).children().addClass('red_background_for_lot');
            }else if(data.type === 'red_Act'){
                $($('#all_active_lot').find('td:contains('+data.tid+')').closest('.tr_for_actiov_lot')).children().addClass('red_background_for_lot');
            }else if(data.type === 'notAct_limit_time'){
                $('#table_for_No_actiov_lot').find('td:contains('+data.tid+')').closest('.tr_for_No_actiov_lot').remove();
            }else if(data.type === 'act_limit_time'){
                $('#all_active_lot').find('td:contains('+data.tid+')').closest('.tr_for_actiov_lot').remove();
            }
        });

        socket.on('get_group_msg', function (data) {
            if(data.chat_id === my_chat_id){
                $(document.getElementById('chat_messegde')).append('<div class="choose_chat_id" data-chat_user_id="'+data.u_id+'"data-message_id="'+data.msg_id+'" data-choose_chat_id="'+data.chat_id+'"data-typeTable="'+data.getTable+'"><div id="content_message" class="content_message-refferal"><div class="icon_refferal_chat"></div><div class="pos_name_time"><div id="name_in_massege" class="name_massege_chat">'+data.name+'</div><div class="time_massege_chat">'+data.create+'</div><div style="clear: both;"></div></div><div class="text_massege_chat">'+data.message+'</div><div style="clear: both;"></div></div><div class="icon_edit_chat_right"><div class="img_icon_edit_chat_right" data-answer_chat="'+data.msg_id+'"></div></div><div style="clear: both;"></div><div class="answer_menu_chat" id="answer_menu_chat" data-answer_chat="'+data.msg_id+'"><ul><li id="msg_in_chat">Відповідь в чат інвестору</li><li id="priv_msg">Відповідь інвестору</li></ul></div></div>');
            }else if(data.chat_id === affiliateChat){
                $(document.getElementById('chat_messegde')).append('<div class="choose_chat_id" data-chat_user_id="'+data.to+'" data-message_id="'+ data.msg_id +'" data-choose_chat_id="'+ data.chat_id +'" data-typeTable="'+data.type+'"><div id="content_message" class="content_message-affiliatte"><div class="icon_affiliatte_chat"></div><div class="pos_name_time"><div id="name_in_massege" class="name_massege_chat">'+ data.name +'</div><div class="time_massege_chat">'+data.create+'</div><div style="clear: both;"></div></div><div class="text_massege_chat">'+data.message+'</div><div style="clear: both;"></div></div><div class="icon_edit_chat_right"><div class="img_icon_edit_chat_right" data-answer_chat="'+data.msg_id+'"></div></div><div style="clear: both;"></div><div class="answer_menu_chat" id="answer_menu_chat" data-answer_chat="'+data.msg_id+'"><ul><li id="msg_in_chat">Відповідь в чат інвестору</li><li id="priv_msg">Відповідь інвестору</li></ul></div></div>');
            }
            document.getElementById("chat_messegde").scrollTop = 9999;
        });

        socket.on('get_ed_del_msg',function (data) {
           if(data.type === 'delete_msg'){
               $(".choose_chat_id[data-message_id='"+data.msg_id+"']").each(function () {
                   if(this.dataset.typetable === data.get_table){
                       this.remove()
                   }
               });
           }else if(data.type === 'edit_msg'){
               $(".choose_chat_id[data-message_id='"+data.msg_id+"']").each(function () {
                   if(this.dataset.typetable === data.get_table){
                       $(this).contents('#content_message').contents('.text_massege_chat').text(data.msg_text);
                   }
               });
           }
        });

        socket.on(clientId,function (data) {
            if(data.type === 'bit'){
                $('#lot_was_bit').css('display', 'block');
                let elemTb = $($('#lot_was_bit').children('.timeout_content').children('table').children('tbody').children());
                let ttttt = $((elemTb).get(0)).children();
                let rrrr = $((ttttt).get(0)).children();
                $((rrrr).get(1)).text(data.transact);
            }
            else if(data.type === 'privet_messegdes'){
                if(data.chat_id === my_chat_id){
                    $(document.getElementById('chat_messegde')).append('<div class="choose_chat_id" data-chat_user_id="'+data.to+'" data-message_id="'+ data.msg_id +'" data-choose_chat_id="'+ data.chat_id +'" data-typeTable="'+data.type+'"><div class="content_message-refferal_personal"> <div class="icon_refferal_chat"></div> <div class="pos_name_time"><div class="name_massege_chat_personal">@ '+ data.name +'</div><div class="time_massege_chat">'+ data.create +'</div><div style="clear: both;"></div></div><div class="text_massege_chat">'+data.message+'</div><div style="clear: both;"></div></div> <div class="icon_edit_chat_right"><div class="img_icon_edit_chat_right" data-answer_chat="'+data.msg_id+'"></div></div><div style="clear: both;"></div> <div class="answer_menu_chat" id="answer_menu_chat" data-answer_chat="'+data.msg_id+'"><ul><li>Відповідь в чат інвестору</li>><li>Відповідь інвестору</li></ul></div></div>');
                    console.log('my_chat_id');
                }else if(data.chat_id === affiliateChat) {
                    $(document.getElementById('chat_messegde')).append('<div class="choose_chat_id" data-chat_user_id="'+data.to+'" data-message_id="'+ data.msg_id +'" data-choose_chat_id="'+ data.chat_id +'" data-typeTable="'+data.type+'"><div class="content_message-affiliatte_personal"> <div class="icon_affiliatte_chat"></div> <div class="pos_name_time"><div class="name_massege_chat_personal">@ '+ data.name +'</div><div class="time_massege_chat">'+ data.create +'</div><div style="clear: both;"></div></div><div class="text_massege_chat">'+data.message+'</div><div style="clear: both;"></div></div> <div class="icon_edit_chat_right"><div class="img_icon_edit_chat_right" data-answer_chat="'+data.msg_id+'"></div></div><div style="clear: both;"></div> <div class="answer_menu_chat" id="answer_menu_chat" data-answer_chat="'+data.msg_id+'"><ul><li>Відповідь в чат інвестору</li><li>Відповідь інвестору</li></ul></div></div>');
                }
                document.getElementById("chat_messegde").scrollTop = 9999;
            }
            else if(data.type === 'lider_position'){
                let open_windiw_lot_take_off = $('#lot_take_off');
                open_windiw_lot_take_off.css('display', 'block');
                let elemTb = open_windiw_lot_take_off.children('.timeout_content').children('table').children('tbody').children();
                let text_field = $((elemTb).get(0)).children();
                $(text_field).text('Ви виграли лот № '+data.transaction+'. Вам нараховано '+data.token+' токенів з емісійною вартістю по '+data.rate_lot+' $');
            }
            else if(data.type === 'previous_position'){
                let new_token_prev = (data.prev_bet_act/data.rate_lot).toFixed(2);
                let open_windiw_lot_take_off = $('#lot_take_off');
                open_windiw_lot_take_off.css('display', 'block');
                let elemTb = open_windiw_lot_take_off.children('.timeout_content').children('table').children('tbody').children();
                let text_field = $((elemTb).get(0)).children();
                $(text_field).text('Вам не вдалось виграти лот № '+data.transaction+'. На суму зробленої ставки '+data.prev_bet_act+' $ Вам нараховано '+new_token_prev+' токена з емісійною вартістю по '+data.rate_lot+' $');
            }
            else if(data.type === 'seller_position'){
                let open_windiw_lot_take_off = $('#lot_take_off');
                open_windiw_lot_take_off.css('display', 'block');
                let elemTb = open_windiw_lot_take_off.children('.timeout_content').children('table').children('tbody').children();
                let text_field = $((elemTb).get(0)).children();
                $(text_field).text('Вітаємо! Ваш лот № '+data.transaction+' було продано на аукціоні. '+data.token+' токенів емісійної вартості '+data.rate+' $/шт продано за '+data.price+' $');

                console.log('seller_position');
            }
            else if(data.type === 'noAct_seller_position'){
                let open_windiw_lot_take_off = $('#lot_take_off');
                open_windiw_lot_take_off.css('display', 'block');
                let elemTb = open_windiw_lot_take_off.children('.timeout_content').children('table').children('tbody').children();
                let text_field = $((elemTb).get(0)).children();
                $(text_field).text('Лот № '+data.transaction+' не активовано протягом 72 годин. '+data.token+' токенів знято з аукціону.');
            }
            else if(data.type === 'noAct_first_position'){
                let get_affiliat_payment = (data.first_bit*5/95).toFixed(2);
                let open_windiw_lot_take_off = $('#lot_take_off');
                open_windiw_lot_take_off.css('display', 'block');
                let elemTb = open_windiw_lot_take_off.children('.timeout_content').children('table').children('tbody').children();
                let text_field = $((elemTb).get(0)).children();
                $(text_field).text('Лот № '+data.transaction+' не активовано протягом 72 годин. На Ваш рахунок повернуто суму в розмірі $'+data.first_bit+' + $'+get_affiliat_payment+' (5 % зарезервованих для аффіліата)');
            }
        });

        // setTimeout(function () {
        //     clientSocket.emit('privet', { type: 'seller_position', from: clientId,
        //         to: '4'});
        //     console.log('send');
        // }, 1000);


        // setTimeout(function () {
        //     clientSocket.emit('send_group_msg', { chat_id: affiliateChat,
        //         msg: 'first'});
        // }, 0);

    });
}, 0);

////$('#foo').data('num', num);
// var my_chat_id = '';
// var affiliateChat ='';
