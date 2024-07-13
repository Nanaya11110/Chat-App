<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
   

    public $pick = 'chat';
    #[On('Profile')]
    public function profile($pick)
    {
        $this->pick = $pick;
    }

    #[On('Chat')]
    public function chat($pick)
    {
        $this->pick = $pick;
    }
    #[On('UserList')]
    public function UserList($pick)
    {
        $this->pick = $pick;
    }
    public function render()
    {
        return view('livewire.home');
    }
}
