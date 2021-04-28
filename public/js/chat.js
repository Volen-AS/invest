$(document).ready(function(){
});
var my_chat_id = document.getElementById('chat_messegde');
var chat_id = my_chat_id.dataset.my_chat_data;
var chat_user_id = "";
var msg_id = "";
var get_msg_tb = "";


//show last message in  chat
document.getElementById("chat_messegde").scrollTop = 9999;

// edit message
$(document).on('click',"#updataMsg", function(){
    msg_id = $(this).closest('.choose_chat_id').data('message_id');
    get_msg_tb = $(this).closest('.choose_chat_id').data('typetable');
    chat_user_id = $(this).closest('.choose_chat_id').data('choose_chat_id');
    let msg_text = $(this).closest('.choose_chat_id').contents('#content_message').contents('.text_massege_chat').text();
    $(this).closest('#edit_menu_chat').hide();
    $(this).closest('.choose_chat_id').css('background', '#85A4C0');
    $(document.getElementById('new-message')).val(msg_text).focus();
    $(document.getElementById('msq_button')).hide();
    $(document.getElementById('msq_edit_button')).css('display','block');

});

$(document).on('click',"#msq_edit_button", function(){
    let msg_text = $(document.getElementById('new-message')).val();
    EditMessageAjax(msg_text,msg_id,get_msg_tb,chat_user_id);
});

function EditMessageAjax(msg_text,msg_id,get_msg_tb,chat_user_id){
    ajaxSetup();
    $.ajax({
        type: 'GET',
        url: '/editMessageAjax',
        data: {
            msg_id: msg_id,
            msg_text: msg_text,
            get_msg_tb:get_msg_tb
        },
        success: function (){
            $(".choose_chat_id[data-message_id='"+msg_id+"']").each(function () {
                if(this.dataset.typetable === get_msg_tb){
                    $(this).contents('#content_message').contents('.text_massege_chat').text(msg_text);
                    $(this).css('background', '#FFFFFF');
                    $(document.getElementById('new-message')).val('');
                    $(document.getElementById('msq_edit_button')).css('display','none');
                    $(document.getElementById('msq_button')).show();
                }
            });
            setTimeout(function () {
                clientSocket.emit('ed_del_msg', { chat_id: chat_user_id, type: 'edit_msg', msg_id: msg_id, get_table: get_msg_tb, msg_text: msg_text
                });
            }, 0);
        },
        error: function () {

        }
    });
}
//delete message
$(document).on('click',"#daleteMsg", function(){
    let msg_id = $(this).closest('.choose_chat_id').data('message_id');
    let get_table = $(this).closest('.choose_chat_id').data('typetable');
    let get_chat_id = $(this).closest('.choose_chat_id').data('choose_chat_id');
    $(this).closest('#edit_menu_chat').hide();
    deleteMessageAjax(msg_id,get_table,get_chat_id);
});
function deleteMessageAjax(msg_id,get_table,get_chat_id){
    ajaxSetup();
    $.ajax({
        type: 'GET',
        url: '/deleteMessageAjax',
        data: {
            msg_id: msg_id,
            get_table: get_table
        },
        success: function (){
            $(".choose_chat_id[data-message_id='"+msg_id+"']").each(function () {
                if(this.dataset.typetable === get_table){
                    this.remove()
                }
            });
            setTimeout(function () {
                clientSocket.emit('ed_del_msg', { chat_id: get_chat_id, type: 'delete_msg', msg_id: msg_id, get_table: get_table
                });
            }, 0);
        },
        error: function () {
            Console.log('oops');
        }
    });
}
//.remove();
//on clicl  message choose chat id, and change button color
$(document).on("click",".choose_chat_id",function() {
    chat_id = $(this).data('choose_chat_id');
    let msq_button_element = document.getElementById("msq_button");
    if(chat_id === my_chat_id.dataset.my_chat_data){
        if($(msq_button_element).hasClass("button_chat_cabinet_orange")){
            $(msq_button_element).removeClass("button_chat_cabinet_orange");
            $(msq_button_element).addClass('button_chat_cabinet_green');
        }
        else{
            $(msq_button_element).addClass('button_chat_cabinet_green');
        }

    }else{
        if($(msq_button_element).hasClass("button_chat_cabinet_green")){
            $(msq_button_element).removeClass("button_chat_cabinet_green");
            $(msq_button_element).addClass('button_chat_cabinet_orange');
        }
        else{
            $(msq_button_element).addClass('button_chat_cabinet_orange');
        }
    }
});

