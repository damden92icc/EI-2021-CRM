<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class DocumentPriced  extends Documents
{
    use HasFactory;

    protected $fillable = [
        'total_cost_ht',
        'total_sell_ht',
        'validity_delay',
        'due_date',

    ];
}
