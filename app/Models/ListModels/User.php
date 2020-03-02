<?php

namespace App\Models\ListModels;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable =[
        'id',
        'username',
        'password',
        'remember_token',
        'is_active',
        'is_approved',
        'created_at',
        'modified_at',
        'approved_at',
    ];
}
