<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'reference',
        'project_state',
        'start_date',
        'owner_id',
        'concerned_company'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }


    public function services()
    {
        return $this->hasMany(ProjectService::class, 'project_id','id');
    }

}
