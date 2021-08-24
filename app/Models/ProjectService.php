<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectService extends Model
{
    use HasFactory;


    protected  $fillable  = [
        'quantity',
        'unit_cost_ht', 
        'unit_sell_ht',                 
        'is_active',
        'service_state',
        'start_date',        
        'last_payement_date',
        'payement_state',
        'recurrency_payement',
        'next_payement_date',
        'is_billable',
        'is_pay',
        'service_id',
        'project_id'             
    ];

    

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }


    public function service()
    {
        return $this->hasOne(Service::class,  'id', 'service_id');
    }

    public function serviceProv()
    {
        return $this->hasOne(ServiceProvDetails::class,  'ps_id', 'id' );
    }


    

}
