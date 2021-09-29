<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBill extends Model
{
    protected  $fillable  = [
        'message', 
        'send_date',    
        'bill_id'             
    ];

    
    public function bills()
    {
        return $this->belongsTo(Bill::class, 'id', 'bill_id');
    }

}
