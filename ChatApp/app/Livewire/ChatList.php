<?php

namespace App\Livewire;

use App\Models\conversation;
use App\Models\User;
use App\Models\messenge;
use Livewire\Attributes\On;
use Livewire\Component;

use function Laravel\Prompts\alert;

class ChatList extends Component
{
    public $user;
    public $search;   
    public $pick=1;
    public $conversationLatestMessenge;

    public $authUser;
    public function mount()
    {
       $this->authUser = auth()->user();
    }

    public function getListeners()
    {
        return [
            "echo:user.{$this->authUser->id},SendMessage" => 'refresh',
        ];
    }
    #[On('RefreshChatList')]
    public function refresh()
    {
      $this->dispatch('$refresh');
    }
    public function conversations($Userid,$ConId)
    {
        $this->pick =$Userid;
        $this->dispatch('conversations',$Userid,$ConId);
    }
    public function render()
    {   
        $authUser = User::find(auth()->user()->id);
        $list = conversation::where('chat_id',auth()->user()->id)->orwhere('user_id',auth()->user()->id)->get();
        for($i=0; $i < count($list); $i++)
        {   $conversationsId[$i] = $list[$i]->id;
            if ($list[$i]->user_id == auth()->user()->id) $user[$i] = User::where('id','=',$list[$i]->chat_id)->first();
            else $user[$i] = User::where('id','=',$list[$i]->user_id)->first();
            $user[$i]['conversationsId'] =$conversationsId[$i];
            $user[$i]['latestMessenge'] = $this->conversationLatestMessenge = conversation::find($i+1)?->latesMessenge?->content;
            $user[$i]['latestMessengeTimes'] = $this->conversationLatestMessenge = conversation::find($i+1)?->latesMessenge?->created_at->diffForHumans();
            //dd($this->conversationLatestMessenge);
        }
      // dd($user);
      $this->user = $user;
        if (isset($user))
        {
            return view('livewire.ChatList');
        }
    }
}
