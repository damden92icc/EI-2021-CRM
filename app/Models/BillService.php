<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillService extends Model
{
    use HasFactory;

    protected  $fillable  = [
        'total_sp_ht', 
        'vat_rate', 
        'bill_id',
        'ps_id'             
    ];

    

    public function bills()
    {
        return $this->belongsTo(Bill::class, 'id', 'bill_id');
    }


    public function service()
    {
        return $this->hasOne(ProjectService::class,  'id', 'ps_id');
    }
}
