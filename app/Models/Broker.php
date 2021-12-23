<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    use HasFactory;
    //new add
    protected $guarded = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
