<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferService extends Model
{
    protected  $fillable  = [
        'quantity', 
        'unit_cost_ht', 
        'unit_sell_ht', 
        'service_id',
        'offer_id'
             
    ];

    

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'id', 'offer_id');
    }


    public function service()
    {
        return $this->hasOne(Service::class,  'id', 'service_id');
    }

}
