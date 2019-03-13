<?php

namespace Futurelabs\Bootplant\Models;

use Futurelabs\Bootplant\Models\Branch;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    public function brancher($class)
    {
        //Prende $class e seleziona i dati in base ai permessi e branch_id
        if ($this->hasRole("Super-Admin")) {
            return $class::query();
        }

        if ($this->hasRole("Admin")) {
            return $class::where('branch_id', '=', $this->branch()->pluck('id'));
        }
        return $this->hasMany($class, 'user_id');
    }
}
