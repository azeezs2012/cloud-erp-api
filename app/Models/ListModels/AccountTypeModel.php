<?php

namespace App\Models\ListModels;

use Illuminate\Database\Eloquent\Model;

class AccountTypeModel extends Model
{
    protected $table = "acct_type";
    protected $primaryKey = "id";

    protected $fillable =[
        'id',
        'acct_type_name',
        'acct_type_short_name',
        'acct_type_display_name'
    ];

}

