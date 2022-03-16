<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gender;
use Livewire\WithPagination;

class Genders extends Component
{
    public $gender_name, $gender_id, $value;
    public $isOpen = 0;

    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // return view('livewire.genders');

        // return view('livewire.genders', [
        //     'data' => Gender::where('gender_name', 'like', '%'.$this->search.'%')->paginate(10),
        // ]);
        return view('livewire.genders', [
            'data' => Gender::where('gender_name', 'like', '%'.$this->search.'%')->paginate(10),
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
        $this->gender_name = '';
    }

    public function store()
    {
        $this->validate([
            'gender_name' => 'required'
        ]);
   
        Gender::updateOrCreate(['id' => $this->gender_id], [
            
            'gender_name' => $this->gender_name
        ]);
  
        session()->flash('message', 
            $this->gender_id ? 'Gender Updated Successfully.' : 'Gender Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $gender = Gender::findOrFail($id);
        $this->gender_id = $id;

        
        $this->gender_name = $gender->gender_name;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Gender::find($id)->delete();
        session()->flash('message', 'Gender Deleted Successfully.');
    }

    public function value($id)
    {
        return ($this->id );
    }
}
