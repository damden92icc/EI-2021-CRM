<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvDetails extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'spd_unit_cost_ht',
        'spd_is_active',
        'spd_start_date',
        'spd_recurrency_payement',
        'spd_last_payement_date',
        'spd_is_pay',
        'spd_service_state',
        'spd_payement_state',
        'ps_id',
        'provider_id'
    ];



    public function ps()
    {
        return $this->belongsTo(ProjectService::class, 'id', 'ps_id');
    }

    public function provided()
    {
        return $this->belongsTo(Company::class, 'provider_id', 'id' );
    }
  
}
