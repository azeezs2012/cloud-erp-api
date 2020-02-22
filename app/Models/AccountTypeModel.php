<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountTypeModel extends Model
{
    protected $table = "account_type";

    protected $fillable = [
        'account_type_name',
        'account_type_display_name',
        'id'
    ];
}
