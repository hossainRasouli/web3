<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Snn extends Model
{
    protected $table='student';
    protected $primaryKey='ssn_id';
    protected $guarded=['ssn_id'];
    public $timestamps=false;
}
