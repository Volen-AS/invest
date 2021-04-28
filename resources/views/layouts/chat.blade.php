<div class="chat_cabinet">
    <h4>Чат рефкоманди</h4>
    <ul class="shoutbox-content" id="chat_messegde" data-my_id_in_chat="{{Auth::id()}}" data-my_chat_data="{{auth()->user()->getChat_id()->chat_id}}">
        @if(count($chat_messegdes))

            @foreach($chat_messegdes as $chat_messegde)
{{--                              privet message--}}
                @if($chat_messegde->getTable() =='privet_messegdes')
{{--                                    my chat--}}
                    @if($chat_messegde->chat_id == auth()->user()->getChat_id()->chat_id)
{{--                                            my message--}}
                        @if($chat_messegde->u_id == Auth::id())
                            <div class="choose_chat_id" data-message_id="{{$chat_messegde->message_id}}" data-choose_chat_id="{{$chat_messegde->chat_id}}" data-typeTable="{{$chat_messegde->getTable()}}">
                                <div class="icon_edit_chat">
                                    <div id="img_icon_edit_chat" class="img_icon_edit_chat" data-edit_chat="{{$chat_messegde->message_id}}">

                                    </div>
                                </div>
                                <div id="content_message"  class="content_message-myref_personal">
                                    <div class="pos_name_time-myref">
                                        <div class="icon_arrow_chat"></div><div class="question_for_your">@ {{$chat_messegde->user_msg_name}}</div>
                                        <div class="time_massege_chat">{{$chat_messegde->created_at}}</div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="text_massege_chat">{{$chat_messegde->message}}</div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div style="clear: both;"></div>

                                <div class="edit_menu_chat" id="edit_menu_chat" data-edit_chat="{{$chat_messegde->message_id}}">
                                    <ul>
                                        <li id="updataMsg" >Редагувати</li>
                                        <li id="daleteMsg">Видалити</li>
                                    </ul>
                                </div>
                            </div>
                        @else
{{--                            my chat msg to me--}}
                            <div class="choose_chat_id" data-chat_user_id="{{$chat_messegde->u_id}}" data-message_id="{{$chat_messegde->message_id}}" data-choose_chat_id="{{$chat_messegde->chat_id}}" data-typeTable="{{$chat_messegde->getTable()}}">
                                <div id="content_message" class="content_message-refferal_personal">
                                    <div class="icon_refferal_chat"></div>
                                    <div class="pos_name_time">
                                        <div id="name_in_massege" class="name_massege_chat_personal">@ {{$chat_messegde->user_msg_name}}</div>
                                        <div class="time_massege_chat">{{$chat_messegde->created_at}}</div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="text_massege_chat">{{$chat_messegde->message}}</div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="icon_edit_chat_right">
                                    <div class="img_icon_edit_chat_right" data-answer_chat="{{$chat_messegde->message_id}}"></div>
                                </div>

                                <div style="clear: both;"></div>

                                <div class="answer_menu_chat" id="answer_menu_chat" data-answer_chat="{{$chat_messegde->message_id}}">
                                    <ul>
                                        <li id="msg_in_chat">Відповідь в чат інвестору</li>
                                        <li id="priv_msg">Відповідь інвестору</li>
                                    </ul>
                                </div>
                            </div>

                        @endif
                    @else
            {{--         privet msg aff chat--}}
                        @if($chat_messegde->u_id == Auth::id())
                    {{--         privet msg aff chat my msg--}}
                            <div class="choose_chat_id" data-message_id="{{$chat_messegde->message_id}}" data-choose_chat_id="{{$chat_messegde->chat_id}}" data-typeTable="{{$chat_messegde->getTable()}}">
                                <div class="icon_edit_chat">
                                    <div class="img_icon_edit_chat" data-edit_chat="{{$chat_messegde->message_id}}"></div>
                                </div>
                                <div id="content_message" class="content_message-myaffil_personal">
                                    <div class="pos_name_time-myaffil">
                                        <div class="icon_arrow_chat"></div><div class="question_for_your">@ {{$chat_messegde->user_msg_name}}</div>
                                        <div class="time_massege_chat">{{$chat_messegde->created_at}}</div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="text_massege_chat">{{$chat_messegde->message}}</div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div style="clear: both;"></div>

                                <div class="edit_menu_chat" id="edit_menu_chat" data-edit_chat="{{$chat_messegde->message_id}}">
                                    <ul>
                                        <li id="updataMsg" >Редагувати</li>
                                        <li id="daleteMsg">Видалити</li>
                                    </ul>
                                </div>
                            </div>

                        @else
            {{--         privet msg aff chat to me--}}
                            <div class="choose_chat_id" data-chat_user_id="{{$chat_messegde->u_id}}" data-message_id="{{$chat_messegde->message_id}}" data-choose_chat_id="{{$chat_messegde->chat_id}}" data-typeTable="{{$chat_messegde->getTable()}}">
                                <div id="content_message" class="content_message-affiliatte_personal">
                                    <div class="icon_affiliatte_chat"></div>
                                    <div class="pos_name_time">
                                        <div id="name_in_massege" class="name_massege_chat_personal">@ {{$chat_messegde->user_msg_name}}</div>
                                        <div class="time_massege_chat">{{$chat_messegde->created_at}}</div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="text_massege_chat">{{$chat_messegde->message}}</div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="icon_edit_chat_right">
                                    <div class="img_icon_edit_chat_right" data-answer_chat="{{$chat_messegde->message_id}}"></div>
                                </div>

                                <div style="clear: both;"></div>

                                <div class="answer_menu_chat" id="answer_menu_chat" data-answer_chat="{{$chat_messegde->message_id}}">
                                    <ul>
                                        <li id="msg_in_chat">Відповідь в чат інвестору</li>
                                        <li id="priv_msg">Відповідь інвестору</li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endif
                @elseif($chat_messegde->getTable() == 'chat_list_messegdes')
{{--            group msg--}}
                    @if($chat_messegde->chat_id == auth()->user()->getChat_id()->chat_id)
{{--                 group my chat--}}
                        @if($chat_messegde->u_id == Auth::id())
{{--                    group my chat i wrotet--}}
                            <div class="choose_chat_id" data-message_id="{{$chat_messegde->message_id}}" data-choose_chat_id="{{$chat_messegde->chat_id}}" data-typeTable="{{$chat_messegde->getTable()}}">
                                <div class="icon_edit_chat">
                                    <div id="img_icon_edit_chat" class="img_icon_edit_chat" data-edit_chat="{{$chat_messegde->message_id}}"></div></div>
                                <div id="content_message" class="content_message-myref">
                                    <div class="pos_name_time-myref">
                                        <div class="time_massege_chat">{{$chat_messegde->created_at}}</div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="text_massege_chat">{{$chat_messegde->message}}</div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div style="clear: both;"></div>

                                <div class="edit_menu_chat" id="edit_menu_chat" data-edit_chat="{{$chat_messegde->message_id}}">
                                    <ul>
                                        <li id="updataMsg" >Редагувати</li>
                                        <li id="daleteMsg">Видалити</li>
                                    </ul>
                                </div>
                            </div>
                        @else
{{--                    group my chat to me--}}
                            <div class="choose_chat_id" data-chat_user_id="{{$chat_messegde->u_id}}" data-message_id="{{$chat_messegde->message_id}}" data-choose_chat_id="{{$chat_messegde->chat_id}}" data-typeTable="{{$chat_messegde->getTable()}}">
                                <div id="content_message" class="content_message-refferal">
                                    <div class="icon_refferal_chat"></div>
                                    <div class="pos_name_time">
                                        <div id="name_in_massege" class="name_massege_chat">{{$chat_messegde->name}}</div>
                                        <div class="time_massege_chat">{{$chat_messegde->created_at}}</div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="text_massege_chat">{{$chat_messegde->message}}</div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="icon_edit_chat_right">
                                    <div class="img_icon_edit_chat_right" data-answer_chat="{{$chat_messegde->message_id}}"></div>
                                </div>

                                <div style="clear: both;"></div>

                                <div class="answer_menu_chat" id="answer_menu_chat" data-answer_chat="{{$chat_messegde->message_id}}">
                                    <ul>
                                        <li id="msg_in_chat">Відповідь в чат інвестору</li>
                                        <li id="priv_msg">Відповідь інвестору</li>
                                    </ul>
                                </div>
                            </div>


                        @endif
                    @else
{{--                 group  affiliat chat--}}
                        @if($chat_messegde->u_id == Auth::id())
{{--                    group affiliate chat i wrote--}}
                            <div class="choose_chat_id" data-message_id="{{$chat_messegde->message_id}}" data-choose_chat_id="{{$chat_messegde->chat_id}}" data-typeTable="{{$chat_messegde->getTable()}}">
                                <div class="icon_edit_chat"><div id="img_icon_edit_chat" class="img_icon_edit_chat" data-edit_chat="{{$chat_messegde->message_id}}"></div></div>
                                <div id="content_message"  class="content_message-myaffil">
                                    <div class="pos_name_time-myaffil">
                                        <div class="time_massege_chat">{{$chat_messegde->created_at}}</div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="text_massege_chat">{{$chat_messegde->message}}</div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div style="clear: both;"></div>

                                <div class="edit_menu_chat" id="edit_menu_chat" data-edit_chat="{{$chat_messegde->message_id}}">
                                    <ul>
                                        <li id="updataMsg" >Редагувати</li>
                                        <li id="daleteMsg">Видалити</li>
                                    </ul>
                                </div>
                            </div>

                        @else
{{--                    group affiliate chat to me--}}
                            <div class="choose_chat_id" data-chat_user_id="{{$chat_messegde->u_id}}" data-message_id="{{$chat_messegde->message_id}}" data-choose_chat_id="{{$chat_messegde->chat_id}}" data-typeTable="{{$chat_messegde->getTable()}}">
                                <div id="content_message" class="content_message-affiliatte">
                                    <div class="icon_affiliatte_chat"></div>
                                    <div class="pos_name_time">
                                        <div id="name_in_massege" class="name_massege_chat">{{$chat_messegde->name}}</div>
                                        <div class="time_massege_chat">{{$chat_messegde->created_at}}</div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="text_massege_chat">{{$chat_messegde->message}}</div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="icon_edit_chat_right">
                                    <div class="img_icon_edit_chat_right" data-answer_chat="{{$chat_messegde->message_id}}"></div>
                                </div>

                                <div style="clear: both;"></div>

                                <div class="answer_menu_chat" id="answer_menu_chat" data-answer_chat="{{$chat_messegde->message_id}}">
                                    <ul>
                                        <li id="msg_in_chat">Відповідь в чат інвестору</li>
                                        <li id="priv_msg">Відповідь інвестору</li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endif
                @endif
            @endforeach
        @else
        @endif

    </ul>
    <div class="shoutbox-form">
        <textarea id="new-message" name="message_text" rows="3" placeholder="Ваше повідомлення"></textarea>
    </div>
    <button id="msq_button" class="button_chat_cabinet">Відправити</button>
    <button id="msq_edit_button" class="button_edit_chat_cabinet">Редагувати</button>

      <div style="clear: both;"></div>
</div>

            <script src="https://code.jquery.com/jquery-3.4.0.min.js"
             integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>



            <script src="{{ URL::asset('js/chat.js') }}"></script>

