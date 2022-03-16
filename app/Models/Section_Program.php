<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Division;

class Section_Program extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'section_program';
    
    protected $fillable = [
        'section_program_name','division_id','remarks'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}
