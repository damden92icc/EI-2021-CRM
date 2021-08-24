<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected  $fillable  = [
        'label',        
        'description',
        'recurrent',
        'active',
        'validity_delay',
    ];


    public function quoteService()
    {
        return $this->belongsTo(QuoteService::class, 'service_id ', 'id');
    }

    public function offerService()
    {
        return $this->belongsTo(OfferService::class, 'service_id ', 'id');
    }
}
