<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
class Profile extends Component
{

    use WithFileUploads;

	
#[Validate('required|min:3')] 
    public $gmail;

	#[Validate('required|min:3')]
    public $password;
    
  #[Validate('image')]	
    public $image;
    public function update()
    {
        $validator= $this->validate();
        $user = User::find(auth()->user()->id);
        $user->email = $this->gmail;
        $user->password = Hash::make($this->password);
        $user->note = $this->password;
        if($this->image)
        {
		//dd($this->image);
            $validator['image'] = $this->image->store('upload','public');
            $user->avatar_url = 'storage/'.$validator['image'];
        };
        $user->save();
        //dd($user->avatar_url);
        $this->reset();
        $this->dispatch('refreshSideBar');
    }
    public function render()
    {
        return view('livewire.profile');
    }
}
