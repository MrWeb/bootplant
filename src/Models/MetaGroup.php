<?php

namespace Futurelabs\Bootplant\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MetaGroup extends Model
{
    protected $table = 'meta_groups';

    public $timestamps = true;

    protected $fillable = ['*'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    private $rules = [
        'name' => 'string|max:150|nullable',
        'slug' => 'string|max:150|nullable',
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

    public function metas()
    {
        return $this->hasMany(Meta::class, 'meta_group_slug', 'slug');
    }
}
