<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Chat_list_messegde;
use App\Models\Privet_messegde;


class ChatController extends Controller

{
	public function sendMessageAjax(Request $request){
		if(is_null($request->message_text)){

			return Response::json(['jqxhr'=>'your message was lost'], 404);
		}
		if(!is_null($request->chat_user_id)){
		    Validator::make($request->all(), [
                'message_text' => ['required', 'string'],
            ]);
            $pr_message = Privet_messegde::create([
                'message' =>$request->message_text,
                'chat_id' =>$request->chat_id,
                'u_id' => Auth::id(),
                'to_uid'=>$request->chat_user_id

            ]);
            $newMessage = Privet_messegde::where('message_id',$pr_message->message_id)
                    ->join('users', 'users.u_id','=','privet_messegdes.to_uid')
                    ->select('privet_messegdes.message_id','privet_messegdes.chat_id','privet_messegdes.u_id',
                        'privet_messegdes.to_uid','privet_messegdes.message','privet_messegdes.created_at','users.name')
                    ->get();
            $table = with(new Privet_messegde)->getTable();
            $current_name = Auth::user()->name;
                return response()->json(['newMessage'=>$newMessage,'getTable'=>$table,'current_name'=>$current_name]);
        }
		else{
            Validator::make($request->all(), [
                'message_text' => ['required', 'string'],
            ]);
            $groupMessage = Chat_list_messegde::create([
                'message' =>$request->message_text,
                'chat_id' =>$request->chat_id,
                'u_id' => Auth::id(),
            ]);
            $newMessage = Chat_list_messegde::where('message_id',$groupMessage->message_id)
                ->join('users', 'users.u_id','=','chat_list_messegdes.u_id')
                ->select('chat_list_messegdes.message_id','chat_list_messegdes.chat_id','chat_list_messegdes.u_id',
                    'chat_list_messegdes.message','chat_list_messegdes.created_at','users.name')
                ->get();
            $table = with(new Chat_list_messegde)->getTable();
                 return response()->json(['newMessage'=>$newMessage,'getTable'=>$table,]);
        }

    }

	public function editMessageAjax(Request $request){
         Validator::make($request->all(), [
            'msg_id' => ['required', 'integer'],
            'msg_text' => ['required', 'text'],
        ]);
        if($request->get_msg_tb == 'chat_list_messegdes'){
            Chat_list_messegde::where('message_id',$request->msg_id)->update(['message'=>$request->msg_text]);
        }else if($request->get_msg_tb == 'privet_messegdes'){
            Privet_messegde::where('message_id',$request->msg_id)->update(['message'=>$request->msg_text]);
        }
    }

    public function deleteMessageAjax(Request $request){
	    if($request->get_table == 'chat_list_messegdes'){
            Chat_list_messegde::where('message_id',$request->msg_id)->delete();
        }else if($request->get_table == 'privet_messegdes'){
           Privet_messegde::where('message_id',$request->msg_id)->delete();
        }
    }
}
