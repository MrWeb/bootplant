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
    protected $appends  = ['full_name'];
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

    public function branches()
    {
        if ($this->hasRole("superadmin")) {
            return Branch::query();
        }

        return Branch::where('id', '=', $this->branch()->pluck('id'));
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

    public function getFullNameAttribute()
    {
        return "{$this->lastname} {$this->name}";
    }

    /**
     * Mostra solo gli utenti in base ai ruoli e al proprio branch
     * Superadmin = tutti
     * Admin = tutti solo del suo branch
     * Agente = nessuno
     **/
    public function users()
    {
        if ($this->hasRole("superadmin")) {
            return $this->where('id', '!=', 1)->with('roles');
        }

        if ($this->hasRole("admin")) {
            return User::where('branch_id', '=', $this->branch()->pluck('id'))->where('id', '!=', 1)->with('roles')->role(['admin', 'agente']);
        }

        return $this->where('id', 0);
    }

    public function registries()
    {
        return $this->brancher(Registry::class);
    }
}
