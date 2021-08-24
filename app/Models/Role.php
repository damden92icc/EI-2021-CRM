<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected  $attributes  = [
        'label',        
        'description'
    ];

    /**
    * Relation betwen Users and Roles 
    * One role belongs to One user
    */
    public function role()
    {
        return $this->belongsTo(Users::class);
    }
}
