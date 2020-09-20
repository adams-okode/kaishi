<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MPost extends Model
{
    use SoftDeletes;
    
    protected $table = "posts";

    protected $dates = ['deleted_at'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
