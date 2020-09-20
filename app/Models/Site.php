<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = "sites";

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
