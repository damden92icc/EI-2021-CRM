<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends DocumentPriced
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'reference',
        'sended_date',
        'offer_state',
        'offer_priority_state',
        'total_cost_ht',
        'total_sell_ht',
        'validity_delay',
        'due_date',
        'owner_id',
        'concerned_company',
        'concerned_client'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'concerned_client', 'id');
    }

    public function services()
    {
        return $this->hasMany(OfferService::class, 'offer_id','id');
    }

    public function comments()
    {
        return $this->hasMany(OfferComment::class, 'offer_id','id');
    }


    public function company()
    {
        return $this->belongsTo(Company::class, 'concerned_company', 'id');
    }

    
}
