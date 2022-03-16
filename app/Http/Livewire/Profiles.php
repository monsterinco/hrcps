<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;
use App\Models\Step;
use Livewire\WithPagination;
use DB;

class Profiles extends Component
{
    public $profiles, $employee_id, $first_name, $last_name, $middle_name, $gender_id, $position_id, $section_program_id, $division_id, $salary_grade_id, $salary_amount, $entrance_to_duty, $tin_number, $phic_number, $gsis_bp_number, $remarks, $profile_id, $value, $step_id;
    public $isOpen = 0;
    public $isOpenAdditional = 0;

    use WithPagination;
    public $search = '';

    // public function paginationView()
    // {
    //     return 'custom-pagination-links-view';
    // }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // return view('livewire.profiles', [
        //     'data' => Profile::paginate(10),
        // ]);

        return view('livewire.profiles', [
            'data' => Profile::where('last_name', 'like', '%'.$this->search.'%')->paginate(10), 
            'gender' => DB::table('gender')->get(),
            'position' => DB::table('position')->get(),
            'section_program' => DB::table('section_program')->get(),
            'division' => DB::table('division')->get(),
            'salarygrade' => DB::table('salarygrade')->get(),
            'step' => DB::table('step')->get(),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

     public function createSalary()
    {
        $this->resetInputFieldsSalary();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    //modified
    public function openModalAdditional()
    {
        $this->isOpenAdditional = true;
    }

    public function closeModalAdditional()
    {
        $this->isOpenAdditional = false;
    }

    private function resetInputFields(){
        $this->employee_id = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->middle_name = '';
        $this->gender_id = '';
        $this->position_id = '';
        $this->section_program_id = '';
        $this->division_id = '';
        $this->salary_grade_id = '';
        $this->salary_amount = '';
        $this->step_id = '';
        $this->entrance_to_duty = '';
        $this->tin_number = '';
        $this->phic_number = '';
        $this->gsis_bp_number = '';
        $this->remarks = '';
        $this->profile_id = '';
        $this->id = '';
    }

     private function resetInputFieldsSalary(){
        $this->employee_id = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->middle_name = '';
        $this->position_id = '';
        $this->salary_grade_id = '';
        $this->salary_amount = '';
        $this->step_id = '';
        $this->profile_id = '';
        $this->id = '';
    }

    public function store()
    {

      
   
        $this->validate([
            'employee_id' => 'required',//|unique:profile,employee_id,'.$this->profile_id,
            'first_name' => 'required', 
            'last_name' => 'required', 
            'middle_name' => 'required', 
            'gender_id' => 'required', 
            'position_id' => 'required', 
            'section_program_id' => 'required', 
            'division_id' => 'required', 
            'salary_grade_id' => 'required', 
            'salary_amount' => 'required', 
            'entrance_to_duty' => 'required', 
            'tin_number' => 'required', 
            'phic_number' => 'required', 
            'gsis_bp_number' => 'required', 
            'remarks'=> 'required'


        ]);

     
        Profile::updateOrCreate(['id' => $this->profile_id], [
            
            'employee_id' => $this->employee_id, 
            'first_name' => $this->first_name, 
            'last_name' => $this->last_name, 
            'middle_name' => $this->middle_name, 
            'gender_id' => $this->gender_id, 
            'position_id' => $this->position_id, 
            'section_program_id' => $this->section_program_id, 
            'division_id' => $this->division_id, 
            'salary_grade_id' => $this->salary_grade_id, 
            'salary_amount' => $this->salary_amount, 
            'step_id' => $this->step_id, 
            'entrance_to_duty' => $this->entrance_to_duty, 
            'tin_number' => $this->tin_number, 
            'phic_number' => $this->phic_number, 
            'gsis_bp_number' => $this->gsis_bp_number, 
            'remarks' => $this->remarks
        ]);
        
     
        session()->flash('message', 
            $this->profile_id ? 'Profile Updated Successfully.' : 'Profile Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        $this->profile_id = $id;
        $this->employee_id = $profile->employee_id;
        $this->first_name = $profile->first_name;
        $this->last_name = $profile->last_name;
        $this->middle_name = $profile->middle_name;
        $this->gender_id = $profile->gender_id;
        $this->position_id = $profile->position_id;
        $this->section_program_id = $profile->section_program_id;
        $this->division_id = $profile->division_id;
        $this->salary_grade_id = $profile->salary_grade_id;
        $this->salary_amount = $profile->salary_amount;
        $this->entrance_to_duty = $profile->entrance_to_duty;
        $this->tin_number = $profile->tin_number;
        $this->phic_number = $profile->phic_number;
        $this->gsis_bp_number = $profile->gsis_bp_number;
        $this->remarks = $profile->remarks;
    
        $this->openModal();
    }


     public function editAdditional($id)
    {
        $profile = Profile::findOrFail($id);
        $this->profile_id = $id;
        $this->employee_id = $profile->employee_id;
        $this->first_name = $profile->first_name;
        $this->last_name = $profile->last_name;
        $this->middle_name = $profile->middle_name;
        $this->gender_id = $profile->gender_id;
        $this->position_id = $profile->position_id;
        $this->section_program_id = $profile->section_program_id;
        $this->division_id = $profile->division_id;
        $this->salary_grade_id = $profile->salary_grade_id;
        $this->salary_amount = $profile->salary_amount;
        $this->step_id = $profile->step_id;
        $this->entrance_to_duty = $profile->entrance_to_duty;
        $this->tin_number = $profile->tin_number;
        $this->phic_number = $profile->phic_number;
        $this->gsis_bp_number = $profile->gsis_bp_number;
        $this->remarks = $profile->remarks;
    
        $this->openModalAdditional();
    }

    public function delete($id)
    {
        Profile::find($id)->delete();
        session()->flash('message', 'Profile Deleted Successfully.');
    }

    public function value($id)
    {
        return ($this->id );
    }

    public function savesalary($id)
    {
         $this->openModalAdditional();
    }

     public function updateSalary($id)
    {
        $this->remarks = $profile->remarks;

         $this->openModalAdditional();
    }


    // public function updatedSelectedSg($salarygrade)
    // {
    //     if (!is_null($salarygrade)) {
    //         $this->steps = Step::where('step_id', $salarygrade)->get();
    //     }
    // }
}
