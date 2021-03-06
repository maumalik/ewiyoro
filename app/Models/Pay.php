<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tax_id',
        'ispayed',
    ];

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
