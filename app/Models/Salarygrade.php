<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salarygrade extends Model
{
     use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'salarygrade';
    protected $fillable = [
        'salarygrade_name','remarks'
    ];
}
