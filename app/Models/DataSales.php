<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataSales extends Model
{
    use HasFactory;
    protected $table = 'data_sales';
    protected $fillable = [
        'name',
        'image',
        'code',
        'agency',
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class, 'data_sales_id');
    }
}
