<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salary_payment extends Model
{

    protected  $table='salary_payment';
    protected $primaryKey='payment_id';
    protected $guarded=['payment-id'];
    public  $timestamps=false;
}
