<?php

namespace Futurelabs\Bootplant\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = 'meta';

    public $timestamps = true;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    private $rules = [
        'label'          => 'string|max:150|nullable',
        'meta_group_id'  => 'integer',
        'branch_id'      => 'integer',
        'codice_interno' => 'string|max:50',
        'locked'         => 'integer',
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

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function group()
    {
        return $this->belongsTo(MetaGroup::class, 'meta_group_slug');
    }

    public static function values($group)
    {
        //Uso Meta::values('slug')->get()
        return self::where('group', '=', $group);
    }
}
