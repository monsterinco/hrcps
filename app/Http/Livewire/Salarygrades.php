<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salarygrade;
use Livewire\WithPagination;

class Salarygrades extends Component
{
    public $salarygrade_name, $salarygrade_id, $remarks, $value;
    public $isOpen = 0;

    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
         return view('livewire.salarygrades', [
            'data' => Salarygrade::where('salarygrade_name', 'like', '%'.$this->search.'%')->paginate(10),
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
        $this->salarygrade_name = '';
        $this->remarks = '';
    }

    public function store()
    {
        $this->validate([
            'salarygrade_name' => 'required',
            'remarks' => 'required'
        ]);
   
        Salarygrade::updateOrCreate(['id' => $this->salarygrade_id], [
            
            'salarygrade_name' => $this->salarygrade_name,
            'remarks' => $this->remarks

        ]);
  
        session()->flash('message', 
            $this->salarygrade_id ? 'Salary Grade Updated Successfully.' : 'Salary Grade Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $salarygrade = Salarygrade::findOrFail($id);
        $this->salarygrade_id = $id;

        
        $this->salarygrade_name = $salarygrade->salarygrade_name;
        $this->remarks = $salarygrade->remarks;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Salarygrade::find($id)->delete();
        session()->flash('message', 'Salary Grade Deleted Successfully.');
    }

    public function value($id)
    {
        return ($this->id );
    }
}
