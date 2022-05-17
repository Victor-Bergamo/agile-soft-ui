<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Http\Request;

class Profile extends Component
{
    public $userId;

    public function render(Request $request)
    {
        $this->userId = $request->userId;
        return view('livewire.profile');
    }

    public function getUserProperty()
    {
        return User::find($this->userId);
    }
}
