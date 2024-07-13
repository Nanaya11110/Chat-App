<?php

namespace App\Livewire;

use App\Events\SendMessage;
use App\Models\conversation;
use App\Models\messenge;
use App\Models\User;
use App\Notifications\MessageSent;
use GuzzleHttp\Psr7\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatArea extends Component
{
    public $ChatUser;
    public $conversationId;
    public $message;
    public $paginate =10;
    public $allmessage;
    public $message_count;
    public $authUser;
    public function mount()
    {
       $this->authUser = auth()->user();
    }
    public function getListeners()
    {
        return [
            "echo:user.{$this->authUser->id},SendMessage" => 'UploadChatArea',
        ];
    }
    #[On('conversations')] 
    public function conversations($Userid,$ConId)
    {  
        $this->ChatUser = User::find($Userid);
        $this->conversationId = (int)$ConId;
        $this->message_count = messenge::where('conversations_id',$this->conversationId)->count();
        $this->allmessage = messenge::where('conversations_id',$this->conversationId)
        ->skip($this->message_count - $this->paginate)
        ->take($this->paginate)
        ->get();
        //  dd($this->allmessage);
        $this->dispatch('LoadConversationMessage');
       // broadcast(new SendMessage($this->ChatUser));
    }
    #[On('LoadMore')]
    public function loadmore()
    {
        //dd(123);
       $this->paginate +=5;
       $this->allmessage = messenge::where('conversations_id',$this->conversationId)
       ->skip($this->message_count - $this->paginate)
       ->take($this->paginate)
       ->get();
       //dd($this->allmessage);
    }
    public function SendMessage()
    {
       $message = new messenge();
       $message->content = $this->message;
       $message->chat_id = $this->ChatUser->id;
       $message->user_id = auth()->user()->id;
       $message->conversations_id = $this->conversationId;
       $message->save();
       $this->allmessage->push($message);
       $this->reset('message');
       $this->dispatch('MoveChatAreaToBottom');
       $this->dispatch('RefreshChatList');

       //Broadcast
       broadcast(new SendMessage($this->ChatUser,$message,$this->conversationId,'add'));
    }

   
    public function UploadChatArea($data)
    {
       //dd($data['conId'], $this->conversationId);
       if ($data['type'] == 'add')
       {
        if ($data['conId'] == $this->conversationId)
        {
         $message = messenge::find($data['messageId']);
         $this->allmessage->push($message);
         $this->dispatch('RefreshChatList');
        }
        else $this->dispatch('RefreshChatList');
       }
       else {
        $this->allmessage = messenge::where('conversations_id',$this->conversationId)
        ->skip($this->message_count - $this->paginate)
        ->take($this->paginate)
        ->get();
       }
       
    }
    public function Delete($id)
    {
        $messenge = messenge::find($id);
        $messenge->delete();
        $this->allmessage = messenge::where('conversations_id',$this->conversationId)
        ->skip($this->message_count - $this->paginate)
        ->take($this->paginate)
        ->get();
        
        broadcast(new SendMessage($this->ChatUser,$messenge,$this->conversationId,'delete'));
    }
    public function render()
    {
        return view('livewire.chatArea', [
            'user'=>$this->ChatUser,
        ]);
    }
}
