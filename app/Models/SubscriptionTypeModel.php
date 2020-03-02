<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionTypeModel extends Model
{
    protected $table = "subscription_type";
    protected $primaryKey = "id";

    protected $fillable =[
        'id',
        'subscription_type_name'
    ];
}
