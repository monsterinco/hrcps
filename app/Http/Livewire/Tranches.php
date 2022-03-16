<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tranche;
use Livewire\WithPagination;

class Tranches extends Component
{
    public $tranche_name, $tranche_id, $tranche_effectivity_date, $remarks, $value;
    public $isOpen = 0;

    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.tranches', [
            'data' => Tranche::where('tranche_name', 'like', '%'.$this->search.'%')->paginate(10),
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
        $this->tranche_name = '';
        $this->tranche_effectivity_date = '';
        $this->remarks = '';
    }

    public function store()
    {
        $this->validate([
            'tranche_name' => 'required',
            'tranche_effectivity_date' => 'required',
            'remarks' => 'required'
        ]);
   
        Tranche::updateOrCreate(['id' => $this->tranche_id], [
            
            'tranche_name' => $this->tranche_name,
            'tranche_effectivity_date' => $this->tranche_effectivity_date,
            'remarks' => $this->remarks

        ]);
  
        session()->flash('message', 
            $this->tranche_id ? 'Tranche Updated Successfully.' : 'Tranche Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $tranche = Tranche::findOrFail($id);
        $this->tranche_id = $id;

        
        $this->tranche_name = $tranche->tranche_name;
        $this->tranche_effectivity_date = $tranche->tranche_effectivity_date;
        $this->remarks = $tranche->remarks;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Tranche::find($id)->delete();
        session()->flash('message', 'Tranche Deleted Successfully.');
    }

    public function value($id)
    {
        return ($this->id );
    }
}
