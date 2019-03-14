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

    public function meta()
    {
        return $this->hasMany(Meta::class);
    }
}
