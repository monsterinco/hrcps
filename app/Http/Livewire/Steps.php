<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Step;
use Livewire\WithPagination;
use DB;

class Steps extends Component
{

    public $tranche_id, $sg_id, $step_name, $step_salary_amount, $remarks, $step_id, $value;
    public $isOpen = 0;

    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.steps', [
            'data' => Step::where('step_name', 'like', '%'.$this->search.'%')->paginate(10),
            'tranche' => DB::table('tranche')->get(),
            'salarygrade' => DB::table('salarygrade')->get(),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
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

     private function resetInputFields()
    {
        $this->tranche_id = '';
        $this->sg_id = '';
        $this->step_name = '';
        $this->step_salary_amount = '';
        $this->remarks = '';
    }

    public function store()
    {
        $this->validate([
            'tranche_id' => 'required',
            'sg_id' => 'required',
            'step_name' => 'required',
            'step_salary_amount' => 'required',
            'remarks' => 'required'
        ]);
   
        Step::updateOrCreate(['id' => $this->step_id], [
            
            'tranche_id' => $this->tranche_id,
            'sg_id' => $this->sg_id,
            'step_name' => $this->step_name,
            'step_salary_amount' => $this->step_salary_amount,
            'remarks' => $this->remarks
        ]);
  
        session()->flash('message', 
            $this->step_id ? 'Step Updated Successfully.' : 'Step Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

     public function edit($id)
    {
        $step = Step::findOrFail($id);
        $this->step_id = $id;

        $this->tranche_id = $step->tranche_id;
        $this->sg_id = $step->sg_id;
        $this->step_name = $step->step_name;
        $this->step_salary_amount = $step->step_salary_amount;
        $this->remarks = $step->remarks;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Step::find($id)->delete();
        session()->flash('message', 'Step Deleted Successfully.');
    }

    public function value($id)
    {
        return ($this->id );
    }
}
