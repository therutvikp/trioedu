<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\RolePermission\Entities\TrioPermissionAssign;

class Role extends Model
{
    //
    public function permissions()
    {
        return $this->hasMany(TrioPermissionAssign::class, 'role_id', 'id');
    }
}
