<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Documents
{
    protected $fillable = [
       'label',
       'description',
       'reference',
       'sended_date',
       'quote_state',
       'owner_id',
       'concerned_company'
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }


    public function services()
    {
        return $this->hasMany(QuoteService::class, 'quote_id','id');
    }


      public function company()
    {
        return $this->belongsTo(Company::class, 'concerned_company', 'id');
    }

}
