<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;


class Pengguna extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
    
    protected $fillable = [
        'name', 'nim', 'email', 'password', 'role_id', 'isLogin',
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // public function hasRole($role)
    // {
    //     return $this->roles->contains('name', $role);
    // }

    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

}

