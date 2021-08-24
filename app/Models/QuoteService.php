<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteService extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected  $fillable  = [
        'quantity', 
        'service_id',
        'quote_id'
             
    ];

    

    public function quote()
    {
        return $this->belongsTo(Quote::class, 'id', 'quote_id');
    }


    public function service()
    {
        return $this->hasOne(Service::class,  'id', 'service_id');
    }

    
}
