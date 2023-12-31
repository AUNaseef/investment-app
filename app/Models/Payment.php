<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'investment_id',
        'amount',
        'due_date',
        'paid'
    ];

    public function investment(){
        return $this->belongsTo(Investment::class);
    }
}
