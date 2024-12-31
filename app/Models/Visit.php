<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;
    protected $table = 'visit';
    protected $fillable = [
        'location',
        'address',
        'date',
        'pic',
        'file',
        'description',
        'data_sales_id',
        'transaction_type_id',
        'sector_id'
    ];
    
    public function dataSales(): BelongsTo
    {
        return $this->belongsTo(DataSales::class, 'data_sales_id');
    }

    public function transactionType(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id');
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
