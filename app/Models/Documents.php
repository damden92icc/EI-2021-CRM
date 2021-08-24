<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Documents extends Model
{
    
    protected $fillable = [
        'label',
        'description',
        'reference',
        'sended_date',

    ];

}
