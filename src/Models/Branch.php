<?php

namespace Futurelabs\Bootplant\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Branch extends Model
{

    protected $table = 'branches';

    public $timestamps = true;

    protected $fillable = ['*'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    private $rules = [
        'name'    => 'string|max:150|nullable',
        'address' => 'string|max:150|nullable',
        'zip'     => 'string|max:15|nullable',
        'phone'   => 'string|nullable',
        'email'   => 'string|unique:users,email_address',
        'website' => 'string|nullable',
    ];

    private $errors;
    public function validate($data)
    {
        $v = Validator::make($data, $this->rules);
        if ($v->fails()) {
            $this->errors = $v->messages();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function estates()
    {
        return $this->hasMany(Estate::class);
    }

    public function meta()
    {
        return $this->hasMany(Meta::class);
    }

    /**
     * Tiene lo scope del branch in automatico in base all'utente
     * Da implementare per i super-admin una volta fatto il login
     */
    protected static function boot()
    {
        parent::boot();
        // Punta sempre e solo al branch_id dell'utente
        static::addGlobalScope('id', function (Builder $builder) {
            $builder->where('id', '=', 2); //2 va edited
        });
    }
}
