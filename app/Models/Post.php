<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function website()
    {
        return $this->belongsTo(Website::class, 'web_id');
    }
}
