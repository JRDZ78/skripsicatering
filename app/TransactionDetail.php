<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transactiondetails';
    protected $dates = ['deliver_date'];
}
