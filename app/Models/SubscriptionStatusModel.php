<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionStatusModel extends Model
{
    protected $table = "subscription_status";
    protected $primaryKey = "id";

    protected $fillable =[
        'id',
        'subscription_status_name'
    ];
}
