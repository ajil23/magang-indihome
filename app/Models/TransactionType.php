<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionType extends Model
{
    use HasFactory;
    protected $table = 'transaction_type';
    protected $fillable = [
        'service',
        'type',
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class, 'transaction_type_id');
    }
}
