<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
    ];



    /**
     * Relations with companies
     */
    public function company()
    {       
        return $this->belongsTo(Company::class, 'company_id','id');
    }


     /**
     * Relations with users
     */
    public function users()
    {
        return $this->belongsTo(User::class,  'user_id', 'id');
    }
}
