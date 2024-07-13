<?php

namespace App\Livewire;

use App\Models\conversation;
use App\Models\User;
use Livewire\Component;

class UserList extends Component
{

    public $UserList;
    public $search;
    public $conversationList;
    public $List;
    public $list2;
    public function mount()
    {
        $this->conversationList = conversation::where('chat_id',auth()->user()->id)
        ->orwhere('user_id',auth()->user()->id)->get();
        $this->List = $this->conversationList->map(function($item){
            if($item->chat_id == auth()->user()->id) $user = User::find($item->user_id);
            else $user = User::find($item->chat_id);
            return ['id' => $user->id];
        })->unique('id');
        $this->list2 = $this->List->map(function($item){
            return $item['id'];
        });
    }
    public function AddConversation(User $user)
    {
       $conversation = new conversation();
       $conversation->chat_id = $user->id;
       $conversation->user_id = auth()->user()->id;
       $conversation->save();
    }
    public function render()
    {
        $this->List = $this->conversationList->map(function($item){
            if($item->chat_id == auth()->user()->id) $user = User::find($item->user_id);
            else $user = User::find($item->chat_id);
            return ['id' => $user->id];
        })->unique('id');
        $this->list2 = $this->List->map(function($item){
            return $item['id'];
        });
        $this->UserList = User::where('id','<>',auth()->user()->id)
        ->where('name','like','%'.$this->search . '%')
        ->whereNotIn('id',$this->list2)
        ->get();
        return view('livewire.UserList');
    }
}
