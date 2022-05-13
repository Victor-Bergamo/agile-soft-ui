<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'role_page', 'role_id', 'page_id')->withPivot('authorized');
    }
}
