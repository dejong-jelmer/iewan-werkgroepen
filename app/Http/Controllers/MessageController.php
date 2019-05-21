<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Message;
use App\Workgroup;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function createMessage(Request $request, $user_id, $message_id = null)
    {
        $workgroup = null;
        if($request->has('workgroup_id')) {
            $workgroup = Workgroup::find($request->workgroup_id);
            $request->merge(['title' => '@' . $workgroup->name . ': ' . $request->title]);
        }
        // create the message
        $message = Message::create($request->only('title', 'body'));
        // associate the sender
        $message->senders()->save(Auth::user());
        if(!empty($message_id)) {
            $responseTo = Message::find($message_id);
            $message->responseTo()->associate($responseTo);
            if($responseTo->isWorkgroupMessage()) {
                $responseTo->replied = true;
                $responseTo->save();
            }
        }
        $message->save();

        // if the message is send to a workgroup save it for that workgroup and redirect to workgrouppage
        // else find the user redirect to user page
        if(!empty($workgroup)) {
            $users = $workgroup->users;
            foreach ($users as $user) {
                $message->receiver()->save($user);
            }
            $message->workgroup()->associate($workgroup);
            $message->save();
            return redirect()->route('workgroup', ['workgroup_id' => $workgroup->id])->with('success', 'Bericht verstuurd');

        }
        $user = User::find($user_id);
        $message->receiver()->save($user);
        return redirect()->route('show-user-messages')->with('success', 'Bericht verstuurd');
    }

    public function showCreateMessage($user_id)
    {
        $user = User::find($user_id);
        return view('user.index', compact('user'));
    }

    public function showUserMessage($message_id)
    {
        // find the received message
        $message = Auth::user()->messages()->where('messages.id', $message_id)->first();
        // if the message is a send message $message object is empty. If message is
        // a received message (and not an empty object) we want to check is as read
        if(!empty($message)){
          if($message->pivot->read == 0) {
            $message->pivot->read = 1;
            $message->pivot->save();
          }
        } else {
            // so if not a received message it has te be send
            $message = Auth::user()->sendMessages()->where('messages.id', $message_id)->first();
        }
        if(count($message->responseTo)) {
            $message = $message->responseTo;
        }
        return view('user.show-message', compact('message'));
    }
    public function showUserMessages()
    {
        $messages = Auth::user()->messages()->orderBy('created_at', 'desc')->paginate(50);
        $isSend = false;
        return view('user.show-messages', compact('messages', 'isSend'));
    }

    public function showSendUserMessages()
    {
        $messages = Auth::user()->sendMessages()->orderBy('created_at', 'desc')->paginate(50);
        $isSend = true;
        return view('user.show-messages', compact('messages', 'isSend'));
    }
    // @ToDo: werkt niet goed
    public function deleteUserMessage($message_id)
    {
        $user = Auth::user();
        $message = $user->messages()->wherePivot('message_id', $message_id)->first();
        if($message) {
            $user->messages()->detach($message);
        }
        return redirect()->route('show-user-messages')->with('success', 'Bericht verwijderd');
    }

    public function showWorkgroupMessages($workgroup_id)
    {
        $workgroup = Workgroup::find($workgroup_id);
        $messages = $workgroup->messages;
        $isSend = false;
        return view('user.show-messages', compact('messages', 'isSend'));
    }
    public function showWorkgroupMessage($workgroup_id, $message_id)
    {
        $workgroup = Workgroup::find($workgroup_id);
        // see showUserMessage
        $message = $workgroup->messages()->wherePivot('message_id', $message_id)->first();
        if(!empty($message)){
          if($message->pivot->read == 0) {
            $message->pivot->read = 1;
            $message->pivot->save();
          }
        } else {
            // so if not a received message it has te be send
            // $message = $workgroup->sendMessages()->where('messages.id', $message_id)->first();
        }
        // if(count($message->responseTo)) {
        //     $message = $message->responseTo;
        // }
        return view('user.show-message', compact('message'));
    }
}
