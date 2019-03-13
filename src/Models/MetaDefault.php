<?php

namespace Futurelabs\Bootplant\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MetaDefault extends Model
{
    protected $table = 'meta_default';

    public $timestamps = true;

    protected $fillable = ['*'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
