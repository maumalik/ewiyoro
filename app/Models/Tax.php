<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function pays()
    {
        return $this->hasMany(Pay::class, 'tax_id', 'id');
    }
}
