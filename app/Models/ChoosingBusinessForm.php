<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChoosingBusinessForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'basic_info',
        'income',
        'deduction',
        'other',
        'status',
    ];

    protected $casts = [
        'basic_info' => 'array',
        'income' => 'array',
        'deduction' => 'array',
        'other' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
