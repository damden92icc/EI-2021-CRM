<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends  DocumentPriced
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'reference',
        'sended_date',
        'bill_state',        
        'total_cost_ht',
        'total_sell_ht',
        'validity_delay',
        'due_date',
        'owner_id',
        'concerned_company'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
    

    public function billServices()
    {
        return $this->hasMany(BillService::class, 'bill_id','id');
    }
}
