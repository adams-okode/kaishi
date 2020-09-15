<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPost extends Model
{
    protected $table = "posts";

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
