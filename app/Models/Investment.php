<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'admin_id',
        'amount',
        'profit_percentage',
        'date',
    ];

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
