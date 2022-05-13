<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Traits\PageAccess;
use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use PageAccess;

    protected $guarded = ['id'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_page', 'page_id', 'role_id')->withPivot('authorized');
    }
}
