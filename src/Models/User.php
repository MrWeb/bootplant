<?php

namespace Futurelabs\Bootplant\Models;

use Futurelabs\Bootplant\Models\Branch;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $append   = ['full_name'];
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guard_name = 'web';

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function brancher($class)
    {
        //Prende $class e seleziona i dati in base ai permessi e branch_id
        if ($this->hasRole("superadmin")) {
            return $class::query();
        }

        if ($this->hasRole("admin")) {
            return $class::where('branch_id', '=', $this->branch()->pluck('id'));
        }
        return $this->hasMany($class, 'user_id');
    }

    public function registries()
    {
        return $this->brancher(Registry::class);
    }
}
