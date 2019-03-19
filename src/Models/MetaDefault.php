<?php

namespace Futurelabs\Bootplant\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MetaDefault extends Model
{
    /**
     * Lo scopo di questa tabella è settare i campi di default che
     * alla creazione di un nuovo branc vengono copiati nella
     * tabella meta con branch_id del nuovo branch
     * I campi locked non possono essere eliminati
     **/
    protected $table = 'meta_default';

    public $timestamps = true;

    protected $fillable = ['*'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
