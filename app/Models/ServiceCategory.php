<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected  $fillable  = [
        'label',        
        'description',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }
}
