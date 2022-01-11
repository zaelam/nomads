<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimoni extends Model
{
    use SoftDeletes;
    protected $table = 'testimonies';
    protected $fillable = [
        'travel_packages_id', 'users_id', 'transactions_id', 'testimoni', 'rate'
    ];

    protected $hidden = [];


    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
