<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserManagement extends Component
{
    public function render()
    {
        $users = session('tenant_id') ? User::where('tenant_id', session('tenant_id'))->get() : User::all()->except(Auth::id());;

        return view('livewire.laravel-examples.user-management', [
            "users" => $users
        ]);
    }
}
