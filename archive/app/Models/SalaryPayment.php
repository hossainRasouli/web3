<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryPayment extends Model
{
    protected  $table='salary_payment';
    protected $primaryKey='payment_id';
    protected $guarded=['payment-id'];
    public  $timestamps=false;
}
