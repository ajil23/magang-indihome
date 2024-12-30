<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
