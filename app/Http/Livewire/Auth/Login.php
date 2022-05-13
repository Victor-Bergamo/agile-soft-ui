<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    /** @var string */
    public $tenantName = '';

    /** @var string */
    public $username = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'username' => ['required'],
        'password' => ['required'],
    ];

    public function mount()
    {
        if (Auth::user()) {
            redirect('/dashboard');
        }
        $this->fill(['username' => 'henrique', 'password' => 'password']);
    }

    public function login()
    {
        try {
            $attempt = [
                'username' => $this->username,
                'password' => $this->password,
                'tenant_id' => null
            ];

            if ($this->tenantName) {
                $tenant = Tenant::where('name', '=', $this->tenantName)->firstOrFail();
                $attempt['tenant_id'] = $tenant->id;
            }

            if (!Auth::attempt($attempt)) {
                $this->addError('username', trans('auth.failed'));
                return;
            }
        } catch (\Exception $e) {
            $this->addError('tenantName', trans('auth.failed'));
            return;
        }

        return redirect()->intended('/dashboard');

        // $this->validate();
        // if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
        //     $user = User::where(["email" => $this->email])->first();
        //     auth()->login($user, $this->remember_me);
        //     return redirect()->intended('/dashboard');
        // } else {
        //     return $this->addError('email', trans('auth.failed'));
        // }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