//privat answer: choose chat_user_id(to_u_id), move NickName in textarea
$(document).on('click',"#priv_msg", function () {
    chat_user_id = $(this).closest('.choose_chat_id').data('chat_user_id');
    $(this).closest('#answer_menu_chat').hide();
    let name_for_priv_msg = $(this).closest('.choose_chat_id').contents('#content_message').contents('.pos_name_time').contents('#name_in_massege').text().replace(/\s+/g, '');
    $(function()  {
        let first_letter = name_for_priv_msg.charAt(0);
        if(first_letter === '@'){
            $(document.getElementById('new-message')).val(name_for_priv_msg+'\n').focus();
        }
        else{
            $(document.getElementById('new-message')).val("@"+name_for_priv_msg+'\n').focus();
        }
    });

});
//chat answer from menu, all date catch on click menu? we just close menu
$(document).on('click',"#msg_in_chat", function () {
    $(this).closest('#answer_menu_chat').hide();
});

//  check if !is_null message and send data to ajax function
$(".button_chat_cabinet").on('click', function () {
    let message_text = $(document.getElementById('new-message')).val();

    if (message_text === ""){
        console.log('Enter message');
    }
    if(chat_user_id !== "" && message_text !== ""){

        sendMessageAjax(message_text.replace(/^.*\n/g,""), chat_id,chat_user_id,);
    }
    if(chat_user_id === "" && message_text !== ""){
        sendMessageAjax(message_text, chat_id, chat_user_id= null);
    }
    chat_user_id="";

});

