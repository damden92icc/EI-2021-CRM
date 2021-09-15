<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferComment extends Model
{
    protected  $fillable  = [
        'message', 
        'send_date',    
        'offer_id'             
    ];

    
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'id', 'offer_id');
    }

}
