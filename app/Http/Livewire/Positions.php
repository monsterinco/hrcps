<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Position;
use Livewire\WithPagination;

class Positions extends Component
{
    public $position_name, $salary_grade_id, $remarks, $position_id, $value;
    public $isOpen = 0;

    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.positions', [
            'data' => Position::where('position_name', 'like', '%'.$this->search.'%')->paginate(10),
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
        $this->position_name = '';
        $this->salary_grade_id = '';
        $this->remarks = '';
    }

    public function store()
    {
        $this->validate([
            'position_name' => 'required',
            'salary_grade_id' => 'required',
            'remarks' => 'required'
        ]);
   
        Position::updateOrCreate(['id' => $this->position_id], [
            
            'position_name' => $this->position_name,
            'salary_grade_id' => $this->salary_grade_id,
            'remarks' => $this->remarks
        ]);
  
        session()->flash('message', 
            $this->position_id ? 'Position Updated Successfully.' : 'Position Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        $this->position_id = $id;

        
        $this->position_name = $position->position_name;

        $this->salary_grade_id = $position->salary_grade_id;

        $this->remarks = $position->remarks;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Position::find($id)->delete();
        session()->flash('message', 'Position Deleted Successfully.');
    }

    public function value($id)
    {
        return ($this->id );
    }
}
