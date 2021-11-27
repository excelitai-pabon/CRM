<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentYear extends Model
{
    use HasFactory;
    protected $guarded = [

    ];
    protected $casts = [
        'installment_years_amount' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
