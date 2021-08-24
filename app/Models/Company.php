<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    
    protected  $fillable   = [
        'name',        
        'vat',
        'street_name',
        'street_number',
        'zip_code',
        'locality',
        'email',
        'company_type',
        'active'
    ];

    /**
     * Relation with emplyes
     */

 
    public function companyEmploye()
    {
        return $this->hasMany(Employe::class, 'company_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(ServiceProvDetails::class, 'provider_id', 'id');
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class, 'concerned_company', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'concerned_company', 'id');
    }
}
