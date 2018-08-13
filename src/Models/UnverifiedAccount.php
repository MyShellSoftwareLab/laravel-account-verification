<?php

namespace MyShell\AccountVerification\Models;

use Illuminate\Database\Eloquent\Model;

class UnverifiedAccount extends Model
{

    protected $fillable= [
        'account_id',
        'token'
    ];

    public function account(){
        return $this->belongsTo(config('account_verification.account_model_class','App\User'),
            'account_id', config('account_verification.account_table_id','id'));
    }
}
