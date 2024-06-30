<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
    ];

    public $timestamps = false; // Решает проблему со столбцами updated_at, created_at. Команда отключает автоматическое вставление данных в столбцы.

}
