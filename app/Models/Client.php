<?php

namespace App\Models;

use App\Models\Observers\ClientObserver;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Client
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Collection|\App\Models\Order[] $orders
 * @property \App\Models\User $user
 */
class Client extends BaseModel
{
    use Sortable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'note',
        'user_id',
    ];

    public $sortable = [
        'id',
        'name',
    ];

    public static function boot()
    {
        parent::boot();

        self::observe(ClientObserver::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
