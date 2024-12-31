<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sector extends Model
{
    use HasFactory;
    protected $table = 'sector';
    protected $fillable = [
        'name',
        'image',
        'sub',
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class, 'sector_id');
    }
}
