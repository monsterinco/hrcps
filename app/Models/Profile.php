<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gender;
use App\Models\Position;
use App\Models\Salarygrade;
use App\Models\Step;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'profile';
    
    protected $fillable = [
        'employee_id', 'first_name', 'last_name', 'middle_name', 'gender_id', 'position_id', 'section_program_id', 'division_id', 'salary_grade_id', 'salary_amount', 'entrance_to_duty', 'tin_number', 'phic_number', 'gsis_bp_number', 'remarks'
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function salarygrade()
    {
        return $this->belongsTo(Salarygrade::class, 'salary_grade_id');
    }

    public function step()
    {
        return $this->belongsTo(Salarygrade::class, 'step_id');
    }
}
