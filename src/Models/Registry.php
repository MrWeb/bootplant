<?php
namespace Futurelabs\Bootplant\Models;

use Futurelabs\Bootplant\Models\Meta;
use Futurelabs\Bootplant\Models\User;
use Futurelabs\Bootplant\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Registry extends Model
{
    use Uuids;

    protected $table    = 'registries';
    protected $fillable = ['fname', 'lname', 'CF', 'phone', 'email', 'address', 'city', 'zip', 'district', 'company', 'PIVA'];

    public $timestamps   = true;
    public $incrementing = false;
    private $errors;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $uuid = 'id';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->branch_id = Auth::user()->branch_id;
            $query->user_id   = Auth::user()->id;
        });
    }

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meta()
    {
        return $this->hasMany(Meta::class);
    }
}