// send Ajax to ChatController save and response for show user new message in chat
function sendMessageAjax(message_text, chat_id,chat_user_id) {
    ajaxSetup();
    $.ajax({
        type: 'GET',
        url: '/sendMessageAjax',
        data: {
            message_text: message_text,
            chat_id: chat_id,
            chat_user_id: chat_user_id
        },
        success: function (data) {
            if(my_chat_id.dataset.my_chat_data !== data.newMessage[0].chat_id){
                if(data.getTable === 'privet_messegdes'){
                    //affiliat chat privet
                    $(document.getElementById('chat_messegde')).append('<div class="choose_chat_id" data-message_id="'+ data.newMessage[0].message_id +'" data-choose_chat_id="'+ data.newMessage[0].chat_id + '" data-typeTable="'+data.getTable+'"><div class="icon_edit_chat"><div class="img_icon_edit_chat" data-edit_chat="'+ data.newMessage[0].message_id +'"></div></div><div id="content_message" class="content_message-myaffil_personal"><div class="pos_name_time-myaffil"><div class="icon_arrow_chat"></div><div class="question_for_your">@ '+ data.newMessage[0].name +'</div><div class="time_massege_chat">'+data.newMessage[0].created_at+'</div><div style="clear: both;"></div></div><div class="text_massege_chat">'+data.newMessage[0].message+'</div><div style="clear: both;"></div></div><div style="clear: both;"></div><div class="edit_menu_chat" id="edit_menu_chat" data-edit_chat="'+data.newMessage[0].message_id+'"><ul><li>Редагувати</li><li>Видалити</li></ul></div></div>');

                    setTimeout(function () {
                        clientSocket.emit('privet', { type: data.getTable, from: data.newMessage[0].u_id,
                             to: data.newMessage[0].to_uid, chat_id: data.newMessage[0].chat_id, message: data.newMessage[0].message,
                             msg_id:data.newMessage[0].message_id, create: data.newMessage[0].created_at, name:data.current_name });

                    }, 0);
                }
                //affiliat chat group
                else if(data.getTable === 'chat_list_messegdes'){
                    $(document.getElementById('chat_messegde')).append('<div class="choose_chat_id" data-choose_chat_id="' + data.newMessage[0].chat_id + '" data-message_id="'+ data.newMessage[0].message_id+'" data-typeTable="'+data.getTable+'"><div class="icon_edit_chat"><div class="img_icon_edit_chat" data-edit_chat="'+ data.newMessage[0].message_id +'"></div></div><div id="content_message" class="content_message-myaffil"><div class="pos_name_time-myaffil"><div class="time_massege_chat">' + data.newMessage[0].created_at+ '</div><div style="clear:both;"></div></div><div class="text_massege_chat">'+data.newMessage[0].message+'</div><div style="clear:both;"></div><div style="clear:both;"></div><div class="edit_menu_chat" id="edit_menu_chat" data-edit_chat="'+data.newMessage[0].message_id+'"><ul><li>Редагувати</li><li>Видалити</li></ul></div></div>');

                    setTimeout(function () {
                        clientSocket.emit('send_group_msg', { chat_id: data.newMessage[0].chat_id, type: data.getTable,create: data.newMessage[0].created_at,
                        message: data.newMessage[0].message, msg_id:data.newMessage[0].message_id,name:data.newMessage[0].name, u_id:data.newMessage[0].u_id
                        });
                    }, 0);
                }
            }
            else{
                //my chat privet msg
                if(data.getTable === 'privet_messegdes'){
                    $(document.getElementById('chat_messegde')).append('<div class="choose_chat_id" data-message_id="'+ data.newMessage[0].message_id+'" data-choose_chat_id="'+ data.newMessage[0].chat_id + '" data-typeTable="'+data.getTable+'"><div class="icon_edit_chat"><div  class="img_icon_edit_chat" data-edit_chat="'+ data.newMessage[0].message_id +'"></div></div><div id="content_message" class="content_message-myref_personal"><div class="pos_name_time-myref"><div class="icon_arrow_chat"></div><div class="question_for_your">@ '+ data.newMessage[0].name +'</div><div class="time_massege_chat">'+data.newMessage[0].created_at+'</div><div style="clear: both;"></div></div><div class="text_massege_chat">'+data.newMessage[0].message+'</div><div style="clear: both;"></div></div><div style="clear: both;"></div><div class="edit_menu_chat" id="edit_menu_chat" data-edit_chat="'+data.newMessage[0].message_id+'"><ul><li>Редагувати</li><li>Видалити</li></ul></div></div>');

                    setTimeout(function () {
                        clientSocket.emit('privet', { type: data.getTable, from: data.newMessage[0].u_id,
                            to: data.newMessage[0].to_uid, chat_id: data.newMessage[0].chat_id, message: data.newMessage[0].message,
                            msg_id:data.newMessage[0].message_id, create: data.newMessage[0].created_at, name:data.current_name});
                    }, 0);

                }
                //my chat group msg
                else if(data.getTable === 'chat_list_messegdes') {
                    $(document.getElementById('chat_messegde')).append('<div class="choose_chat_id" data-choose_chat_id="' + data.newMessage[0].chat_id + '" data-message_id="'+ data.newMessage[0].message_id+'" data-typeTable="'+data.getTable+'"><div class="icon_edit_chat"><div class="img_icon_edit_chat" data-edit_chat="'+ data.newMessage[0].message_id +'"></div></div><div id="content_message" class="content_message-myref"><div class="pos_name_time-myref"><div class="time_massege_chat">' + data.newMessage[0].created_at+ '</div><div style="clear:both;"></div></div><div class="text_massege_chat">'+data.newMessage[0].message+'</div><div style="clear:both"></div></div><div style="clear: both;"></div><div class="edit_menu_chat" id="edit_menu_chat" data-edit_chat="'+data.newMessage[0].message_id+'"><ul><li>Редагувати</li><li>Видалити</li></ul></div></div>');
                    setTimeout(function () {
                        clientSocket.emit('send_group_msg', { chat_id: data.newMessage[0].chat_id, type: data.getTable,create: data.newMessage[0].created_at,
                            message: data.newMessage[0].message, msg_id:data.newMessage[0].message_id,name:data.newMessage[0].name, u_id:data.newMessage[0].u_id
                        });
                    }, 0);
                }
            }
            document.getElementById("chat_messegde").scrollTop = 9999; //show last message in chat
            $(document.getElementById('new-message')).val(''); //clean texArea
        },
        error: function () {
            ajaxErrorsHandling(jqxhr, status, errorMsg);
        }
    })
}


function ajaxErrorsHandling(jqxhr, status, errorMsg){
  $('.loading').hide();
  if(jqxhr.status === 401){
    $(location).attr('href', '/login/')
  }
  if(status === 404){
      alert('message  not found')
  }
  else{
      console.log('Oops');
  }
}
function ajaxSetup() {
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
}

$(document).on('click', '.img_icon_edit_chat', function(){
    $('#edit_menu_chat').toggle('#edit_menu_chat');
});
//Your sms for chat
//$(".img_icon_edit_chat").on("click", function(){
$(document).on('click', '.img_icon_edit_chat', function(){
    var edit_chat = $(this).data('edit_chat');
    $('#edit_menu_chat').hide();
    $('[data-edit_chat="' + edit_chat + '"]').show();

});

$(document).mouseup(function (e) {
    var container = $(".edit_menu_chat");
    if (container.has(e.target).length === 0){
        container.hide();
    }
});

//Diffrend sms for chat
$(".img_icon_edit_chat_right").on("click", function(){
    var answer_chat = $(this).data('answer_chat');
    $('#answer_menu_chat').hide();
    $('[data-answer_chat="' + answer_chat + '"]').show();

});

$(document).mouseup(function (e) {
    var container = $(".answer_menu_chat");
    if (container.has(e.target).length === 0){
        container.hide();
    }
});