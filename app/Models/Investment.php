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

    /**
     * Returns the item's price according to its worthy
     */
    public function getProfitAttribute()
    {
        return $this->amount * $this->profit_percentage;
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
