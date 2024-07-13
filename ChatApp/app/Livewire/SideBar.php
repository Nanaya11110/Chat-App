<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class SideBar extends Component
{
    public $pick ='TESTING';
    public $user;
    
    public function Chat()
    {
        $this->pick= 'chat';
        $this->dispatch('Chat',$this->pick);
    }
    public function Profile()
    {
        $this->pick= 'Profile';
        $this->dispatch('Profile',$this->pick);
    }
    public function UserList()
    {
        $this->pick= 'User List';
        $this->dispatch('Profile',$this->pick);
    }

    #[On('refreshSideBar')]
    public function refresh()
    {
        $this->dispatch('$refresh');
    }
   
    public function render()
    {
        $this->user= User::find(auth()->user()->id);
        return view('livewire.SideBar');
    }
}
