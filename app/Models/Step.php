<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Step;
use App\Models\Tranche;
use App\Models\Salarygrade;

class Step extends Model
{
     use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'step';
    protected $fillable = [
        'tranche_id','sg_id','step_name','step_salary_amount','remarks'
    ];

     public function step()
    {
        return $this->belongsTo(Step::class, 'step_id');
    }

     public function tranche()
    {
        return $this->belongsTo(Tranche::class, 'tranche_id');
    }

    public function salarygrade()
    {
        return $this->belongsTo(Salarygrade::class, 'sg_id');
    }
}
