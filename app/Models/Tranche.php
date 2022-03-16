<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'tranche';
    protected $fillable = [
        'tranche_name','tranche_effectivity_date','remarks'
    ];
}
