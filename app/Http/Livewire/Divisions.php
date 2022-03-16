<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Division;
use Livewire\WithPagination;

class Divisions extends Component
{
    public $division_name, $division_id, $value, $remarks;
    public $isOpen = 0;

    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // return view('livewire.divisions');

        // return view('livewire.divisions', [
        //     'data' => Gender::where('division_name', 'like', '%'.$this->search.'%')->paginate(10),
        // ]);
        return view('livewire.divisions', [
            'data' => Division::where('division_name', 'like', '%'.$this->search.'%')->paginate(10),
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
        $this->division_name = '';
        $this->remarks = '';
    }

    public function store()
    {
        $this->validate([
            'division_name' => 'required',
            'remarks' => 'required'
        ]);
   
        Division::updateOrCreate(['id' => $this->division_id], [
            
            'division_name' => $this->division_name,
            'remarks' => $this->remarks
        ]);
  
        session()->flash('message', 
            $this->division_id ? 'Division Updated Successfully.' : 'Division Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $division = Division::findOrFail($id);
        $this->division_id = $id;

        
        $this->division_name = $division->division_name;
        $this->remarks = $division->remarks;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Division::find($id)->delete();
        session()->flash('message', 'Division Deleted Successfully.');
    }

    public function value($id)
    {
        return ($this->id );
    }
}
