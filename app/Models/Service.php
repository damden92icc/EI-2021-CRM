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
        'category_id',
    ];


    public function quoteService()
    {
        return $this->belongsTo(QuoteService::class, 'service_id ', 'id');
    }

    public function offerService()
    {
        return $this->belongsTo(OfferService::class, 'service_id ', 'id');
    }


    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id','id');
    }
}
