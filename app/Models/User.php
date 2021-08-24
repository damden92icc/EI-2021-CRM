<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'email',
        'password',
        'phone',
        'mobile',
        'gdpr_valided',
        'cgu_valided',
        'user_state',
        'role_id'
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Relation between User and Role
     * One user Has one role

     */

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




      /**
     * Get the phone associated with the user.
     */

    public function employes()
    {
        return $this->hasMany(Employe::class, 'user_id', 'id');
    }



     /**
     * Get the phone associated with the user.
     */

    public function quotes()
    {
        return $this->hasMany(Quote::class, 'owner_id' , 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'owner_id' , 'id');
    }

    public function clients()
    {
        return $this->hasMany(Offer::class, 'concerned_client' , 'id');
    }


    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id' , 'id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'owner_id' , 'id');
    }




    public function checkRole(int $id)
    {    
        if( Auth::user()->role->label == Role::find($id)->label){            
            return true;
        }
        return false;
      
    }



}