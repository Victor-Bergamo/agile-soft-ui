<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;

trait PageAccess
{
    /**
     * Check if role is allowed to access
     * 
     * @param string $role
     * 
     * @return bool
     */
    public function allowAccess(string $role)
    {
        if ($this->roles->pluck('slug')->contains($role) && $this->roles->firstWhere('slug', $role)->pivot->authorized) {
            return true;
        }

        return false;
    }

    /**
     * Check if role is deny to access
     * @param string $role
     * 
     * @return bool
     */
    public function denyAccess(string $role)
    {
        return !$this->allowAccess($role);
    }

    /**
     * Check if roles is accepted
     *  
     * @return array|Collection
     */
    public function rolesAccepted()
    {
        return $this->roles()->pluck('slug');
    }
}
