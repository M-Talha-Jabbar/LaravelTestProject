<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }
}
